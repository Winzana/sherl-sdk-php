<?php

namespace Sherl\Sdk\Gallery\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Place\Dto\AddressInfoDto;

class GeoShapeInputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $type;

    /**
     * @var integer[]
     * @Serializer\Type("array<integer>")
     */
    public $coordinates;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $radius;

}
