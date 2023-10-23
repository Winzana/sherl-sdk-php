<?php

namespace Sherl\Sdk\Common\Dto;

use JMS\Serializer\Annotation as Serializer;

class AggregationKeysOutputDto
{
    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $count;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $key;
}
