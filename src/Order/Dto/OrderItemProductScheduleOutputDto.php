<?php

namespace Sherl\Sdk\Order\Dto;

use JMS\Serializer\Annotation as Serializer;

class OrderItemProductScheduleOutputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $allowedFromDate;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $allowedUntilDate;
}
