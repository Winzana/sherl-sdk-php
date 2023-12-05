<?php

namespace Sherl\Sdk\Calendar\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Common\Dto\AggregationsOutputDto;
use Sherl\Sdk\Common\Dto\ViewOutputDto;

use Sherl\Sdk\Calendar\Dto\CalendarEventDto;

class GetCalendarEventForCalendarResultsDto
{
    /**
     * @var CalendarEventDto[]
     * @Serializer\Type("array<Sherl\Sdk\Notification\Dto\NotificationOutputDto>")
     */
    public $results;

    /**
     * @var ViewOutputDto
     * @Serializer\Type("Sherl\Sdk\Common\Dto\ViewOutputDto")
     */
    public $view;

    /**
     * @var array<string,AggregationsOutputDto>
     * @Serializer\Type("array<string, Sherl\Sdk\Common\Dto\AggregationsOutputDto>")
     */
    public $aggregations;
}
