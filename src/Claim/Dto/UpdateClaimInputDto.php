<?php

namespace Sherl\Sdk\Claim\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Claim\Enum\ClaimStatus;

class UpdateClaimInputDto
{
  /**
   * @var ClaimStatus
   * @Serializer\Type("enum<'Sherl\Sdk\Claim\Enum\ClaimStatus', 'value'>")
   */
  public $status;
}
