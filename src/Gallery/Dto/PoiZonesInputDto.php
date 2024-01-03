<?php

namespace Sherl\Sdk\Gallery\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Place\Dto\AddressInfoDto;

class PoiZonesInputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $distance;

    /**
     * @var AddressInfoDto
     * @Serializer\Type("Sherl\Sdk\Place\Dto\AddressInfoDto")
     */
    public $location;

}
