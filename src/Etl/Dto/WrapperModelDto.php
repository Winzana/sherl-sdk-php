<?php

namespace Sherl\Sdk\Etl\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Etl\Enum\WrapperIdentifierEnum;

class WrapperModelDto
{
    /**
     * @var WrapperIdentifierEnum
     * @Serializer\Type("Sherl\Sdk\Etl\Enum\WrapperIdentifierEnum")
     */
    public $identifier;

    /**
     * @var object|null
     * @Serializer\Type("object")
     */
    public $options;
}
