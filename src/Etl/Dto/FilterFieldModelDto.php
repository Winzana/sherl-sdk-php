<?php

namespace Sherl\Sdk\Etl\Dto;

use JMS\Serializer\Annotation as Serializer;

class FilterFieldModelDto
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
