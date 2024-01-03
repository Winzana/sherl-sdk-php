<?php

namespace Sherl\Sdk\Opinion\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Common\Dto\PaginationFiltersInputDto;

class OpinionFiltersDto extends PaginationFiltersInputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $opinionToUri;
}
