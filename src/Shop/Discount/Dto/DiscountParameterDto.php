<?php

namespace Sherl\Sdk\Shop\Discount\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Shop\Discount\Dto\ProductRestrictionsDto;
use Sherl\Sdk\Shop\Discount\Dto\DateRestrictionsDto;

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
     * @var array<string>
     * @Serializer\Type("array<string>")
     */
    public $customers;
       /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $visibleToPublic;
       /**
     * @var array<ProductRestrictionsDto>
     * @Serializer\Type("array<Sherl\Sdk\Shop\Discount\Dto\ProductRestrictionsDto>")
     */
    public $productRestrictions;

           /**
     * @var array<DateRestrictionsDto>
     * @Serializer\Type("array<Sherl\Sdk\Shop\Discount\Dto\DateRestrictionsDto>")
     */
    public $dateRestrictions;
}
