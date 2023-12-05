<?php

namespace Sherl\Sdk\Calendar\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Calendar\Dto\CalendarEventDto;
use Sherl\Sdk\Common\Dto\Pagination;
use Sherl\Sdk\Common\Dto\ViewOutputDto;

class CalendarEventsPaginatedResultDto extends Pagination
{
    /**
     * @var CalendarEventDto[]
     * @Serializer\Type("array<Sherl\Sdk\Calendar\Dto\CalendarEventDto>")
     */
    public $results;

    /**
     * @var ViewOutputDto
     * @Serializer\Type("Sherl\Sdk\Common\Dto\ViewOutputDto")
     */
    public $view;
}
