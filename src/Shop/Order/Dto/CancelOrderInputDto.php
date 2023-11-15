<?php

namespace Sherl\Sdk\Shop\Order\Dto;

use JMS\Serializer\Annotation as Serializer;

class CancelOrderInputDto
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
