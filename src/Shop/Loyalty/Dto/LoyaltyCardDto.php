<?php

namespace Sherl\Sdk\Shop\Loyalty\Dto;

use Sherl\Sdk\Shop\Discount\Enum\DiscountType;
use Sherl\Sdk\Organization\Dto\OrganizationOutputDto;
use Sherl\Sdk\Shop\Loyalty\Dto\LoyaltyCardRewardDto;

use DateTime;

use JMS\Serializer\Annotation as Serializer;

class LoyaltyCardDto
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
     * @Serializer\Type("enum<'Sherl\Sdk\Shop\Discount\Enum\DiscountType', 'value'>")
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
     * @var LoyaltyCardRewardDto[]
     * @Serializer\Type("array<Sherl\Sdk\Shop\Loyalty\Dto\LoyaltyCardRewardDto>")
     */
    public $rewards;
    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $enabled;
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
