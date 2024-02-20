<?php

namespace Sherl\Sdk\Etl\Dto;

use JMS\Serializer\Annotation as Serializer;

class ExtractTransformLoadResponseDto
{
    /**
     * @var boolean
     *  @Serializer\Type("boolean")
     */
    public $status;
}
