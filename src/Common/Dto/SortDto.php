<?php

namespace Sherl\Sdk\Common;

class Sort
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $field;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $order;
}
