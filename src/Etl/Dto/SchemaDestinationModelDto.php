<?php

namespace Sherl\Sdk\Etl\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Etl\Dto\WrapperModelDto;
use Sherl\Sdk\Etl\Enum\FieldValueTypes;

class SchemaDestinationModel
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $name;

    /**
     * @var FieldValueTypes
     * @Serializer\Type("Sherl\Sdk\Etl\Enum\FieldValueTypes")
     */
    public $outputType;

    /**
     * @var FieldValueTypes
     * @Serializer\Type("Sherl\Sdk\Etl\Enum\FieldValueTypes")
     */
    public $type;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $pattern;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    public $indexed;

    /**
     * @var WrapperModel[]
     * @Serializer\Type("array<Sherl\Sdk\Etl\Dto\WrapperModelDto>")
     */
    public $wrappers;
}
