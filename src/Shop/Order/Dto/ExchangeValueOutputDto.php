<?php

namespace Sherl\Sdk\Shop\Order\Dto;

use JMS\Serializer\Annotation as Serializer;

class ExchangeValueOutputDto
{
          /**
     * @var string
     * @Serializer\Type("string")
     */
    pubic $currency: number;

        /**
     * @var float
     * @Serializer\Type("float")
     */
    pubic $amount;
}