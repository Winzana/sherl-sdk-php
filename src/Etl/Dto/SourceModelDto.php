<?php

namespace Sherl\Sdk\Etl\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Etl\Dto\OptionsModelDto;
use Sherl\Sdk\Etl\Enum\ExtractSourceMethodEnum;

class SourceModelDto
{
    /**
     * @var ExtractSourceMethodEnum
     * @Serializer\Type("Sherl\Sdk\Etl\Enum\ExtractSourceMethodEnum")
     */
    public $method;

    /**
     * @var OptionsModelDto
     * @Serializer\Type("Sherl\Sdk\Etl\Dto\OptionsModelDto")
     */
    public $options;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $name;
}
