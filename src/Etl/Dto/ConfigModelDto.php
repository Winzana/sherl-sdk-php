<?php

namespace Sherl\Sdk\Etl\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Etl\Dto\SourceModelDto;
use Sherl\Sdk\Etl\Dto\DestinationModel;
use Sherl\Sdk\Etl\Dto\SchemaModelDto;
use Sherl\Sdk\Etl\Dto\FilterModelDto;

class ConfigModel{

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $uri;

    /**
     * @var string
     * @Serializer\Type("string")
    */
    public $consumerId;

    /**
     * @var SourceModel
     * @Serializer\Type("array<Sherl\Sdk\Etl\Dto\SourceModelDto>")
     */
    public $source;

    /**
     * @var DestinationModel
     * @Serializer\Type("array<Sherl\Sdk\Etl\Dto\DestinationModelDto>")
     */
    public $destination;

    /**
     * @var SchemaModel[]
     * @Serializer\Type("array<Sherl\Sdk\Etl\Dto\SchemaModelDto>")
     */
    public $schemas;

    /**
     * @var FilterModel[]
     * @Serializer\Type("array<App\Model\FilterModel>")
     */
    public $filters;

    /**
     * @var string
     * @Serializer\Type("array<Sherl\Sdk\Etl\Dto\FilterModelDto>") 
     */
    public $createdAt;
}