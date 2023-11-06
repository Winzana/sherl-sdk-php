<?php

namespace Sherl\Sdk\Person\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Person\Dto\AddressInputDto;
use Sherl\Sdk\Person\Dto\PersonOrganizationCreateInputDto;
use Sherl\Sdk\Person\Dto\PersonInputDto;

use Sherl\Sdk\Common\Dto\Sort;

use Sherl\Sdk\Person\Enum\Gender;
use Sherl\Sdk\Person\Enum\PersonType;

class PersonFiltersDto
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
     * @Serializer\Type("mixed")
     */
    public $location;

    /**
     * @var mixed
     * @Serializer\Type("mixed")
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
     * @var Gender
     * @Serializer\Type("Sherl\Sdk\Person\Enum\Gender")
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
     * @var Sort<PersonInputDto>
     * @Serializer(Type("Sort<PersonInputDto>"))
     */
    public $sort;

}
