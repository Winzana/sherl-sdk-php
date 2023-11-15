<?php

namespace Sherl\Sdk\Shop\Discount\Dto;

use JMS\Serializer\Annotation as Serializer;

class ProductRestrictionsWithProductUriDto
{
    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $requiredQuantity;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $productUri;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $categoryUri;
}
