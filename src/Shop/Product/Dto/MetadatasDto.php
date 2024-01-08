<?php

namespace Sherl\Sdk\Shop\Product\Dto;

use JMS\Serializer\Annotation as Serializer;

class MetadatasDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $degreeOfAlcohol;
}
