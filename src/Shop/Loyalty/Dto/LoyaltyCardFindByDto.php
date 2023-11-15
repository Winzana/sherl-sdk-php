<?php

namespace Sherl\Sdk\Shop\Order\Dto;

use Sherl\Sdk\Place\Dto\AddressOutputDto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Shop\Loyalty\LoyaltyCardReward;

class LoyaltyCardFindByDto
{
    /**
    * @var string
    * @Serializer\Type("string")
    */
    public $id;
    /**
    * @var string
    * @Serializer\Type("string")
    */
    public $uri;
    /**
    * @var string
    * @Serializer\Type("string")
    */
    public $ownerUri;
    /**
    * @var OrganizationOutputDto
    * @Serializer\Type("Sherl\Sdk\Organization\Dto\OrganizationOutputDto")
    */
    public $owner;
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
    * @var float
    * @Serializer\Type("float")
    */
    public $amount;
    /**
    * @var float
    * @Serializer\Type("float")
    */
    public $amountUsed;
    /**
    * @var array<LoyaltyCardRewardDto>
    * @Serializer\Type("array<Sherl\Sdk\Shop\Loyalty\LoyaltyCardReward>")
    */
    public $rewards;
    /**
    * @var boolean
    * @Serializer\Type("boolean")
    */
    public $enabled;
    /**
    * @var string
    * @Serializer\Type("string")
    */
    public $consumerId;
    /**
    * @var DateTime
    * @Serializer\Type("DateTime")
    */
    public $createdAt;
    /**
    * @var DateTime
    * @Serializer\Type("DateTime")
    */
    public $updatedAt;
}
