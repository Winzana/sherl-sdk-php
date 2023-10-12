<?php

namespace Sherl\Sdk\Person\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Person\Dto\SettingsDetailOutputDto;

class SettingsOutputDto
{

  /**
   * @var SettingsDetailOutputDto
   * @Serializer\Type("Sherl\Sdk\Person\Dto\SettingsDetailOutputDto")
   */
  public $notifications;
}
