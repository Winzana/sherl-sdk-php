<?php

namespace Sherl\Sdk\Etl\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Etl\Dto\ConfigModelDto;

class ExtractTransformLoadInputDto
{
    /**
     * @var ConfigModelDto[]
     * @Serializer\Type("array<Sherl\Sdk\Etl\Dto\ConfigModelDto>")
     */
    public $config;
}
