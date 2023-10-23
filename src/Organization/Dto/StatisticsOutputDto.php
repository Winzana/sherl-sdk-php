<?php

namespace Sherl\Sdk\Organization\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Shop\Subscription\Dto\SubscriptionOutputDto;

class StatisticOutputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $firstVisit;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $totalOrder;

    /**
     * @var float
     * @Serializer\Type("float")
     */
    public $amountTotalOrder;

    /**
     * @var SubscriptionOutputDto
     * @Serializer\Type("Sherl\Sdk\Shop\Subscription\Dto\SubscriptionOutputDto")
     */
    public $subscription;

    /**
     * @var float
     * @Serializer\Type("float")
     */
    public $opinion;
}
