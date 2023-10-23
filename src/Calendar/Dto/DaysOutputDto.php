<?php

namespace Sherl\Sdk\Calendar\Dto;

use JMS\Serializer\Annotation as Serializer;

class DaysOutputDto
{
  /**
   * @var boolean
   * @Serializer\Type("boolean")
   */
  public $closed;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $day;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $morningTime;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $nightTime;
}
