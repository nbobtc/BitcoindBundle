<?php

namespace Nbobtc\Bundle\BitcoindBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Class BitcoinAddress
 *
 * @author Jonathan Dizdarevic <dizda@dizda.fr>
 *
 * @Annotation
 */
class BitcoinAddress extends Constraint
{
    public $message = "The bitcoin address '%address%' is not valid.";

    /**
     * {@inheritdoc}
     */
    public function getTargets()
    {
        return self::PROPERTY_CONSTRAINT;
    }

    /**
     * {@inheritdoc}
     */
    public function validatedBy()
    {
        return 'validator.bitcoin_address';
    }
}
