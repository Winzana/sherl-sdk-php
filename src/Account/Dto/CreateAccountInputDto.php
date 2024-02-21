<?php

namespace Sherl\Sdk\Account\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Place\Dto\AddressInfoDto;
use Sherl\Sdk\Person\Enum\Gender;

class CreateAccountInputDto
{
    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $hosts;

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $ips;

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
    public $email;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $mobilePhoneNumber;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $birthDate;

    /**
     * @var Gender
     * @Serializer\Type("enum<'Sherl\Sdk\Person\Enum\Gender', 'value'>")
     */
    public $gender;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $legalName;

    /**
     * @var AddressInfoDto
     * @Serializer\Type("Sherl\Sdk\Place\Dto\AddressInfoDto")
     */
    public $location;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $password;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $passwordRepeat;
}
