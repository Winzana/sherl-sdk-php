<?php

namespace Sherl\Sdk\Shop\Subscription\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Shop\Product\Dto\OfferDto;
use Sherl\Sdk\Shop\Product\Enum\ProductOfferFrequency;

use Sherl\Sdk\Shop\Subscription\Enum\SubscriptionStatus;

class SubscriptionDto
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
     * @var OfferDto
     * @Serializer\Type("Sherl\Sdk\Shop\Product\Dto\OfferDto")
     */
    public $offer;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $contextUri;

    /**
     * @var array<string, mixed>
     * @Serializer\Type("array<string, mixed>")
     */
    public $metadatas;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $createdAt;
}
