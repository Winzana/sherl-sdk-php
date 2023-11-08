<?php

namespace Sherl\Sdk\Organization\Dto;

use JMS\Serializer\Annotation as Serializer;

class AddressRequestInputDto
{
  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $originId;

  /**
   * @var integer
   * @Serializer\Type("integer")
   */
  public $latitude;

  /**
   * @var integer
   * @Serializer\Type("integer")
   */
  public $longitude;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $organizationId;
}
