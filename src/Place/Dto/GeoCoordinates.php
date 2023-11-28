<?php

namespace Sherl\Sdk\Place\Dto;

use JMS\Serializer\Annotation as Serializer;

class GeoCoordinates extends AddressInfoDto
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
