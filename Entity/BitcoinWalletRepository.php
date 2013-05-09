<?php

namespace Nbobtc\Bundle\BitcoindBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Nbobtc\Bundle\BitcoindBundle\Entity\BitcoinWallet;

/**
 */
class BitcoinWalletRepository extends EntityRepository
{

    /**
     * This will return an array of BitcoinWallet objects
     * that have a balance that is less than or equal to
     * the $amount passed in.
     *
     * @param float $amount
     *
     * @return array
     */
    public function fetchByMaximumBalance($amount)
    {
    }

    /**
     * Returns an array of BitcoinWallet objects that have
     * a balance where the amount is greater than or equal
     * to the $amount that is passed in.
     *
     * @param float $amount
     *
     * @return array
     */
    public function fetchByMinimumBalance($amount)
    {
    }

    /**
     * Returns at array of the oldest available
     *
     * @return array
     */
    public function fetchOldest()
    {
    }

    /**
     * Returns an array of every BitcoinWallet object where
     * the state is the same state as the one you passed in.
     *
     * @param integer $state
     *
     * @return array
     */
    public function fetchByState($state)
    {
    }

    /**
     * Return all available BitcoinWallet objects that are not
     * in use
     *
     * @return array
     */
    public function fetchAvailable()
    {
        return $this->fetchByState(BitcoinWallet::STATE_AVAILABLE);
    }

    /**
     * Returns all the BitcoinWallet objects that are currently
     * in use
     *
     * @return array
     */
    public function fetchInUse()
    {
        return $this->fetchByState(BitcoinWallet::STATE_IN_USE);
    }

}
