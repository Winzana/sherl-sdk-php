<?php

namespace Sherl\Sdk\Person\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Person\Dto\StripeCardOutputDto;

class StripeOutputDto {

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $customerId;

  /**
   * @var StripeCardOutputDto[]
   * @Serializer\Type("array<Sherl\Sdk\Person\Dto\StripeCardOutputDto>")
   */
  public $cards;
}