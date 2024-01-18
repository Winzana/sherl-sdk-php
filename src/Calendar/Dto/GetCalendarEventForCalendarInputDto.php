<?php

namespace Sherl\Sdk\Calendar\Dto;

use Sherl\Sdk\Common\Dto\PaginationFilterInputDto;
use Sherl\Sdk\Common\Dto\DateFilterOutputDto;

class GetCalendarEventForCalendarInputDto extends PaginationFilterInputDto
{
    /**
     * @var string
     * Serializer\Type("string")
     */
    public $id;

    /**
     * @var string
     * Serializer\Type("string")
     */
    public $aboutUri;

    /**
     * @var string
     * Serializer\Type("string")
     */
    public $ownerUri;

    /**
     * @var DateFilterOutputDto
     * Serializer\Type("Sherl\Sdk\Common\Dto\DateFilterOutputDto")
     */
    public $startDate;

    /**
     * @var DateFilterOutputDto
     * Serializer\Type("Sherl\Sdk\Common\Dto\DateFilterOutputDto")
     */
    public $endDate;

    /**
     * @var string
     * Serializer\Type("string")
     */
    public $calendarUri;

    /**
     * @var string
     * Serializer\Type("string")
     */
    public $consumerId;
}
