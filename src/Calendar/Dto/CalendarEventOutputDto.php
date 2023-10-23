<?php

namespace Sherl\Sdk\Calendar\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Place\Dto\AddressOutputDto;

class CalendarEventOutputDto
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
     * @var AddressOutputDto
     * @Serializer\Type("Sherl\Sdk\Place\Dto\AddressOutputDto")
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
}
