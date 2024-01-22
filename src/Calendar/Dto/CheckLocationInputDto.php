<?php

namespace Sherl\Sdk\Calendar\Dto;

use JMS\Serializer\Annotation as Serializer;

class CheckLocationInputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $calendarOwnerUri;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $country;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $locality;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $region;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $postalCode;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $streetAddress;
}
