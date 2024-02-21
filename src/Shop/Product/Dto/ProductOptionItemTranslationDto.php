<?php

namespace Sherl\Sdk\Shop\Product\Dto;

use JMS\Serializer\Annotation as Serializer;

class ProductOptionItemTranslationDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $lang;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $name;
}
