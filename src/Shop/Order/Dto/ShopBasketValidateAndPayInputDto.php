<?php

namespace Sherl\Sdk\Shop\Order\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Shop\Order\Enum\ShopMeansOfPaymentEnum;
use Sherl\Sdk\Shop\Order\Dto\ShopBasketValidatePaymentInputDto;

class ShopBasketValidateAndPayInputDto extends ShopBasketValidatePaymentInputDto
{
    /**
     * @var ShopMeansOfPaymentEnum
     * @Serializer\Type("Sherl\Sdk\Shop\Order\Enum\ShopMeansOfPaymentEnum")
     */
    public $meansOfPayment;
}
