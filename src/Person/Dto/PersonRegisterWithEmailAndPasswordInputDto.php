<?php

namespace Sherl\Sdk\Person\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Person\Dto\AddressInputDto;

class PersonRegisterWithEmailAndPasswordInputDto
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
}
