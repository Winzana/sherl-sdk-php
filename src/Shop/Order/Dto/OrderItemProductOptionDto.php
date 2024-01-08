<?php

namespace Sherl\Sdk\Shop\Order\Dto;

use Sherl\Sdk\Shop\Order\Dto\OrderItemProductOptionItemDto;

use JMS\Serializer\Annotation as Serializer;

class OrderItemProductOptionDto
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
    public $name;
    /**
     * @var OrderItemProductOptionItemDto[]
     * @Serializer\Type("array<Sherl\Sdk\Shop\Order\Dto\OrderItemProductOptionItemDto>")
     */
    public $items;
}
