<?php

namespace Sherl\Sdk\Order\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Order\Dto\CardOutputDto;

class PaymentMethodDetailsOutputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $type;

    /**
     * @var CardOutputDto
     * @Serializer\Type("Sherl\Sdk\Order\Dto\CardOutputDto")
     */
    public $card;
}
