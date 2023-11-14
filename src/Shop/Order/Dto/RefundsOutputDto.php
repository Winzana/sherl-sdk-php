<?php

namespace Sherl\Sdk\Shop\Order\Dto;

use JMS\Serializer\Annotation as Serializer;

class RefundsOutputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $object: string;

    /**
     * @var array
     * @Serializer\Type("array<mixed>")
     */
    public $data: any[];

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $has_more: boolean;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $url;
}