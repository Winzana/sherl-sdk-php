<?php

namespace Sherl\Sdk\Analytic\Dto;

use JMS\Serializer\Annotation as Serializer;

class AnalyticsOutputDto
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
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $metadata;
}
