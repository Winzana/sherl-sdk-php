<?php

namespace Sherl\Sdk\Person\Dto;

use JMS\Serializer\Annotation as Serializer;

class PersonConfigDto {

  /**
   * @var string[]
   * @Serializer\Type("array<string>")
   */
  public $configs;
}