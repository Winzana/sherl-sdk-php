<?php

namespace Sherl\Sdk\Calendar\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Calendar\Dto\CalendarEventDto;
use Sherl\Sdk\Common\Dto\ViewOutputDto;

class CalendarEventsPaginatedResultDto
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

    public function __construct(mixed $results, mixed $view)
    {
        $this->results = $results;
        $this->view = $view;
    }
}
