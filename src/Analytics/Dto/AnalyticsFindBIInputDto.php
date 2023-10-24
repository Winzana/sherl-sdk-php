<?php

namespace Sherl\Sdk\Analytic\Dto;

use JMS\Serializer\Annotation as Serializer;

class AnalyticsFindBIInputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $index;

    /**
     * @var mixed
     * @Serializer\Type("array")
     */
    public $filters;
}
