<?php

namespace Sherl\Sdk\Person\Dto;

use JMS\Serializer\Annotation as Serializer;

class FrequentedEstablishmentDto {

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $organizationId;

  /**
   * @var boolean
   * @Serializer\Type("boolean")
   */
  public $isCustomer;
}