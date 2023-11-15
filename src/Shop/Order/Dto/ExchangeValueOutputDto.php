<?php

namespace Sherl\Sdk\Shop\Order\Dto;

use JMS\Serializer\Annotation as Serializer;

class ExchangeValueOutputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $currency;

    /**
     * @var float
     * @Serializer\Type("float")
     */
    public $amount;
}
