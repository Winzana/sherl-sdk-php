<?php

namespace Sherl\Sdk\Auth\Dto;

use JMS\Serializer\Annotation as Serializer;

class ExternalNameInputDto
{
  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $familyName;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $givenName;
}
