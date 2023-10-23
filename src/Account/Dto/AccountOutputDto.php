<?php

namespace Sherl\Sdk\Account\Dto;

use JMS\Serializer\Annotation as Serializer;

class AccountOutputDto
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
    public $uri;

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $projects;

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
     * @var AccountLocationInputDto
     * @Serializer\Type("Sherl\Sdk\Account\Dto\AccountLocationInputDto")
     */
    public $location;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $createdAt;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $updatedAt;
}
