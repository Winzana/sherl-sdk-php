<?php

namespace Sherl\Sdk\Person\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Person\Dto\PersonInputDto;
use Sherl\Sdk\Person\Dto\FrequentedEstablishmentDto;
use Sherl\Sdk\Place\Dto\AddressFilterDto;

use Sherl\Sdk\Place\Dto\GeoCoordinatesDto;

use Sherl\Sdk\Organization\Dto\OrganizationFilterDto;

use DateTime;

use Sherl\Sdk\Common\Dto\SortDto;

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
     * @var AddressFilterDto
     * @Serializer\Type("Sherl\Sdk\Place\Dto\AddressFilterDto")
     */
    public $address;

    /**
     * @var GeoCoordinatesDto
     * @Serializer\Type("Sherl\Sdk\Place\Dto\GeoCoordinatesDto")
     */
    public $subscriptionLocation;

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
     * @var OrganizationFilterDto
     * @Serializer\Type("Sherl\Sdk\Organization\Dto\OrganizationFilterDto")
     */
    public $affiliation;

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
     * @Serializer\Type("string")
     */
    public $email;

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

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $enabled;

    /**
     * @var DateTime
     * @Serializer\Type("DateTime")
     */
    public $createdAt;

    /**
     * @var DateTime
     * @Serializer\Type("DateTime")
     */
    public $updatedAt;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $analytics;

    /**
     * @var FrequentedEstablishmentDto
     * @Serializer\Type("Sherl\Sdk\Person\Dto\FrequentedEstablishmentDto")
     */
    public $frequentedEstablishment;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $noFrequentedEstablishment;

    /**
     * @var PersonType
     * @Serializer\Type("enum<'Sherl\Sdk\Person\Enum\PersonType', 'value'>")
     */
    public $type;

    /**
     * @var SortDto<PersonInputDto>
     * @Serializer\Type("SortDto<Sherl\Sdk\Person\Dto\PersonInputDto>")
     */
    public $sort;

}
