<?php

namespace Nbobtc\Bundle\BitcoindBundle\Validator;

use Nbobtc\Bitcoind\Bitcoind;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Constraint;

/**
 * Class BitcoinAddressValidator
 *
 * @author Jonathan Dizdarevic <dizda@dizda.fr>
 */
class BitcoinAddressValidator extends ConstraintValidator
{
    /**
     * @var Bitcoind
     */
    private $bitcoind;

    /**
     * @param Bitcoind $bitcoind
     */
    public function __construct(Bitcoind $bitcoind)
    {
        $this->bitcoind = $bitcoind;
    }

    /**
     * Validate a bitcoin address through the Bitcoind Client
     *
     * @param mixed      $address
     * @param Constraint $constraint
     */
    public function validate($address, Constraint $constraint)
    {
        $validation = $this->bitcoind->validateaddress($address);

        if ($validation->isvalid !== true) {
            $this->context
                ->buildViolation($constraint->message)
                ->setParameter('%address%', $address)
                ->addViolation()
            ;
        }
    }
}
