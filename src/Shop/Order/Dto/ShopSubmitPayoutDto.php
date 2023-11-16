<?php

namespace Sherl\Sdk\Shop\Order\Dto;

use JMS\Serializer\Annotation as Serializer;

class ShopSubmitPayoutDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $organizationUri;

    /**
     * @var float
     * @Serializer\Type("float")
     */
    public $amount;
}
