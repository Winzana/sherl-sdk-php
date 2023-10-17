<?php

namespace Sherl\Sdk\Claim\Dto;

use JMS\Serializer\Annotation as Serializer;

class ClaimSchedulesDto
{
  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $allowedFromDate;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $allowedUntilDate;
}
