<?php

namespace Sherl\Sdk\Calendar\Dto;

use JMS\Serializer\Annotation as Serializer;
use DateTime;

class CreateCalendarEventInputDto
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
     * @var mixed
     * @Serializer\Type("mixed")
     */
    public $metadatas;
}
