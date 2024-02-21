<?php

namespace Sherl\Sdk\Shop\Order\Dto;

use Sherl\Sdk\Common\Dto\ViewOutputDto;

use Sherl\Sdk\Shop\Order\Dto\OrderDto;

class OrderFindOutputDto
{
    /**
     * @var OrderDto[]
     * @Serializer\Type("array<Sherl\Sdk\Order\Dto\OrderOutputDto>")
     */
    public $results;

    /**
     * @var ViewOutputDto
     * @Serializer\Type("Sherl\Sdk\Common\Dto\ViewOutputDto")
     */
    public $view;
}
