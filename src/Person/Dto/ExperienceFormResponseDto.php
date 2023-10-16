<?php

namespace Sherl\Sdk\Person\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Person\Enum\TravelingGroup;

class ExperienceFormResponseDto {

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
   * @var TravelingGroup
   * @Serializer\Type("Sherl\Sdk\Person\Enum\TravelingGroup")
   */
  public $travelingGroup;

    /**
   * @var string[]
   * @Serializer\Type("array<string>")
   */
  public $activities;
}