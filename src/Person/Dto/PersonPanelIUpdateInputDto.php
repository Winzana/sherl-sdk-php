<?php

namespace Sherl\Sdk\Person\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Person\Dto\PersonPanelIUpdateFilterInputDto;

class PersonPanelIUpdateInputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $name;

    /**
     * @var PersonPanelIUpdateFilterInputDto[]
     * @Serializer\Type("array<Sherl\Sdk\Person\Dto\PersonPanelIUpdateFilterInputDto>")
     */
    public $filters;
}
