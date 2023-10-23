<?php

namespace Sherl\Sdk\Organization\Dto;

use JMS\Serializer\Annotation as Serializer;

class PersonConfigValueOutputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $code;

    /**
     * @var mixed
     * @Serializer\Type("mixed")
     */
    public $value;
}
