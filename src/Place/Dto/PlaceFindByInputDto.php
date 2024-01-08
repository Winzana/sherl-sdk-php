<?php

namespace Sherl\Sdk\Place\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\common\Dto\PaginationFilterInputDto;

class PlaceFindByInputDto extends PaginationFilterInputDto
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
     * @var string
     * @Serializer\Type("string")
     */
    public $language;
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $consumerId;
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $query;
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $city;
}
