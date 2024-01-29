<?php

namespace Sherl\Sdk\Cms\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Common\Dto\PaginationFiltersInputDto;
use DateTime;

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
     * @var \DateTime
     * @Serializer\Type("DateTime")
     */
    public $beginDate;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
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
