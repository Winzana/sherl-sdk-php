<?php

namespace Sherl\Sdk\Shop\Order\Dto;

use Sherl\Sdk\Shop\Discount\Enum\DiscountType;

use JMS\Serializer\Annotation as Serializer;

class LoyaltyCardRewardDto
{
    /**
    * @var float
    * @Serializer\Type("float")
    */
    public $requiredValue;
        /**
    * @var DiscountType
    * @Serializer\Type("Sherl\Sdk\Shop\Discount\Enum\DiscountType")
    */
    public $discountType;
        /**
    * @var float
    * @Serializer\Type("float")
    */
    public $amount;
        /**
    * @var float
    * @Serializer\Type("float")
    */
    public $percentage;
        /**
    * @var string
    * @Serializer\Type("string")
    */
    public $discountUri;
}
