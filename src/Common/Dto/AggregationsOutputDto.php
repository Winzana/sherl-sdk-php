<?php

namespace Sherl\Sdk\Common\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Common\Dto\AggregationKeysOutputDto;

class AggregationsOutputDto extends AggregationKeysOutputDto
{
  /**
   * @var array<string, AggregationKeysOutputDto>
   * @Serializer\Type("array<string, Sherl\Sdk\Common\Dto\AggregationKeysOutputDto>")
   */
  public $sub;
}
