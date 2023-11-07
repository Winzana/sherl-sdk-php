<?php

namespace Sherl\Sdk\Contact\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Media\Dto\ImageObjectOutputDto;
use Sherl\Sdk\Gallery\Dto\GeoShapeInputDto;

class DynamicBackgroundOutputDto
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
     * @var ImageObjectOutputDto[]
     * @Serializer\Type("array<Sherl\Sdk\Media\Dto\ImageObjectOutputDto>")
     */
    public $medias;

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $metadatas;

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
    public $updatedAt;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $deleted;

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

    /**
     * @var GeoShapeInputDto
     * @Serializer\Type("Sherl\Sdk\Gallery\Dto\GeoShapeInputDto")
     */
    public $geoShapes;

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
    public $updatedBy;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $createdBy;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $versionCreatedBy;
}
