<?php

namespace Sherl\Sdk\Shop\Basket\Dto;

use JMS\Serializer\Annotation as Serializer;

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
     * @var number
     * @Serializer\Type("string")
     */
    public $orderQuantity;

    /**
     * @var ShopBasketAddProductOptionInputDto
     * @Serializer\Type("Sherl\Sdk\Shop\Dto\ShopBasketAddProductOptionInputDto")
     */
    public $options;

    /** @var ShopBasketAddProductScheduleInputDto
    * @Serializer\Type("Sherl\Sdk\Shop\Dto\ShopBasketAddProductScheduleInputDto")
    */
    public $schedules;

    /** @var number
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
