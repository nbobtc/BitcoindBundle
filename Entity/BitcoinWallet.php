<?php

namespace Nbobtc\Bundle\BitcoindBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Nbobtc\Bundle\BitcoindBundle\Entity\BitcoinWalletRepository")
 * @ORM\Table(name="bitcoin_wallets")
 * @ORM\HasLifecycleCallbacks
 */
class BitcoinWallet
{

    /**
     * in use    = The address is being used for some reason
     * available = the address is free
     */
    const STATE_IN_USE    = 0;
    const STATE_AVAILABLE = 1;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\Column(type="string", length=34, unique=true)
     */
    private $address;

    /**
     * @ORM\Column(name="state", type="smallint")
     */
    private $state;

    /**
     * @ORM\Column(name="balance", type="decimal", precision=16, scale=8)
     */
    private $balance = 0;

    /**
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updated_at;

    public function __construct($address = null)
    {
        $this->setAddress($address);
        $this->setState(self::STATE_AVAILABLE);
    }

    public function __toString()
    {
        return (string) $this->getAddress();
    }

    /**
     * Set address
     *
     * @param string $address
     * @return BitcoinWallet
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set state
     *
     * @param integer $state
     * @return BitcoinWallet
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return integer 
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set balance
     *
     * @param float $balance
     * @return BitcoinWallet
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;

        return $this;
    }

    /**
     * Get balance
     *
     * @return float 
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     *
     * @return BitcoinWallet
     */
    public function setUpdatedAt()
    {
        $this->updated_at = new \DateTime();

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

}
