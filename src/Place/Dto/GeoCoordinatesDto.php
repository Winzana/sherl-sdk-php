<?php

namespace Sherl\Sdk\Place\Dto;

use JMS\Serializer\Annotation as Serializer;

class GeoCoordinatesDto
{
    /**
   * @var float
   * @Serializer\Type("float")
   */
    public $latitude;

    /**
   * @var float
   * @Serializer\Type("float")
   */
    public $longitude;
}
