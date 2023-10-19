<?php

namespace Sherl\Sdk\Claim\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Common\Dto\PaginationFilterInputDto;

use Sherl\Sdk\Claim\Enum\ClaimStatus;

class FindClaimsInputDto extends PaginationFilterInputDto
{
  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $id = null;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $personId = null;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $orderId = null;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $consumerId = null;


  /**
   * @var ClaimStatus
   * @Serializer\Type("enum<'Sherl\Sdk\Claim\Enum\ClaimStatus', 'value'>")
   */
  public $status = null;
}
