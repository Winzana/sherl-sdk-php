<?php

namespace Sherl\Sdk\Shop\Product\Dto;

use JMS\Serializer\Annotation as Serializer;

class ShopProductOptionItemCreateInputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $name;

    /**
     * @var float
     * @Serializer\Type("float")
     */
    public $priceTaxIncluded;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $enabled;
}
