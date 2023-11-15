<?php

namespace Sherl\Sdk\Shop\Order\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Shop\Order\Dto\CardOutputDto;

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
