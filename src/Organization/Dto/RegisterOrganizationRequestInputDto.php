<?php

namespace Sherl\Sdk\Organization\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Organization\Dto\OrganizationInputDto;
use Sherl\Sdk\Person\Dto\PersonOutputDto;

class RegisterOrganizationRequestInputDto
{
  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $sponsoredByCode;

  /**
   * @var OrganizationInputDto
   * @Serializer\Type("Sherl\Sdk\Organization\Dto\OrganizationInputDto")
   */
  public $organization;

  /**
   * @var PersonOutputDto
   * @Serializer\Type("Sherl\Sdk\Person\Dto\PersonOutputDto")
   */
  public $person;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $password;

}
