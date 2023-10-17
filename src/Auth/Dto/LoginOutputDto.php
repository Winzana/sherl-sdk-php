<?php

namespace Sherl\Sdk\Auth\Dto;

use JMS\Serializer\Annotation as Serializer;

class LoginOutputDto
{

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $access_token;
}