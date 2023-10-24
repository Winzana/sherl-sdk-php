<?php

namespace Sherl\Sdk\Analytic\Dto;

use JMS\Serializer\Annotation as Serializer;

class NotificationsAnalyticsInputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $beginDate;

    /**
     * @var string
     * @Serializer.Type("string")
     */
    public $endDate;

    /**
     * @var string
     * @Serializer.Type("string")
     */
    public $organizationId;
}
