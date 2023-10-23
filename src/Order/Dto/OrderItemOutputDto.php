<?php

namespace Sherl\Sdk\Order\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Order\Dto\OrderItemProductOptionOutputDto;
use Sherl\Sdk\Order\Dto\OrderItemProductScheduleOutputDto;

use Sherl\Sdk\Shop\Product\Dto\ProductOutputDto;

class OrderItemOutputDto
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
     * @var OrderItemProductOptionOutputDto[]
     * @Serializer\Type("array<Sherl\Sdk\Order\Dto\OrderItemProductOptionOutputDto>")
     */
    public $options;

    /**
     * @var OrderItemProductScheduleOutputDto[]
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
