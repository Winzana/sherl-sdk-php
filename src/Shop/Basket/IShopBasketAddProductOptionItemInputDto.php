<?php

namespace Sherl\Sdk\Shop\Basket\Dto;

use JMS\Serializer\Annotation as Serializer;

class IShopBasketAddProductOptionItemInputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $name;

    /**
     * @var number
     * @Serializer\Type("number")
     */
    public $quantity;
}
