<?php

namespace Sherl\Sdk\Calendar\Dto;

use Sherl\Sdk\Common\Dto\PaginationFilterInputDto;

class GetCalendarEventForCurrentPersonInputDto extends PaginationFilterInputDto
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
    public $uri;

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
     * @Serializer\Type("Sherl\Sdk\Common\Dto\DateFilterOutputDto")
     */
    public $startDate;

    /**
     * @var DateFilterOutputDto
     * @Serializer\Type("Sherl\Sdk\Common\Dto\DateFilterOutputDto")
     */
    public $endDate;

}
