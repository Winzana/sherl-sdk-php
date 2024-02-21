<?php

namespace Sherl\Sdk\Shop\Order\Dto;

use JMS\Serializer\Annotation as Serializer;

class ShopBasketValidatePaymentInputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $orderId;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $customerUri;
}
