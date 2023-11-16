<?php

namespace Sherl\Sdk\Shop\Discount\Dto;

use Sherl\Sdk\Common\Dto\Pagination;

class DiscountPaginatedResultOutputDto extends Pagination
{
    /**
     * @var DiscountOutputDto[]
     * @Serializer\Type("array<Sherl\Sdk\Shop\Discount\Dto\DiscountOutputDto>")
     */
    public $results;

    /**
     * @var ViewOutputDto
     * @Serializer\Type("Sherl\Sdk\Common\Dto\ViewOutputDto")
     */
    public $view;
}
