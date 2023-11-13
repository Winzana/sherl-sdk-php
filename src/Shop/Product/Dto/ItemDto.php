<?php

namespace Sherl\Sdk\Shop\Item\Dto;

use JMS\Serializer\Annotation as Serializer;

class ItemDto
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
}
