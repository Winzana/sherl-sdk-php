<?php

namespace Sherl\Sdk\Shop\Category\Dto;

use JMS\Serializer\Annotation as Serializer;

class PublicCategoryResponseDto
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
     * @var string
     * @Serializer\Type("string")
     */
    public $parentUri;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $globalUri;

    /**
     * @var PublicCategoryResponseDto
     * @Serializer\Type("Sherl\Sdk\Shop\Category\Dto\PublicCategoryResponseDto")
     */
    public $parent;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $color;

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
     * @var float
     * @Serializer\Type("float")
     */
    public $taxeValue;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $position;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $organizationUri;

    /**
     * @var array
     * @Serializer\Type("array<Sherl\Sdk\Shop\Category\Dto\PublicCategoryResponseDto>")
     */
    public $subCategories;

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
    public $aggCategory;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $is;
}
