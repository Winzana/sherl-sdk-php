<?php

namespace Sherl\Sdk\Order\Dto;

use JMS\Serializer\Annotation as Serializer;

class OrderItemProductOptionItemOutputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $name;

    /**
     * @var float
     * @Serializer\Type("float")
     */
    public $priceTaxIncluded;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $quantity;
}
