<?php

namespace Sherl\Sdk\Shop\Basket\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Shop\Dto\ShopBasketAddProductOptionInputDto;
use Sherl\Sdk\Shop\Dto\ShopBasketAddProductScheduleInputDto;

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
     * @var number
     * @Serializer\Type("string")
     */
    public $latitude;

    /**
     * @var number
     * @Serializer\Type("string")
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
     * @var array<ShopBasketAddProductOptionInputDto>
     * @Serializer\Type("array<Sherl\Sdk\Shop\Dto\ShopBasketAddProductOptionInputDto>")
     */
    public $options;

    /** @var array<ShopBasketAddProductScheduleInputDto>
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
