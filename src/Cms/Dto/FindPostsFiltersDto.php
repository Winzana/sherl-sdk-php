<?php

namespace Sherl\Sdk\Cms\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Common\Dto\PaginationFiltersInputDto;

class FindPostsFiltersDto extends PaginationFiltersInputDto
{
    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    public $authorUri;

    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    public $slug;

    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    public $organizationUri;

    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    public $type;

    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    public $beginDate;

    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    public $endDate;

    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    public $status;

    /**
     * @var string|null
     * @Serializer\Type("string")
     */
    public $id;
}
