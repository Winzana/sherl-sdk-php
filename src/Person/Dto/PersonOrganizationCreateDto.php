<?php

namespace Sherl\Sdk\Person\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Person\Dto\AddressDto;

class PersonOrganizationCreateDto {

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $id;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $uri;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $legalName;

  /**
   * @var AddressDto
   * @Serializer\Type("Sherl\Sdk\Person\Dto\AddressDto")
   */
  public $location;

  /**
   * @var string[]
   * @Serializer\Type("array<string>")
   */
  public $subOrganizations;
}