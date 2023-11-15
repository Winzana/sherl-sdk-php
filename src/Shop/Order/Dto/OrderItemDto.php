<?php

namespace Sherl\Sdk\Shop\Order\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Shop\Order\Dto\OrderItemProductOptionDto;
use Sherl\Sdk\Shop\Order\Dto\OrderItemProductScheduteDto;
use Sherl\Sdk\Shop\Order\Dto\ProductResponseDto;

class OrderItemDto
{
    /**
       * @var string
       * @Serializer\Type("string")
    */
    public $id;
    /**
       * @var ProductResponseDto
       * @Serializer\Type("Sherl\Sdk\Shop\Order\Dto\ProductResponseDto")
    */
    public $product;
    /**
       * @var string
       * @Serializer\Type("string")
    */
    public $productId;
    /**
       * @var string
       * @Serializer\Type("string")
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
       * @var array<OrderItemProductOptionDto>
       * @Serializer\Type("array<Sherl\Sdk\Shop\Order\Dto\OrderItemProductOptionDto>")
    */
    public $options;
    /**
       * @var array<OrderItemProductScheduteDto>
       * @Serializer\Type("Sherl\Sdk\Shop\Order\Dto\OrderItemProductScheduteDto")
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
       * @var mixed
       * @Serializer\Type("mixed")
    */
    public $metadatas;
}
