<?php

namespace Sherl\Sdk\Shop\Advertisement\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Shop\Enum\DisplayZoneEnum;
use Sherl\Sdk\Common\Dto\PaginationFilterInputDto;

class FindAdvertisementInputDto extends PaginationFilterInputDto
{
    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $displayDeleted;

    /**
     * @var DisplayZoneEnum[]
     * @Serializer\Type("array<Sherl\Sdk\Shop\Enum\DisplayZoneEnum>")
     */
    public $displayZones;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $shuffle;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $q;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $displayAllVersion;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $panel;

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $uriOfPanels;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $sortBy;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $sortOrder;
}
