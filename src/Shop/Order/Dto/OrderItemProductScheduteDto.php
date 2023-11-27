<?php

namespace Sherl\Sdk\Shop\Order\Dto;

use JMS\Serializer\Annotation as Serializer;

class OrderItemProductScheduleDto
{
    /**
     * @var DateTime
     * @Serializer\Type("DateTime")
     */
    public $allowedFromDate;


    /**
     * @var DateTime
     * @Serializer\Type("DateTime")
     */
    public $allowedUntilDate;
}
