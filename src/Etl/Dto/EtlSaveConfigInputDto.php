<?php

namespace Sherl\Sdk\Etl\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Etl\Dto\SourceModelDto;
use Sherl\Sdk\Etl\Dto\DestinationModelDto;
use Sherl\Sdk\Etl\Dto\SchemaModelDto;
use Sherl\Sdk\Etl\Dto\FilterModelDto;

class EtlSaveConfigInputDto
{
    /**
     * @var SourceModelDto
     * @Serializer\Type("Sherl\Sdk\Etl\Dto\SourceModelDto")
     */
    public $source;

    /**
     * @var DestinationModelDto
     * @Serializer\Type("Sherl\Sdk\Etl\Dto\DestinationModelDto")
     */
    public $destination;

    /**
     * @var SchemaModelDto[]
     * @Serializer\Type("array<Sherl\Sdk\Etl\Dto\SchemaModelDto>")
     */
    public $schemas;

    /**
     * @var FilterModelDto[]
     * @Serializer\Type("array<Sherl\Sdk\Etl\Dto\FilterModelDto>")
     */
    public $filters;
}
