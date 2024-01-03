<?php

namespace Sherl\Sdk\BugReport\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\BugReport\Dto\BugReportOutputDto;
use Sherl\Sdk\Common\Dto\AggregationsOutputDto;
use Sherl\Sdk\Common\Dto\Pagination;
use Sherl\Sdk\Common\Dto\ViewOutputDto;

class BugReportListOutputDto extends Pagination
{
    /**
     * @var BugReportOutputDto[]
     * @Serializer\Type("array<Sherl\Sdk\BugReport\Dto\BugReportOutputDto>")
     */
    public array $results;

    /**
     * @var ViewOutputDto
     * @Serializer\Type("Sherl\Sdk\Common\Dto\ViewOutputDto")
     */
    public mixed $view;


    /**
     * @var array<string,AggregationsOutputDto>
     * @Serializer\Type("array<string, Sherl\Sdk\Common\Dto\AggregationsOutputDto>")
     */
    public $aggregations;
}
