<?php

namespace Sherl\Sdk\Shop\Order\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Shop\Order\Dto\OrderItemProductOptionDto;
use Sherl\Sdk\Shop\Order\Dto\OrderItemProductScheduleDto;

use Sherl\Sdk\Shop\Product\Dto\ProductOutputDto;

class OrderItemDto
{
  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $id;

  /**
   * @var ProductOutputDto
   * @Serializer\Type("Sherl\Sdk\Shop\Product\Dto\ProductOutputDto")
   */
  public $product;

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
   * @var float
   * @Serializer\Type("float")
   */
  public $price;

  /**
   * @var float
   * @Serializer\Type("float")
   */
  public $priceTaxIncluded;

  /**
   * @var float
   * @Serializer\Type("float")
   */
  public $priceDiscount;

  /**
   * @var float
   * @Serializer\Type("float")
   */
  public $totalPrice;

  /**
   * @var float
   * @Serializer\Type("float")
   */
  public $taxRate;

  /**
   * @var OrderItemProductOptionDto[]
   * @Serializer\Type("array<Sherl\Sdk\Order\Dto\OrderItemProductOptionOutputDto>")
   */
  public $options;

  /**
   * @var OrderItemProductScheduleDto[]
   * @Serializer\Type("array<Sherl\Sdk\Order\Dto\OrderItemProductScheduleOutputDto>")
   */
  public $schedules;

  /**
   * @var integer
   * @Serializer\Type("integer")
   */
  public $offerId;

  /**
   * @var boolean
   * @Serializer\Type("boolean")
   */
  public $refunded;

  /**
   * @var array
   * @Serializer\Type("array")
   */
  public $metadatas;
}
