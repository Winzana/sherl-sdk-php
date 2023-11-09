<?php

namespace Sherl\Sdk\Shop\Advertisement\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Shop\Enum\DisplayZoneEnum;

class CreateAdvertismentInputDto
{
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
     * @var string
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
     * @var string
     * @Serializer\Type("Sherl\Sdk\Shop\Advertisement\Dto\AdvertisementTranslationOutputDto")
     */
    public $translations;

    /**
     * @var mixed
     * @Serializer\Type("mixed")
     */
    public $metadatas;
}
