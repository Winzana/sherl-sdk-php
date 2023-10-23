<?php

namespace Sherl\Sdk\Order\Dto\Payment;

use JMS\Serializer\Annotation as Serializer;

class DebitedFundsOutputDto
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
