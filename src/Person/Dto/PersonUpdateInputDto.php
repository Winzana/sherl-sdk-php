<?php

namespace Sherl\Sdk\Person\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Person\Dto\AddressInputDto;
use Sherl\Sdk\Person\Dto\PersonOrganizationCreateInputDto;

use Sherl\Sdk\Person\Enum\Gender;
use Sherl\Sdk\Person\Enum\PersonType;

class PersonUpdateInputDto
{
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
     * @var AddressInputDto
     * @Serializer\Type("Sherl\Sdk\Person\Dto\AddressInputDto")
     */
    public $address;

    /**
     * @var PersonType
     * @Serializer\Type("Sherl\Sdk\Person\Dto\PersonType")
     */
    public $type;

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
     * @var PersonOrganizationCreateInputDto
     * @Serializer\Type("Sherl\Sdk\Person\Dto\PersonOrganizationCreateInputDto")
     */
    public $affiliation;

    /**
     * @var float
     * @Serializer\Type("float")
     */
    public $latitude;

    /**
     * @var float
     * @Serializer\Type("float")
     */
    public $longitude;

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

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $metadata;

    /**
   * @var string
   * @Serializer\Type("string")
   */
    public $userProfileUri;
}
