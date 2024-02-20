<?php

namespace Sherl\Sdk\Etl\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Etl\Enum\WrapperIdentifierEnum;

class WrapperModelDto
{
    /**
     * @var WrapperIdentifierEnum
     * @Serializer\Type("enum<'Sherl\Sdk\Etl\Enum\WrapperIdentifierEnum', 'value'>")
     */
    public $identifier;

    /**
     * @var mixed
     * @Serializer\Type("mixed")
     */
    public $options;
}
