<?php

namespace Sherl\Sdk\Organization\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Calendar\Dto\DaysOutputDto;

class OrganizationDisplayedOutputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $actualityContent;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $actualityTitle;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $backgroundImg;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $logoImg;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $highlightImg;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $city;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $id;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $isBarService;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $isOpen;

    /**
     * @var float
     * @Serializer\Type("float")
     */
    public $latitude;

    /**
     * @var float
     * @Serializer\Type("float")
     */
    public $longitude;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $name;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $position;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $type;

    /**
     * @var DaysOutputDto[]
     * @Serializer\Type("array<Sherl\Sdk\Calendar\Dto\DaysOutputDto>")
     */
    public $weekTime;

    /**
     * @var array<string, mixed>
     * @Serializer\Type("array<string, mixed>")
     */
    public $metadatas;
}
