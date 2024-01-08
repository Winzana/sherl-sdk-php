<?php

namespace Sherl\Sdk\Shop\Category\Dto;

use JMS\Serializer\Annotation as Serializer;

class PublicCategoryAndSubCategoryFindByDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $q;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $organizationSlug;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $organizationId;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $organizationUri;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $depth;
}
