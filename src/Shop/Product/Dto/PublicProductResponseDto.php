<?php

namespace Sherl\Sdk\Shop\Product\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Shop\Product\Enum\ShopProductType;
use Sherl\Sdk\Shop\Product\Dto\PublicProductResponseDto;
use Sherl\Sdk\Shop\Product\Dto\PublicCategoryResponseDto;
use Sherl\Sdk\Shop\Product\Dto\OfferDto;
use Sherl\Sdk\Shop\Product\Dto\OptionDto;
use Sherl\Sdk\Media\Dto\ImageObjectDto;

class PublicProductResponseDto
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
    public $consumerId;

    /**
     * @var ShopProductType
     * @Serializer\Type("Sherl\Sdk\Shop\Product\Dto\ShopProductType")
     */
    public $type;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $parentUri;

    /**
     * @var PublicProductResponseDto
     * @Serializer\Type("Sherl\Sdk\Shop\Product\Dto\PublicProductResponseDto")
     */
    public $parent;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $name;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $slug;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $slogan;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $description;

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
     * @var PublicCategoryResponseDto
     * @Serializer\Type("Sherl\Sdk\Shop\Product\Dto\PublicCategoryResponseDto")
     */
    public $category;

    /**
     * @var array
     * @Serializer\Type("array<Sherl\Sdk\Shop\Product\Dto\PublicCategoryResponseDto>")
     */
    public $categories;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $isEnable;

    /**
     * @var array
     * @Serializer\Type("array<Sherl\Sdk\Shop\Product\Dto\OfferDto>")
     */
    public $offers;

    /**
     * @var mixed
     * @Serializer\Type("array")
     */
    public $metadatas;

    /**
     * @var array
     * @Serializer\Type("array<Sherl\Sdk\Shop\Product\Dto\OptionDto>")
     */
    public $options;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $organizationUri;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $isCustom;

    /**
     * @var array
     * @Serializer\Type("array<Sherl\Sdk\Shop\Product\Dto\ImageObjectDto>")
     */
    public $photos;

    /**
     * @var array
     * @Serializer\Type("array")
     */
    public $restrictions;

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
}
