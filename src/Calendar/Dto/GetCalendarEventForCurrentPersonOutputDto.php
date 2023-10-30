<?php

namespace Sherl\Sdk\Calendar\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Calendar\Dto\CalendarEventOutputDto;
use Sherl\Sdk\Common\Dto\Pagination;
use Sherl\Sdk\Common\Dto\ViewOutputDto;

class GetCalendarEventForCurrentPersonOutputDto extends Pagination
{
    /**
     * @var CalendarEventOutputDto[]
     * @Serializer\Type("array<Sherl\Sdk\Calendar\Dto\CalendarEventOutputDto>")
     */
    public $results;

    /**
     * @var ViewOutputDto
     * @Serializer\Type("Sherl\Sdk\Common\Dto\ViewOutputDto")
     */
    public $view;
}
