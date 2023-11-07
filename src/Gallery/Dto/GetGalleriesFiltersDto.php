<?php

namespace Sherl\Sdk\Contact\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Common\Dto\PaginationFilterInputDto;

class GetGalleriesFiltersDto extends PaginationFilterInputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $uri;
}
