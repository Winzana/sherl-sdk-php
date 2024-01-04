<?php

namespace Sherl\Sdk\Gallery\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Media\Dto\ImageObjectOutputDto;
use Sherl\Sdk\Gallery\Dto\PoiZonesInputDto;

class CreateDynamicBackgroundInputDto
{
    /**
     * @var ImageObjectOutputDto
     * @Serializer\Type("Sherl\Sdk\Media\Dto\ImageObjectOutputDto")
     */
    public $media;

    /**
     * @var array<string, mixed>
     * @Serializer\Type("array<string, mixed>")
     */
    public $metadatas;

    /**
     * @var string // DisplayZonesEnum // TODO: Change type when Shop domain merged
     * @Serializer\Type("string") // TODO: Change type for DisplayZonesEnum when Shop domain merged
     */
    public $displayZones;

    /**
     * @var PoiZonesInputDto
     * @Serializer\Type("Sherl\Sdk\Gallery\Dto\PoiZoneInputDto")
     */
    public $locations;
}
