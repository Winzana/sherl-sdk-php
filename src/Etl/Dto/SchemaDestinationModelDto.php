<?php

namespace Sherl\Sdk\Etl\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Etl\Dto\WrapperModelDto;
use Sherl\Sdk\Etl\Enum\FieldValueTypesEnum;

class SchemaDestinationModelDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $name;

    /**
     * @var FieldValueTypesEnum
     * @Serializer\Type("enum<'Sherl\Sdk\Etl\Enum\FieldValueTypesEnum', 'value'>")
     */
    public $outputType;

    /**
     * @var FieldValueTypesEnum
     * @Serializer\Type("enum<'Sherl\Sdk\Etl\Enum\FieldValueTypesEnum', 'value'>")
     */
    public $type;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $pattern;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $indexed;

    /**
     * @var WrapperModelDto[]
     * @Serializer\Type("array<Sherl\Sdk\Etl\Dto\WrapperModelDto>")
     */
    public $wrappers;
}
