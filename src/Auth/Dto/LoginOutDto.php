<?php

namespace Sherl\Sdk\Auth\Dto;

use JMS\Serializer\Annotation as Serializer;

class LoginOutDto {

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $access_token;
}