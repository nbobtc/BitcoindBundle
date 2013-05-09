<?php

namespace Nbobtc\Bundle\BitcoindBundle\Manager;

use Nbobtc\Bitcoind\Bitcoind;
use Doctrine\ORM\EntityManager;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use Nbobtc\Bundle\BitcoindBundle\Entity\BitcoinWallet;
use Nbobtc\Bundle\BitcoindBundle\Entity\BitcoinWalletRepository;

/**
 * This allows you to manager a large bitcoin wallet, this
 * is basicly just a wrapper the uses the entity and repository
 * to manage your wallet so it won't use RPC methods the entire
 * time.
 *
 * Dependencies
 *     - Bitcoind
 *     - EntityManager
 *     - EventDispatcher
 *
 * @author Joshua Estes
 */
class BitcoinWalletManager
{

    /**
     * @var Bitcoind
     */
    private $bitcoind;

    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var EventDispatcherInterface
     */
    private $dispatcher;

    /**
     * This will send a given amount to a specific bitcoin
     * address
     *
     * @param string $to     valid bitcoin address
     * @param float  $amount amount of coins
     */
    public function send($to, $amount)
    {
        // Grab BitcoinWallet object where $amount is less than
        // or equal to the balance. If there is no address that
        // we own that has the amount needed, we need to move
        // some funds around and then try again.
    }

    /**
     * This will save the entity to the database as well as
     * dispatch the event `bitcoin_wallet.update`
     *
     * @param BitcoinWallet $wallet
     *
     * @return BitcoinWallet
     */
    public function update(BitcoinWallet $wallet)
    {
        $this->dispatcher->dispatch('bitcoin_wallet.update', new GenericEvent($wallet));
        $this->em->persist($wallet);
        $this->em->flush();

        return $wallet;
    }

    /**
     * @param Bitcoind $bitcoind
     */
    public function setBitcoind(Bitcoind $bitcoind)
    {
        $this->bitcoind = $bitcoind;
    }

    /**
     * @param EntityManager $em
     */
    public function setEntityManager(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @param EventDispatcherInterface $dispatcher
     */
    public function setDispatcher(EventDispatcherInterface $dispatcher)
    {
        $this->dispacher = $dispatcher;
    }

    /**
     * Used to generate a new address if there are none available in
     * the database.
     *
     * @return BitcoinWallet
     */
    private function getNewAddress()
    {
        $address = $this->bitcoind->getnewaddress();
        $this->bitcoind->setaccount($address,$address);

        $wallet = new BitcoinWallet($address);

        $this->em->persist($wallet);
        $this->em->flush();

        return $wallet;
    }

    /**
     * Internal function that moves money from one address
     * to another to help avoid tx fees
     *
     * @param BitcoinWallet $from
     * @param BitcoinWallet $to
     * @param float         $amount
     *
     * @return boolean
     */
    private function move(BitcoinWallet $from, BitcoinWallet $to, $amount)
    {
        $fromBalance = $from->getBalance();
        $toBalance   = $to->getBalance();

        if ($amount >= $fromBalance) {
            $to->setBalance($toBalance + $amount);
            $from->setBalance($fromBalance - $amount);
            $this->bitcoind->move($from->getAddress(), $to->getAddress(), $amount);
            $this->em->persist($from);
            $this->em->persist($to);
            $this->em->flush();

            return true;
        }

        return false;
    }

    /**
     * @return BitcoinWalletRepository
     */
    private function getRepository()
    {
        return $this->em->getRepository('BitcoindBundle:BitcoinWallet');
    }

}
