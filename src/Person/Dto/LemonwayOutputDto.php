<?php

namespace Sherl\Sdk\Person\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Person\Dto\LemonwayCardOutputDto;

class LemonwayOutputDto {

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $customerId;

  /**
   * @var LemonwayCardOutputDto[]
   * @Serializer\Type("array<Sherl\Sdk\Person\Dto\LemonwayCardOutputDto>")
   */
  public $cards;
}