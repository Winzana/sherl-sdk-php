<?php

namespace Sherl\Sdk\Shop\Advertisement\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Shop\Advertisement\Enum\DisplayZoneEnum;

use Sherl\Sdk\Media\Dto\MediaObjectOutputDto;

use Sherl\Sdk\Shop\Advertisement\Dto\AdvertisementTranslationDto;

class CreateAdvertisementInputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $description;

    /**
     * @var DisplayZoneEnum[]
     * @Serializer\Type("array<Sherl\Sdk\Shop\Enum\DisplayZoneEnum>")
     */
    public $displayZones;

    /**
     * @var MediaObjectOutputDto
     * @Serializer\Type("Sher\Sdk\Media\Dto\MediaObjectOutputDto")
     */
    public $backgroundImage;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $name;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $redirectUrl;

    /**
     * @var AdvertisementTranslationDto[]
     * @Serializer\Type("array<Sherl\Sdk\Shop\Advertisement\Dto\AdvertisementTranslationDto>")
     */
    public $translations;

    /**
     * @var mixed
     * @Serializer\Type("mixed")
     */
    public $metadatas;
}
