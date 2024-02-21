<?php

namespace Sherl\Sdk\Person\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Person\Dto\SessionCreationInputDto;

class SessionUpdateInputDto extends SessionCreationInputDto
{
    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $keywords;
}
