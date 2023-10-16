<?php

namespace Sherl\Sdk\Person\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Person\Dto\PersonPanelCreateFilterDto;

class PersonPanelCreateDto {

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $id;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $name;

  /**
   * @var string
   *  @Serializer\Type("Sherl\Sdk\Person\Dto\PersonPanelCreateFilterDto")
   */
  public $filters;
}