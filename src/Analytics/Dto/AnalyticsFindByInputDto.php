<?php

namespace Sherl\Sdk\Analytic\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Common\Dto\PaginationFilterInputDto;
use Sherl\Sdk\Analytics\Enum\TraceEnum;

class AnalyticsFindByInputDto extends PaginationFilterInputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $id;

    /**
     * @var TraceEnum
     * @Serializer\Type("TraceEnum")
     */
    public $action;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $objectUri;

    /**
     * @var mixed
     * @Serializer\Type("mixed")
     */
    public $value;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $sortBy;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $sortOrder;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $aggregateGroupBy;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $aggregateSum;
}
