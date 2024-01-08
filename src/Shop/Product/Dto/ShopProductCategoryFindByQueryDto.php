<?php

namespace Sherl\Sdk\Shop\Category\Dto;

use JMS\Serializer\Annotation as Serializer;

class ShopProductCategoryFindByQueryDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $organizationId;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $depth;
}
