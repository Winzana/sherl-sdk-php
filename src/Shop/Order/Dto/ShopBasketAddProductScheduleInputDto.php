<?php

namespace Sherl\Sdk\Shop\Order\Dto;

use JMS\Serializer\Annotation as Serializer;

class ShopBasketAddProductScheduleInputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $allowedFromDate;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $allowedUntilDate;
}
