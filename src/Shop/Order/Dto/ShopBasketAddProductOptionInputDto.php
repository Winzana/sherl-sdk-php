<?php

namespace Sherl\Sdk\Shop\Order\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Shop\Order\Dto\ShopBasketAddProductOptionItemInputDto;

class ShopBasketAddProductOptionInputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $id;

    /**
     * @var ShopBasketAddProductOptionItemInputDto
     * @Serializer\Type("Sherl\Sdk\Shop\Basket\Dto\ShopBasketAddProductOptionItemInputDto")
     */
    public $items;
}
