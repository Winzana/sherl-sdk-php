<?php

namespace Sherl\Sdk\Shop\Discount\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Shop\Discount\Enum\DiscountType;
use Sherl\Sdk\Shop\Discount\Dto\ProductRestrictionDto;
use Sherl\Sdk\Shop\Discount\Dto\DateRestrictionDto;

use Sherl\Sdk\Organization\Dto\OrganizationOutputDto;

class DiscountDto
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
   * @var string
   * @Serializer\Type("string")
   */
  public $ownerUri;

  /**
   * @var OrganizationOutputDto
   * @Serializer\Type("string")
   */
  public $owner;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $consumerId;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $availableFrom;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $availableUntil;

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
   * @var DiscountType
   * @Serializer\Type("enum<'Sherl\Sdk\Shop\Discount\Enum\DiscountType', 'value'>")
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
   * @var ProductRestrictionDto[]
   * @Serializer\Type("array<Sherl\Sdk\Shop\Discount\Dto\ProductRestrictionDto>")
   */
  public $productRestrictions;

  /**
   * @var DateRestrictionDto[]
   * @Serializer\Type("array<Sherl\Sdk\Shop\Discount\Dto\DateRestrictionDto>")
   */
  public $dateRestrictions;

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
