<?php

namespace Sherl\Sdk\Shop\Advertisement\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sher\Sdk\Media\Dto\MediaObjectOutputDto;

use Sherl\Sdk\Shop\Advertisement\Enum\DisplayZoneEnum;
use Sherl\Sdk\Shop\Advertisement\Dto\AdvertisementTranslationOutputDto;

class AdvertisementOutputDto
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
    public $name;
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $description;

    /**
     * @var array<DisplayZoneEnum>
     * @Serializer\Type("array<Sherl\Sdk\Shop\Enum\DisplayZoneEnum>")
     */
    public $displayZones;

    /**
     * @var number
     * @Serializer\Type("number")
     */
    public $numberOfDisplay;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $delete;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $redirectUrl;

    /**
     * @var MediaObjectOutputDto
     * @Serializer\Type("Sher\Sdk\Media\Dto\MediaObjectOutputDto")
     */
    public $backgroundImage;

    /**
     * @var array<AdvertisementTranslationOutputDto>
     * @Serializer\Type("array<Sherl\Sdk\Shop\Advertisement\Dto\AdvertisementTranslationOutputDto>")
     */
    public $translations;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $version;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $parentUri;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $updatedAt;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $createdAt;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $versionCreatedAt;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $updatedBy;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $createdBy;

    /** @var string
    * @Serializer\Type("string")
    */
    public $versionCreatedBy;
    /**
     * @var mixed
     * @Serializer\Type("mixed")
     */
    public $metadatas;
}
