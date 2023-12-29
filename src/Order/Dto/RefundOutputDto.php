<?php

namespace Sherl\Sdk\Order\Dto;

use JMS\Serializer\Annotation as Serializer;

class RefundOutputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $object;

    /**
     * @var array<string, mixed>
     * @Serializer\Type("array<string, mixed>")
     */
    public $datas;

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
