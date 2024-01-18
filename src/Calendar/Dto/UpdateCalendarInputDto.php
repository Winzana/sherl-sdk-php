<?php

namespace Sherl\Sdk\Calendar\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Calendar\Dto\OenHoursSpecification;

class UpdateCalendarInputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $aboutUri;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $ownerUri;

    /**
     * @var OpeningHoursSpecificationOutputDto
     * @Serializer\Type("array<Sherl\Sdk\Calendar\Dto\OpeningHoursSpecificationOutputDto>")
     */
    public $availabilities;

    /**
     * @var mixed
     * @Serializer\Type("mixed")
     */
    public $metadatas;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $enabled;
}
