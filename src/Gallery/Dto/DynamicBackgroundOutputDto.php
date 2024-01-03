<?php

namespace Sherl\Sdk\Gallery\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Media\Dto\ImageObjectOutputDto;
use Sherl\Sdk\Gallery\Dto\GeoShapeInputDto;
use Sherl\Sdk\Gallery\Dto\PoiZonesInputDto;

use DateTime;

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
     * @var array<string, mixed>
     * @Serializer\Type("array<string, mixed>")
     */
    public $metadatas;

    /**
     * @var DateTime
     * @Serializer\Type("DateTime")
     */
    public $createdAt;

    /**
     * @var DateTime
     * @Serializer\Type("DateTime")
     */
    public $versionCreatedAt;

    /**
     * @var DateTime
     * @Serializer\Type("DateTime")
     */
    public $updatedAt;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $deleted;

    /**
     * @var string // DisplayZonesEnum // TODO: Change type when Shop domain merged
     * @Serializer\Type("string") // TODO: Change type for DisplayZonesEnum when Shop domain merged
     */
    public $displayZones;

    /**
     * @var PoiZonesInputDto
     * @Serializer\Type("Sherl\Sdk\Gallery\Dto\PoiZonesInputDto")
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
