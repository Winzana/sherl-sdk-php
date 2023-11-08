<?php

namespace Sherl\Sdk\Opinion\Dto;

use JMS\Serializer\Annotation as Serializer;

class OpinionFiltersDto extends PaginationFilters
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $opinionToUri;
}