<?php

namespace Sherl\Sdk\Calendar\Dto;

use JMS\Serializer\Annotation as Serializer;

class FindAvailabilitiesInputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $ownerUri;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $aboutUri;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $userPlaceUri;

    /**
     * @var mixed
     * @Serializer\Type("mixed")
     */
    public $metadatas;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $startDate;

    /**
    * @var string
    * @Serializer\Type("string")
    */
    public $endDate;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $scaleValue;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $available;
}
