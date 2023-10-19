<?php

namespace Sherl\Sdk\Notification\Dto;

use JMS\Serializer\Annotation as Serializer;

class PushContentOutputDto
{
  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $title;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $text;
}
