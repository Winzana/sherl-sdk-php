<?php

namespace Sherl\Sdk\Shop\Discount\Dto;

use Sherl\Sdk\Common\Dto\ViewOutputDto;
use Sherl\Sdk\Shop\Discount\Dto\DiscountDto;

class DiscountPaginatedResultOutputDto
{
    /**
     * @var DiscountDto[]
     * @Serializer\Type("array<Sherl\Sdk\Shop\Discount\Dto\DiscountDto>")
     */
    public $results;

    /**
     * @var ViewOutputDto
     * @Serializer\Type("Sherl\Sdk\Common\Dto\ViewOutputDto")
     */
    public $view;
}