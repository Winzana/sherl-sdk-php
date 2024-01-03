<?php

namespace Sherl\Sdk\Gallery\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Common\Dto\PaginationFilterInputDto;

use DateTime;

class GetDynamicBackgroundFilters extends PaginationFilterInputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $uri;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $id;

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
    public $postalCode;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $streetAddress;

    /**
     * @var DateTime
     * @Serializer\Type("DateTime")
     */
    public $createdAt;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $departement;

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
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $displayDeleted;

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $displayZones;

}
