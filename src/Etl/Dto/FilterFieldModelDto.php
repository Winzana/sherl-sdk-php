<?php

namespace Sherl\Sdk\Etl\Dto;

use JMS\Serializer\Annotation as Serializer;

class FilterFieldModel
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $field;

    /**
     * @var float
     * @Serializer\Type("float")
     */
    public $boost;
}
