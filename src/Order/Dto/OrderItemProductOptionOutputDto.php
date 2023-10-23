<?php

namespace Sherl\Sdk\Order\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Order\Dto\OrderItemProductOptionItemOutputDto;

class OrderItemProductOptionOutputDto
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
     * @var OrderItemProductOptionItemOutputDto[]
     * @Serializer\Type("array<Sherl\Sdk\Order\Dto\OrderItemProductOptionItemOutputDto>")
     */
    public $items;
}
