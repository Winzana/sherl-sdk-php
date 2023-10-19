<?php

namespace Sherl\Sdk\Organization\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Organization\Dto\FacebookThirdPartOutputDto;

class ThridPartyOutputDto
{
  /**
   * @var FacebookThirdPartOutputDto
   * @Serializer\Type("Sherl\Sdk\Organization\Dto\FacebookThirdPartOutputDto")
   */
  public $facebook;
}
