<?php

namespace Sherl\Sdk\Claim\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Common\Dto\PaginationFilterInputDto;

class FindClaimsInputDto extends PaginationFilterInputDto
{
  /**
   * @var mixed
   * @Serializer\Type("mixed")
   */
  public $filters;
}
