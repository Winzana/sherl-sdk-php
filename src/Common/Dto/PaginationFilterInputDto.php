<?php

namespace Sherl\Sdk\Common\Dto;

use JMS\Serializer\Annotation as Serializer;

class PaginationFilterInputDto
{
    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $itemsPerPage;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $page;
}
