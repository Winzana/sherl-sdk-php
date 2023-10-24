<?php

namespace Sherl\Sdk\Analytic\Dto;

use JMS\Serializer\Annotation as Serializer;

class AnalyticOutputDto
{
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

    /**
     * @var float
     * @Serializer\Type("float")
     */
    public $value;

    /**
     * @var float
     * @Serializer\Type("float")
     */
    public $number;

    /**
     * @var array
     * @Serializer\Type("array")
     */
    public $metadata;
}
