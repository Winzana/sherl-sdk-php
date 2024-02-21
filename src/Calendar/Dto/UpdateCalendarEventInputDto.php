<?php

namespace Sherl\Sdk\Calendar\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Calendar\Dto\OpenHoursSpecification;
use Sherl\Sdk\Common\Dto\DateFilterOutputDto;

class UpdateCalendarEventInputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $aboutUri;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $ownerUri;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $calendarUri;

    /**
     * @var DateFilterOutputDto
     * @Serializer\Type("Sherl\Sdk\Common\Dto\DateFilterOutputDto")
     */
    public $startDate;

    /**
     * @var DateFilterOutputDto
     * @Serializer\Type("Sherl\Sdk\Common\Dto\DateFilterOutputDto")
     */
    public $endDate;
}
