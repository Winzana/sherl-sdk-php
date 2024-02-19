<?php

namespace Sherl\Sdk\Person\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Person\Enum\AccountType;

class PersonUpdateAddressInputDto
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
     * @var string
     * @Serializer\Type("string")
     */
    public $country;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $locality;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $region;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $department;

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $types;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $postalCode;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $streetAddress;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $complementaryStreetAddress;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $name;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $originId;

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
    public $consumerId;

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

    /**
     * @var AccountType
     * @Serializer\Type("enum<'Sherl\Sdk\Person\Enum\AccountType', 'value'>")
     */
    public $type;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $isDefault;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $googleToken;
}
