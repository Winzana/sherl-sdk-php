<?php

namespace Sherl\Sdk\Etl\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Etl\Dto\WrapperModelDto;
use Sherl\Sdk\Etl\Enum\FieldValueTypesEnum;

class SchemaDestinationModel
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $name;

    /**
     * @var FieldValueTypesEnum
     * @Serializer\Type("Sherl\Sdk\Etl\Enum\FieldValueTypesEnum")
     */
    public $outputType;

    /**
     * @var FieldValueTypesEnum
     * @Serializer\Type("Sherl\Sdk\Etl\Enum\FieldValueTypesEnum")
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
     * @var WrapperModel[]
     * @Serializer\Type("array<Sherl\Sdk\Etl\Dto\WrapperModelDto>")
     */
    public $wrappers;
}
