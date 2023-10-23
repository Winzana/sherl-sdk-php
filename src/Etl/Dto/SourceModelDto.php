<?php

namespace Sherl\Sdk\Etl\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Etl\Dto\OptionsModelDto;
use Sherl\Sdk\Etl\Enum\ExtractSourceMethod;

class SourceModel
{
    /**
     * @var ExtractSourceMethod
     * @Serializer\Type("Sherl\Sdk\Etl\Enum\ExtractSourceMethod")
     */
    public $method;

    /**
     * @var OptionsModel
     * @Serializer\Type("Sherl\Sdk\Etl\Dto\ConfigModelDto") 
     */
    public $options;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $name;
}