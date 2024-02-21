<?php

namespace Sherl\Sdk\Shop\Order\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Shop\Order\Enum\MeansOfPayment;
use Sherl\Sdk\Shop\Order\Dto\ShopBasketValidatePaymentInputDto;

class ShopBasketValidateAndPayInputDto extends ShopBasketValidatePaymentInputDto
{
    /**
     * @var MeansOfPayment
     * @Serializer\Type("enum<'Sherl\Sdk\Shop\Order\Enum\MeansOfPayment', 'value'>")
     */
    public $meansOfPayment;
}