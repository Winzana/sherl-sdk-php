<?php

namespace Sherl\Sdk\Shop\Discount\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Shop\Discount\Dto\ProductRestrictionDto;
use Sherl\Sdk\Shop\Discount\Dto\DateRestrictionDto;

use DateTime;

class DiscountParameterDto
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
    public $name;

    /**
     * @var DateTime
     * @Serializer\Type("DateTime")
     */
    public $availableFrom;
    /**
     * @var DateTime
     * @Serializer\Type("DateTime")
     */
    public $availableUntil;
    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $enabled;
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
     * @var string
     * @Serializer\Type("string")
     */
    public $discountType;
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $code;
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
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $customers;
    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $visibleToPublic;
    /**
     * @var ProductRestrictionDto[]
     * @Serializer\Type("array<Sherl\Sdk\Shop\Discount\Dto\ProductRestrictionDto>")
     */
    public $productRestrictions;

    /**
     * @var DateRestrictionDto[]
     * @Serializer\Type("array<Sherl\Sdk\Shop\Discount\Dto\DateRestrictionDto>")
     */
    public $dateRestrictions;
}
