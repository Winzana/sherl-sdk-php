<?php

namespace Sherl\Sdk\Shop\Order\Dto;

use JMS\Serializer\Annotation as Serializer;

class RefundsOutputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $object;

    /**
     * @var array<mixed>
     * @Serializer\Type("array<mixed>")
     */
    public $data;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $has_more;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $url;
}
