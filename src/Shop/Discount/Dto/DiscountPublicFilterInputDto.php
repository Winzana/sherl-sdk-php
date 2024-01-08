<?php

namespace Sherl\Sdk\Shop\Discount\Dto;

use JMS\Serializer\Annotation as Serializer;

use DateTime;

class DiscountPublicFilterInputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $ownerUri;

    /**
     * @var DateTime
     * @Serializer\Type("DateTime")
     */
    public $availableFrom;
    /**
     * @var DateTime
     * @Serializer\Type("DateTime")
     */
    public $availableUntil;
}
