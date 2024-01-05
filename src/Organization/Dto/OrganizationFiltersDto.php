<?php

namespace Sherl\Sdk\Organization\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Place\Dto\PlaceOutputDto;

class OrganizationFiltersDto
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
    public $slug;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $sponsorshipCode;

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $ids;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $q;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $legalName;

    /**
     * @var PlaceOutputDto
     * @Serializer\Type("Sherl\Sdk\Place\Dto\PlaceOutputDto")
     */
    public $location;

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
    public $uri;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $distance;

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $types;

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $serviceTypes;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $enabled;

    /**
     * @var bool
     * @Serializer\Type("bool")
     */
    public $isPublic;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $categoryUri;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $productUri;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $productName;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $deliveryQuery;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $day;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $hour;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $isRoaming;

    /**
     * @var string
     * @Serializer(Type("string"))
     */
    public $facetted;

    /**
     * @var string
     * @Serializer(Type("string"))
     */
    public $analytics;

    /**
     * @var string[]
     * @Serializer(Type("array<string>"))
     */
    public $opinion;

    /**
     * @var string[]
     * @Serializer(Type("array<string>"))
     */
    public $price;

    /**
     * @var string[]
     * @Serializer(Type("array<string>"))
     */
    public $category;

    /**
     * @var string[]
     * @Serializer(Type("array<string>"))
     */
    public $subCategory;

    /**
     * @var bool
     * @Serializer\Type("bool")
     */
    public $noBind;

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $sort;


}
