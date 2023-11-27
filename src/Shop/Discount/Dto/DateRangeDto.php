<?php

namespace Sherl\Sdk\Shop\Discount\Dto;

use JMS\Serializer\Annotation as Serializer;

class DateRestrictionDto
{
  /**
   * @var DateTime
   * @Serializer\Type("DateTime")
   */
  public $from;

  /**
   * @var DateTime
   * @Serializer\Type("DateTime")
   */
  public $to;
}
