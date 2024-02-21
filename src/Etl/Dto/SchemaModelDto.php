<?php

namespace Sherl\Sdk\Etl\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Etl\Dto\SchemaSourceModelDto;
use Sherl\Sdk\Etl\Dto\SchemaDestinationModelDto;

class SchemaModelDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $name;

    /**
     * @var SchemaSourceModelDto[]
     * @Serializer\Type("array<Sherl\Sdk\Etl\Dto\SchemaSourceModelDto>")
     */
    public $sources;

    /**
     * @var SchemaDestinationModelDto[]
     * @Serializer\Type("array<Sherl\Sdk\Etl\Dto\SchemaDestinationModelDto>")
     */
    public $destinations;
}
