<?php

namespace Sherl\Sdk\Organization\Dto;

use JMS\Serializer\Annotation as Serializer;

class OrganizationCommunicationOutputDto
{
  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $title;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $message;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $icon;
}
