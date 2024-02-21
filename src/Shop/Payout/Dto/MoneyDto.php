<?php

namespace Sherl\Sdk\Shop\Payout\Dto;

use JMS\Serializer\Annotation as Serializer;

class MoneyDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $Currency;

    /**
     * @var float
     * @Serializer\Type("float")
     */
    public $Amount;
}
