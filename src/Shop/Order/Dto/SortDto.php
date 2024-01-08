<?php

namespace Sherl\Sdk\Shop\Order\Dto;

use Sherl\Sdk\Common\Dto\PaginationFiltersInputDto;

class SortDto extends PaginationFiltersInputDto
{
    /**
     * @var string|integer
     */
    public $order;

    /**
     * @var string
     */
    public $field;
}
