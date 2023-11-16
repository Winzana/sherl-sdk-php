<?php

namespace Sherl\Sdk\Shop\Order\Dto;

use Sherl\Sdk\Common\Dto\Pagination;
use Sherl\Sdk\Shop\Order\Dto\OrderResponse;

class OrderFindOutputDto extends Pagination
{
    /**
     * @var OrderResponse[]
     * @Serializer\Type("array<Sherl\Sdk\Shop\Order\Dto\OrderResponse>")
     */
    public $results;

    /**
     * @var ViewOutputDto
     * @Serializer\Type("Sherl\Sdk\Common\Dto\ViewOutputDto")
     */
    public $view;
}
