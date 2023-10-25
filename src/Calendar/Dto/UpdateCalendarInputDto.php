<?php

namespace Sherl\Sdk\Calendar\Dto;

use JMS\Serializer\Annotation as Serializer;

class UpdateCalendarInputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $aboutUri;

    /**
     * @var OpenHoursSpecification
     * @Serializer\Type("array<Sherl\Sdk\Calendar\Dto\OenHoursSpecification>")
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
