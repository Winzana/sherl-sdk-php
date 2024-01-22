<?php

namespace Sherl\Sdk\Etl\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Etl\Enum\FieldValueTypesEnum;
use Sherl\Sdk\Etl\Dto\WrapperModelDto;

class SchemaSourceModelDto
{
    /**
     * @var FieldValueTypesEnum
     * @Serializer\Type("Sherl\Sdk\Etl\Enum\FieldValueTypesEnum")
     */
    public $type;

    /**
     * @var FieldValueTypesEnum
     * @Serializer\Type("Sherl\Sdk\Etl\Enum\FieldValueTypesEnum")
     */
    public $outputType;

    /**
     * @var WrapperModelDto[]
     * @Serializer\Type("array<Sherl\Sdk\Etl\Enum\WrapperModelDto>")
     */
    public $wrappers;

    /**
     * @var mixed
     * @Serializer\Type("mixed")
     */
    public $defaultValue;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $ignoreEmpty;
}
