<?php

namespace Sherl\Sdk\Shop\Loyalty\Dto;

use Sherl\Sdk\Shop\Discount\Enum\DiscountType;

use JMS\Serializer\Annotation as Serializer;

class ShopLoyaltyCardUpdateInputDto
{
    /**
    * @var float
    * @Serializer\Type("float")
    */
    public $amount;
    /**
    * @var DiscountType
    * @Serializer\Type("Sherl\Sdk\Shop\Discount\Enum\DiscountType")
    */
    public $discountType;
    /**
    * @var float
    * @Serializer\Type("float")
    */
    public $percentage;
    /**
    * @var boolean
    * @Serializer\Type("boolean")
    */
    public $enabled;
}
