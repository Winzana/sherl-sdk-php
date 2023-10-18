<?php

namespace Sherl\Sdk\Etl\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Etl\Enum\WrapperIdentifier;

class WrapperModel
{
    /**
     * @var WrapperIdentifier
     * @Serializer\Type("Sherl\Sdk\Etl\Enum\WrapperIdentifier")
     */
    public $identifier;

    /**
     * @var array
     * @Serializer\Type("array")
     */
    public $options;
}