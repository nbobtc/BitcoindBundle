<?php

namespace Nbobtc\Bundle\BitcoindBundle\Manager;

use Nbobtc\Bitcoind\Bitcoind;
use Doctrine\ORM\EntityManager;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use Nbobtc\Bundle\BitcoindBundle\Entity\BitcoinWallet;

/**
 * This allows you to manager a large bitcoin wallet, this
 * is basicly just a wrapper the uses the entity and repository
 * to manage your wallet so it won't use RPC methods the entire
 * time.
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
     * @return string
     */
    private function getNewAddress()
    {
    }

    /**
     * Internal function that moves money from one address
     * to another to help avoid tx fees
     *
     * @param BitcoinWallet $from
     * @param BitcoinWallet $to
     * @param float         $amount
     */
    private function move(BitcoinWallet $from, BitcoinWallet $to, $amount)
    {
    }

}
