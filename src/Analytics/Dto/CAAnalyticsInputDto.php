<?php

namespace Sherl\Sdk\Analytic\Dto;

use JMS\Serializer\Annotation as Serializer;

class CAAnalyticsInputDto extends AnalyticsInputBaseDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $organizationId;

    /**
     * @var bool
     * @Serializer\Type("bool")
     */
    public $average;
}
