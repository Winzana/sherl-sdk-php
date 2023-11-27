<?php

namespace Sherl\Sdk\Shop\Basket\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Shop\Order\Dto\ShopBasketAddProductOptionInputDto;
use Sherl\Sdk\Shop\Order\Dto\ShopBasketAddProductScheduleInputDto;

class AddProductInputDto
{
  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $organizationUri;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $orderId;

  /**
   * @var float
   * @Serializer\Type("float")
   */
  public $latitude;

  /**
   * @var float
   * @Serializer\Type("float")
   */
  public $longitude;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $productId;

  /**
   * @var integer
   * @Serializer\Type("integer")
   */
  public $orderQuantity;

  /**
   * @var ShopBasketAddProductOptionInputDto[]
   * @Serializer\Type("array<Sherl\Sdk\Shop\Dto\ShopBasketAddProductOptionInputDto>")
   */
  public $options;

  /** @var ShopBasketAddProductScheduleInputDto[]
   * @Serializer\Type("array<Sherl\Sdk\Shop\Dto\ShopBasketAddProductScheduleInputDto>")
   */
  public $schedules;

  /** @var string
   * @Serializer\Type("string")
   */
  public $offerId;

  /**
   * @var mixed
   * @Serializer\Type("mixed")
   */
  public $metadatas;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $customerUri;

  /**
   * @var boolean
   * @Serializer\Type("boolean")
   */
  public $isFreeTrial;
}
