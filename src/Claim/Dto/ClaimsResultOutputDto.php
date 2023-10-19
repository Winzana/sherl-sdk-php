<?php

namespace Sherl\Sdk\Claim\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Claim\Dto\ClaimOutputDto;
use Sherl\Sdk\Common\Dto\Pagination;
use Sherl\Sdk\Common\Dto\ViewOutputDto;

class ClaimsResultOutputDto extends Pagination
{
  /**
   * @var ClaimOutputDto[]
   * @Serializer\Type("array<Sherl\Sdk\Claim\Dto\ClaimOutputDto>")
   */
  public $results;

  /**
   * @var ViewOutputDto
   * @Serializer\Type("Sherl\Sdk\Common\Dto\ViewOutputDto")
   */
  public $view;
}
