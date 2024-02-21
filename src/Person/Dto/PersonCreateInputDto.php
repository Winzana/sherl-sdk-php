<?php

namespace Sherl\Sdk\Person\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Person\Dto\AddressInputDto;
use Sherl\Sdk\Person\Dto\PersonOrganizationCreateInputDto;

use Sherl\Sdk\Person\Enum\Gender;

class PersonCreateInputDto
{
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
     * @var AddressInputDto
     * @Serializer\Type("Sherl\Sdk\Person\Dto\AddressInputDto")
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
     * @var PersonOrganizationCreateInputDto
     * @Serializer\Type("Sherl\Sdk\Person\Dto\PersonOrganizationCreateInputDto")
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
     * @var string
     * @Serializer\Type("string")
     */
    public $password;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $confirmPassword;

    /**
     * @var Gender
     * @Serializer\Type("enum<'Sherl\Sdk\Person\Enum\Gender', 'value'>")
     */
    public $gender;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $jobTitle;
}
