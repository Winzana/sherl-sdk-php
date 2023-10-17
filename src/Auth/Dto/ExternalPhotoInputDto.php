<?php

namespace Sherl\Sdk\Auth\Dto;

use JMS\Serializer\Annotation as Serializer;

class ExternalPhotoInputDto
{
  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $value;
}
