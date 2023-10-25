<?php

namespace Sherl\Sdk\Calendar\Dto;

use JMS\Serializer\Annotation as Serializer;

class CalendaFilterInputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $id;

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
     * @var string
     * @Serializer\Type("string")
     */
    public $consumerId;
}
