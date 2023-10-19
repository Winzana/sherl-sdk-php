<?php

namespace Sherl\Sdk\Notification\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Notification\Dto\EmailContentOutputDto;

class EmailOutputDto
{
  /**
   * @var EmailContentOutputDto
   * @Serializer\Type("Sherl\Sdk\Notification\Dto\EmailContentOutputDto")
   */
  public $fr;

  /**
   * @var EmailContentOutputDto
   * @Serializer\Type("Sherl\Sdk\Notification\Dto\EmailContentOutputDto")
   */
  public $en;
}
