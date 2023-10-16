<?php

namespace Sherl\Sdk\Person\Dto;

use JMS\Serializer\Annotation as Serializer;

class PersonPanelCreateFilterDto {

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $name;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $value;
}