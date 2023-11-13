<?php

namespace Sherl\Sdk\Shop\Product\Dto;

use JMS\Serializer\Annotation as Serializer;

class FindProductCommentsInputDto extends PaginationFilters
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $productId;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $personId;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $organizationUri;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $sort;
}
