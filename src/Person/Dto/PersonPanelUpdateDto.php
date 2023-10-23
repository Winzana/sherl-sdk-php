<?php

namespace Sherl\Sdk\Person\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Person\Dto\PersonPanelIUpdateFilterDto;

class PersonPanelIUpdateDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $name;

    /**
     * @var PersonPanelIUpdateFilterDto[]
     * @Serializer\Type("array<Sherl\Sdk\Person\Dto\PersonPanelIUpdateFilterDto>")
     */
    public $filters;
}
