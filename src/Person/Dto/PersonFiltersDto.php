<?php

namespace Sherl\Sdk\Person\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Person\Dto\AddressDto;
use Sherl\Sdk\Person\Dto\PersonOrganizationCreateDto;
use Sherl\Sdk\Person\Dto\PersonDto;

use Sherl\Sdk\Common\Dto\Sort;

use Sherl\Sdk\Person\Enum\Gender;
use Sherl\Sdk\Person\Enum\PersonType;

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
  public $userId;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $q;

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
   * @var mixed
   */
  public $location;

  /**
   * @var mixed
   */
  public $subOrganizations;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $birthdate;

  /**
   * @var string
   * @Serializer(Type("string"))
   */
  public $email;

  /**
   * @var string
   * @Serializer(Type("string"))
   */
  public $gender;

  /**
   * @var string
   * @Serializer(Type("string"))
   */
  public $jobTitle;

  /**
   * @var boolean
   * @Serializer(Type("boolean"))
   */
  public $enabled;

  /**
   * @var string
   * @Serializer(Type("string"))
   */
  public $createdAt;

  /**
   * @var string
   * @Serializer(Type("string"))
   */
  public $updatedAt;

  /**
   * @var string
   * @Serializer(Type("string"))
   */
  public $analytics;

  /**
   * @var string
   * @Serializer(Type("string"))
   */
  public $noFrequentedEstablishment;

  /**
   * @var PersonType
   * @Serializer(Type("Sherl\Sdk\Person\Enum\PersonType"))
   */
  public $type;

  /**
   * @var Sort<PersonDto>
   * @Serializer(Type("Sort<PersonDto>"))
   */
  public $sort;

}
