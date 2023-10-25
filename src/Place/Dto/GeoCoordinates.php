<?php

namespace Sherl\Sdk\Place\Dto;

use JMS\Serializer\Annotation as Serializer;

class IGeoCoordinates extends AddressInfoDto
{
    /**
     * @var double
     * @Serializer\Type("double")
     */
    public $latitude;

    /**
     * @var double
     * @Serializer\Type("double")
     */
    public $longitude;
}
