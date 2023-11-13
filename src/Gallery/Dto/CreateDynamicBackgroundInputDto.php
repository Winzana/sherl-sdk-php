<?php

namespace Sherl\Sdk\Contact\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Media\Dto\ImageObjectOutputDto;
use Sherl\Sdk\Gallery\Dto\PoiZoneInputDto;

class CreateDynamicBackgroundInputDto
{
    /**
     * @var ImageObjectOutputDto
     * @Serializer\Type("Sherl\Sdk\Media\Dto\ImageObjectOutputDto")
     */
    public $media;

    public $metadatas = ['key' => 'string'];

    /**
     * @var DisplayZonesEnum
     * @Serializer\Type("DisplayZonesEnum") // TODO: Change import when Shop domain merged
     */
    public $displayZones;

    /**
     * @var PoiZoneInputDto
     * @Serializer\Type("Sherl\Sdk\Gallery\Dto\PoiZoneInputDto")
     */
    public $locations;
}
