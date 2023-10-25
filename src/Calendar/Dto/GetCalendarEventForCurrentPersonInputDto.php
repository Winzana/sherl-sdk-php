<?php

namespace Sherl\Sdk\Calendat\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Place\Dto\GeoCoordinate;

class GetCalendarEventForCurrentPersonInputDto
{
    /**
     * @var string
     * Serializer\Type("string")
     */
    public $id;

    /**
     * @var string
     * Serializer\Type("string")
     */
    public $uri;

    /**
     * @var string
     * Serializer\Type("string")
     */
    public $aboutUri;

    /**
     * @var string
     * Serializer\Type("string")
     */
    public $ownerUri;

    /**
     * @var string
     * Serializer\Type("string")
     */
    public $startDate;

    /**
     * @var string
     * Serializer\Type("string")
     */
    public $endDate;

}
