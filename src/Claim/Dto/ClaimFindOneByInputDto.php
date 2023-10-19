<?php

namespace Sherl\Sdk\Claim\Dto;

use JMS\Serializer\Annotation as Serializer;

class ClaimFindOneByInputDto
{
  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $id;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $personId;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $orderId;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $consumerId;
}
