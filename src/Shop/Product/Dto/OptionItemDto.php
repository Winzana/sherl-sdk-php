<?php

namespace Sherl\Sdk\Shop\Product\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Shop\Product\Dto\ProductOptionItemTranslationDto;

class OptionItemDto
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
    public $available;

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
}
