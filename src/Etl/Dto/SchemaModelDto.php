<?php

namespace Sherl\Sdk\Etl\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Etl\Dto\SchemaSourceModelDto;
use Sherl\Sdk\Etl\Dto\SchemaDestinationModelDto;

class SchemaModel
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $name;

    /**
     * @var SchemaSourceModel[]
     * @Serializer\Type("array<Sherl\Sdk\Etl\Dto\SchemaSourceModelDto>") 
     */
    public $sources;

    /**
     * @var SchemaDestinationModel[]
     * @Serializer\Type("array<Sherl\Sdk\Etl\Dto\SchemaDestinationModelDto>")
     */
    public $destinations;
}