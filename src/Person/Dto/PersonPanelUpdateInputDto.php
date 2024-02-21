<?php

namespace Sherl\Sdk\Person\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Person\Dto\PersonPanelUpdateFilterInputDto;

class PersonPanelUpdateInputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $name;

    /**
     * @var PersonPanelUpdateFilterInputDto[]
     * @Serializer\Type("array<Sherl\Sdk\Person\Dto\PersonPanelUpdateFilterInputDto>")
     */
    public $filters;
}
