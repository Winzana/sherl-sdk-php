<?php

namespace Sherl\Sdk\Claim\Dto;

use JMS\Serializer\Annotation as Serializer;

class ClaimReplyOutput
{
  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $content;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $personId;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $createdAt;
}
