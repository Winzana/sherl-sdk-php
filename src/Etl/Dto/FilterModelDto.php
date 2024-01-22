<?php

namespace Sherl\Sdk\Etl\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Etl\Dto\FilterOptionsModelDto;
use Sherl\Sdk\Etl\Dto\FilterFieldModelDto;

class FilterModelDto
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
     * @var FilterOptionsModelDto
     * @Serializer\Type("Sherl\Sdk\Etl\Dto\FilterOptionsModelDto")
     */
    public $options;

    /**
     * @var FilterFieldModelDto[]
     * @Serializer\Type("array<Sherl\Sdk\Etl\Dto\FilterFieldModelDto>")
     */
    public $fields;
}
