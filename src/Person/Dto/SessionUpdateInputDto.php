<?php

namespace Sherl\Sdk\Person\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Person\Dto\ExperienceFormResponseInputDto;

use Sherl\Sdk\Person\Enum\TravelingGroup;
use Sherl\Sdk\Common\Dto\LocationDto;
use Sherl\Sdk\Person\Dto\SessionCreationInputDto;

class SessionUpdateInputDto extends SessionCreationInputDto
{
    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $keywords;
}
