<?php

namespace Sherl\Sdk\Contact\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Place\Dto\AddressInfoDto;

class PoiZoneInputDto
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
