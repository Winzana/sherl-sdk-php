<?php

namespace Sherl\Sdk\Person\Dto;

use JMS\Serializer\Annotation as Serializer;

class FrequentedEstablishmentOutputDto {
  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $organizationId;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $organizationName;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $firstVisit;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $lastVisit;

  /**
   * @var boolean
   * @Serializer\Type("boolean")
   */
  public $isCustomer;
}