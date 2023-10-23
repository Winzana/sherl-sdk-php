<?php

namespace Sherl\Sdk\Place\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Place\Dto\AddressInfoDto;

class AddressOutputDto extends AddressInfoDto
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
  public $createdAt;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $updatedAt;
}
