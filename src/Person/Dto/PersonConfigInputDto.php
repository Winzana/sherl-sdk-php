<?php

namespace Sherl\Sdk\Person\Dto;

use JMS\Serializer\Annotation as Serializer;

class PersonConfigInputDto
{
    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $configs;
}
