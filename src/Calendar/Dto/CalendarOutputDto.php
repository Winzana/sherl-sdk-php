<?php

namespace Sherl\Sdk\Calendar\Dto;

use JMS\Serializer\Annotation as Serializer;

class CalendarOutputDto
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
    public $uri;

    /**
     * @var string
     * @Serializer\Type("array<Sherl\Sdk\Place\Dto\OpeningHoursSpecificationOutputDto>")
     */
    public $availabilities;

    /**
     * @var string
     * @Serializer\Type("array<Sherl\Sdk\Place\Dto\OpeningHoursSpecificationOutputDto>")
     */
    public $unavailabilities;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $ownerUri;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $aboutUri;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $enabled;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $consumerId;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $createdAt;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $updatedAt;

    /**
     * @var mixed
     * @Serializer\Type("mixed")
     */
    public $metadatas;

}
