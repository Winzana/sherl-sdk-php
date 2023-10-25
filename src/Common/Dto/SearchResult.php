<?php

namespace Sherl\Sdk\Common\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Common\Dto\Pagination;
use Sherl\Sdk\Common\Dto\AggregationsOutputDto;

class SearchResult extends Pagination
{
    /**
     * @var array
     * @Serializer\Type("array<string, Sherl\Sdk\Common\Dto\AggregationsOutputDto>")
     */
    public $aggregations;
}
