<?php

namespace Sherl\Sdk\Shop\Basket\Dto;

use JMS\Serializer\Annotation as Serializer;

class IShopBasketAddProductScheduleInputDto
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
