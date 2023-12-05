<?php

namespace Sherl\Sdk\Calendar\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Common\Dto\PaginationFilterInputDto;

class GetCalendarEventByOwnerInputDto extends PaginationFilterInputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $calendarOwnerUri;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $calendarAboutUri;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $ownerUri;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $aboutUri;

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
