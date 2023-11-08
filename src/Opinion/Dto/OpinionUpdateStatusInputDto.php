<?php

namespace Sherl\Sdk\Opinion\Dto;

use JMS\Serializer\Annotation as Serializer;

class AverageDto
{
    /**
     * @var float
     * @Serializer\Type("float")
     */
    public $average;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $count;
}
