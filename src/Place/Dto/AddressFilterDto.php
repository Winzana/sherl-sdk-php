<?php

namespace Sherl\Sdk\Place\Dto;

use JMS\Serializer\Annotation as Serializer;

class AddressFilterDto
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
    public $country;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $locality;

    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    public $region;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $postalCode;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $streetAddress;
}