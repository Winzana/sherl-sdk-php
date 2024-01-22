<?php

namespace Sherl\Sdk\Calendat\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Place\Dto\GeoCoordinates;
use DateTime;

class CheckLocationOutputDto
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
     * @var DateTime
     * @Serializer\Type("DateTime")
     */
    public $startDate;

    /**
     * @var DateTime
     * @Serializer\Type("DateTime")
     */
    public $endDate;

    /**
     *  @var GeoCoordinates
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
