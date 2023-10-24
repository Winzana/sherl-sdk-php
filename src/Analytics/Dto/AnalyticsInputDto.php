<?php

namespace Sherl\Sdk\Analytic\Dto;

use JMS\Serializer\Annotation as Serializer;

class AnalyticsInputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $organizationId;

    /**
     * @var string
     * @Serializer.Type("string")
     */
    public $userId;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $sort;
}
