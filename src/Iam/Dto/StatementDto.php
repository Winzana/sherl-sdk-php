<?php

namespace Sherl\Sdk\Iam\Dto;

use JMS\Serializer\Annotation as Serializer;

class StatementDto
{
    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $action;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $effect;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $ressources;

}
