<?php

namespace Sherl\Sdk\Person\Dto;

use JMS\Serializer\Annotation as Serializer;
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
