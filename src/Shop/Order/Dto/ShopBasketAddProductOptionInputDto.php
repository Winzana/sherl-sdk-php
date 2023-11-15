<?php

namespace Sherl\Sdk\Shop\Order\Dto;

use JMS\Serializer\Annotation as Serializer;

class ShopBasketAddProductOptionInputDto
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
