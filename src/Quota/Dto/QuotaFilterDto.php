<?php

namespace Sherl\Sdk\Quota\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Common\Dto\PaginationFiltersInputDto;

class QuotaFilterDto extends PaginationFiltersInputDto
{
    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $page;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $itemsPerPage;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $uri;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $consumerId;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $ownerUri;

}
