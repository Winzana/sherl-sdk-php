<?php

namespace Sherl\Sdk\Shop\Order\Dto;

use JMS\Serializer\Annotation as Serializer;

class PaymentMethodDetailOutputDto
{
    /**
     * @var CardOutputDto
     * @Serializer\Type("Sherl\Sdk\Shop\Order\Dto\CardOutputDto")
     */
    public $card;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $type;
}
