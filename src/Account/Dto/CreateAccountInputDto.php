<?php

namespace Sherl\Sdk\Account\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Place\Dto\AddressInfoDto;

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
     * @var string
     * @Serializer\Type("string")
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
