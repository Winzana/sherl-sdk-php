<?php

namespace Sherl\Sdk\Shop\Basket\Dto;

use JMS\Serializer\Annotation as Serializer;

class IShopBasketAddProductOptionInputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $id;

    /**
     * @var IShopBasketAddProductOptionItemInputDto
     * @Serializer\Type("Sherl\Sdk\Shop\Basket\Dto\IShopBasketAddProductOptionItemInputDto")
     */
    public $items;
}
