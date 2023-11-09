<?php

namespace Sherl\Sdk\Shop\Advertisement\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Shop\Enum\DisplayZoneEnum;

class AdvertismentOutputDto
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
     * @var array
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
     * @var string
     * @Serializer\Type("Sher\Sdk\Media\Dto\MediaObjectOutputDto")
     */
    public $backgroundImage;

    /**
     * @var array
     * @Serializer\Type("array<Sherl\Sdk\Shop\Advertisement\Dto\AdvertisementTranslationOutputDto>")
     */
    public $translations;

    /**
     * @var number
     * @Serializer\Type("number")
     */
    public $version;

    /**
     * @var number
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
