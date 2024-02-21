<?php

namespace Sherl\Sdk\Shop\Product\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Shop\Product\Dto\OfferDto;
use Sherl\Sdk\Shop\Product\Dto\MetadatasDto;
use Sherl\Sdk\Shop\Product\Dto\OptionDto;

class ProductResponseDto
{
    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $isEnable;

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
    public $name;

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
     * @var OfferDto[]
     * @Serializer\Type("array<Sherl\Sdk\Shop\Product\Dto\OfferDto>")
     */
    public $offers;

    /**
     * @var MetadatasDto
     * @Serializer\Type("Sherl\Sdk\Shop\Product\Dto\MetadatasDto")
     */
    public $metadatas;

    /**
     * @var OptionDto[]
     * @Serializer\Type("array<Sherl\Sdk\Shop\Product\Dto\OptionDto>")
     */
    public $options;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $organizationUri;

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
     * @var mixed
     * @Serializer\Type("mixed")
     */
    public $category;
}
