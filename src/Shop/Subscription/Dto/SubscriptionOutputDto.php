<?php

namespace Sherl\Sdk\Shop\Subscription\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Shop\Product\Dto\ProductOfferOutputDto;
use Sherl\Sdk\Shop\Product\Enum\ProductOfferFrequency;

use Sherl\Sdk\Shop\Subscription\Enum\SubscriptionStatus;

class SubscriptionOutputDto
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
     * @var string
     * @Serializer\Type("string")
     */
    public $consumerId;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $activeFrom;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $activeUntil;

    /**
     * @var ProductOfferFrequency
     * @Serializer\Type("enum<'Sherl\Sdk\Shop\Product\Enum\ProductOfferFrequency', 'value'>")
     */
    public $frequency;

    /**
     * @var SubscriptionStatus
     * @Serializer\Type("enum<'Sherl\Sdk\Shop\Subscription\Enum\SubscriptionStatus', 'value'>")
     */
    public $status;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $enabled;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $disabledAt;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $sourceUri;

    /**
     * @var ProductOfferOutputDto
     * @Serializer\Type("Sherl\Sdk\Shop\Product\Dto\ProductOfferOutputDto")
     */
    public $offer;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $contextUri;

    /**
     * @var array
     * @Serializer\Type("array")
     */
    public $metadatas;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $createdAt;
}
