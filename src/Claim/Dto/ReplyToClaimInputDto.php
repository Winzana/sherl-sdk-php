<?php

namespace Sherl\Sdk\Claim\Dto;

use JMS\Serializer\Annotation as Serializer;

class ReplyToClaimInputDto
{
  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $content;
}
