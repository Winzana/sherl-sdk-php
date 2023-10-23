<?php

namespace Sherl\Sdk\Auth\Dto;

use JMS\Serializer\Annotation as Serializer;

class ExternalEmailInputDto
{
  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $value;

  /**
   * @var boolean
   * @Serializer\Type("boolean")
   */
  public $verified;
}
