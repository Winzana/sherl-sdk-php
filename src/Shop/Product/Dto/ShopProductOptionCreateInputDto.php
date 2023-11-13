<?php

namespace Sherl\Sdk\Shop\Product\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Shop\Product\Dto\ShopProductOptionItemCreateInputDto;
use Sherl\Sdk\Shop\Product\Dto\ProductOptionItemTranslationDto;

class ShopProductOptionCreateInputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $name;

    /**
     * @var array
     * @Serializer\Type("array<Sherl\Sdk\Shop\Product\Dto\ShopProductOptionItemCreateInputDto>")
     */
    public $items;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $required;

    /**
     * @var float
     * @Serializer\Type("float")
     */
    public $rangeMin;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $enabled;

    /**
     * @var array
     * @Serializer\Type("array<Sherl\Sdk\Shop\Product\Dto\ProductOptionItemTranslationDto>")
     */
    public $translations;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $multiple;
}
