<?php

namespace Sherl\Sdk\Etl\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Etl\Enum\FieldValueTypes;
use Sherl\Sdk\Etl\Dto\WrapperModelDto;

class SchemaSourceModel
{
    /**
     * @var FieldValueTypes
     * @Serializer\Type("Sherl\Sdk\Etl\Enum\FieldValueTypes")
     */
    public $type;

    /**
     * @var FieldValueTypes
     * @Serializer\Type("Sherl\Sdk\Etl\Enum\FieldValueTypes")
     */
    public $outputType;

    /**
     * @var WrapperModel[]
     * @Serializer\Type("array<Sherl\Sdk\Etl\Enum\WrapperModelDto>")
     */
    public $wrappers;

    /**
     * @var mixed
     * @Serializer\Type("mixed")
     */
    public $defaultValue;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    public $ignoreEmpty;
}