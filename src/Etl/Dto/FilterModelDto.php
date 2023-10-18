<?php

namespace Sherl\Sdk\Etl\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Etl\Dto\FilterOptionsModelDto;
use Sherl\Sdk\Etl\Dto\FilterModelDto;

class FilterModel
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $name;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $type;

    /**
     * @var FilterOptionsModel
     * @Serializer\Type("array<Sherl\Sdk\Etl\Dto\FilterOptionsModelDto>") 
     */
    public $options;

    /**
     * @var FilterFieldModel[]
     * @Serializer\Type("array<Sherl\Sdk\Etl\Dto\FilterModelDto>") 
     */
    public $fields;
}