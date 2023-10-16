<?php

namespace Sherl\Sdk\Person\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Person\Dto\AddressDto;
use Sherl\Sdk\Person\Dto\PersonOrganizationCreateDto;

use Sherl\Sdk\Person\Enum\Gender;

class PersonCreateDto {

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $id;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $firstName;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $lastName;

  /**
   * @var AddressDto
   * @Serializer\Type("Sherl\Sdk\Person\Dto\AddressDto")
   */
  public $address;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $phoneNumber;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $mobilePhoneNumber;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $faxNumber;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $nationality;

  /**
   * @var PersonOrganizationCreateDto
   * @Serializer\Type("Sherl\Sdk\Person\Dto\PersonOrganizationCreateDto")
   */
  public $affiliation;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $birthDate;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $email;

  /**
   * @var Gender
   * @Serializer\Type("Sherl\Sdk\Person\Enum\Gender")
   */
  public $gender;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $jobTitle;
}