<?php

namespace Sherl\Sdk\Shop\Product\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Shop\Product\Enum\ProductTags;
use Sherl\Sdk\Shop\Product\Enum\ProductDisplayMode;
use Sherl\Sdk\Shop\Product\Enum\ProductTypeEnum;

class ProductFindByDto extends PaginationFiltersInputDto
{
    /**
     * @var array
     * @Serializer\Type("array<string>")
     */
    public $ids;

    /**
     * @var array
     * @Serializer\Type("array<string>")
     */
    public $externalIds;

    /**
     * @var array
     * @Serializer\Type("array<string>")
     */
    public $excludedExternalIds;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $externalIdentifier;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $uri;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $versionNumber;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $slug;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $parentUri;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $organizationUri;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $organizationSlug;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $name;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $categoryUri;

    /**
     * @var array
     * @Serializer\Type("array<string>")
     */
    public $categoryUris;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $consumerId;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $q;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $isEnable;

    /**
     * @var array
     * @Serializer\Type("array<string>")
     */
    public $languages;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $placeForward;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $strictPlaceForward;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $geopoint;

    /**
     * @var float
     * @Serializer\Type("float")
     */
    public $distance;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $withinHours;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $startDate;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $endDate;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $displayAllVersion;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $includeDeleted;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    public $isUpdatedByHuman;

    /**
     * @var ProductTags
     * @Serializer\Type("Sherl\Sdk\Shop\Product\Dto\ProductTags")
     */
    public $tag;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $tags;

    /**
     * @var ProductDisplayMode
     * @Serializer\Type("Sherl\Sdk\Shop\Product\Dto\ProductDisplayMode")
     */
    public $displayMode;

    /**
     * @var ProductTypeEnum
     * @Serializer\Type("Sherl\Sdk\Shop\Product\Dto\ProductTypeEnum")
     */
    public $type;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $noBind;

    /**
     * @var array
     * @Serializer\Type("array<string>")
     */
    public $uriOfPanels;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $panel;
}
