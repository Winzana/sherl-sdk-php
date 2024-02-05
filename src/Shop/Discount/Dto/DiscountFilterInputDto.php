<?php

namespace Sherl\Sdk\Shop\Discount\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Shop\Discount\Enum\DiscountType;

use Sherl\Sdk\Shop\Discount\Dto\ProductRestrictionDto;
use Sherl\Sdk\Shop\Discount\Dto\DateRestrictionDto;
use Sherl\Sdk\Shop\Discount\Dto\DateRangeDto;

use DateTime;

class DiscountFilterInputDto extends DiscountPublicFilterInputDto
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
    public $name;
    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $ownerUris;
    /**
     * @var DateTime
     * @Serializer\Type("DateTime")
     */
    public $validFor;
    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $enabled;
    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $isSubscription;
    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $public;
    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $visibleToPublic;
    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $highlight;
    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $cumulative;
    /**
     * @var DiscountType
     * @Serializer\Type("Sherl\Sdk\Shop\Discount\Enum\DiscountType")
     */
    public $discountType;
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $code;
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $toCode;
    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $noCode;
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
     * @var integer
     * @Serializer\Type("integer")
     */
    public $quantity;
    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $quantityPerUser;
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $customerUri;
    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $productUris;
    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $noProduct;
    /**
     * @var ProductRestrictionDto
     * @Serializer\Type("Sherl\Sdk\Shop\Discount\Dto\ProductRestrictionDto")
     */
    public $productRestrictions;
    /**
     * @var DateRestrictionDto
     * @Serializer\Type("Sherl\Sdk\Shop\Discount\Dto\DateRestrictionDto")
     */
    public $dateRestrictions;
    /**
     * @var DateTime
     * @Serializer\Type("DateTime")
     */
    public $toDate;
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $toMe;
    /**
     * @var DateRangeDto
     * @Serializer\Type("Sherl\Sdk\Shop\Discount\Dto\DateRangeDto")
     */
    public $createdAt;
    /**
     * @var DateRangeDto
     * @Serializer\Type("Sherl\Sdk\Shop\Discount\DateRangeDto")
     */
    public $updatedAt;
    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $offPeakHours;
    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $toValidate;
}
