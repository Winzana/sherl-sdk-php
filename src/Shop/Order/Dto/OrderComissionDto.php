<?php

namespace Sherl\Sdk\Shop\Order\Dto;

use JMS\Serializer\Annotation as Serializer;
use MangoPay\Transfer;

class OrderCommissionDto extends Transfer
{
    /**
     * @var DateTime
     * @Serializer\Type("DateTime")
     */
    public $createdAt;
}
