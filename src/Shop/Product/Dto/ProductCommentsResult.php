<?php

namespace Sherl\Sdk\Shop\Product\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Common\Dto\AggregationsOutputDto;
use Sherl\Sdk\Common\Dto\ViewOutputDto;

use Sherl\Sdk\Shop\Product\Dto\CommentDto;

class ProductCommentsResult
{
    /**
     * @var CommentDto[]
     * @Serializer\Type("array<Sherl\Sdk\Shop\Product\Dto\CommentDto>")
     */
    public $results;

    /**
     * @var ViewOutputDto
     * @Serializer\Type("Sherl\Sdk\Common\Dto\ViewOutputDto")
     */
    public $view;

    /**
     * @var array<string,AggregationsOutputDto>
     * @Serializer\Type("array<string, Sherl\Sdk\Common\Dto\AggregationsOutputDto>")
     */
    public $aggregations;
}
