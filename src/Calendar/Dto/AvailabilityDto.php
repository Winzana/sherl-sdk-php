<?php

namespace Sherl\Sdk\Calendar\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Place\Dto\PlaceOutputDto;

class AvailabilityDto
{
  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $from;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $to;

  /**
   * @var boolean
   * @Serializer\Type("boolean")
   */
  public $available;

  /**
   * @var boolean
   * @Serializer\Type("boolean")
   */
  public $isRoaming;

  /**
   * @var PlaceOutputDto
   * @Serializer\Type("Sherl\Sdk\Place\Dto\PlaceOutputDto")
   */
  public $place;
}
