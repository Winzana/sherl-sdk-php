<?php

namespace Sherl\Sdk\Etl\Dto;

use JMS\Serializer\Annotation as Serializer;

class EtlResponseDto
{
    /**
     *  @Serializer\Type("boolean")
     * @var bool
     */
    public $status;
}
