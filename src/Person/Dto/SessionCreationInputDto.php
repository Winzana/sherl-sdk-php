<?php

namespace Sherl\Sdk\Person\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Person\Dto\ExperienceFormResponseInputDto;

use Sherl\Sdk\Person\Enum\TravelingGroup;
use Sherl\Sdk\Common\Dto\LocationDto;

class SessionCreationInputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $ipAddress;

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $favoritesSites;

    /**
     * @var ExperienceFormResponseInputDto
     * @Serializer\Type("<Sherl\Sdk\Person\Dto\ExperienceFormResponseInputDto>")
     */
    public $experienceFormResponses;

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $mapFilters;

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $disabilityConditions;

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $favoriteTransportModes;

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $alertsDiscarded;

    /**
     * @var LocationDto
     * @Serializer\Type("array<string>")
     */
    public $location;
}
