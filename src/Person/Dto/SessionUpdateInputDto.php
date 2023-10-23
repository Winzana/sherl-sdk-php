<?php

namespace Sherl\Sdk\Person\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Person\Dto\ExperienceFormResponseDto;

use Sherl\Sdk\Person\Enum\TravelingGroup;

class SessionUpdateInputDto
{
    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $favoritesSites;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $ipAddress;

    /**
     * @var ExperienceFormResponseDto
     * @Serializer\Type("<Sherl\Sdk\Person\Dto\ExperienceFormResponseDto>")
     */
    public $experienceFormResponses;

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $mapFilters;

    /**
     * @var string[] // TODO: Change type ?
     * @Serializer\Type("array<string>")
     */
    public $disabilityConditions;

    /**
     * @var string[] // TODO: Change type ?
     * @Serializer\Type("array<string>")
     */
    public $favoriteTransportModes;

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $alertsDiscarded;

    /**
     * @var string[] // TODO: Change type ?
     * @Serializer\Type("array<string>")
     */
    public $location;

    /**
     * @var string[] // TODO: Change type ?
     * @Serializer\Type("array<string>")
     */
    public $keywords;
}
