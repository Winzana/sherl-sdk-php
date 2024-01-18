<?php

namespace Sherl\Sdk\Calendar\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Place\Dto\GeoCoordinates;

class FindAvailabilitiesOutputDto
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
     * @Serializer\Type("string")
     */
    public $aboutUri;


    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $ownerUri;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $calendarUri;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $startDate;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $endDate;

    /**
     * @var GeoCoordinates
     * @Serializer\Type("array<Sherl\Sdk\Place\Dto\GeoCoordinates>")
     */
    public $location;

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
