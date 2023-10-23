<?php

namespace Sherl\Sdk\Shop\Discount\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Shop\Product\Dto\ProductOutputDto;
use Sherl\Sdk\Shop\Product\Dto\CategoryOutputDto;

class ProductRestrictionOutputDto
{
    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $requiredQuantity;

    /**
     * @var ProductOutputDto
     * @Serializer\Type("Sherl\Sdk\Shop\Product\Dto\ProductOutputDto")
     */
    public $product;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $categoryUri;

    /**
     * @var CategoryOutputDto
     * @Serializer\Type("Sherl\Sdk\Shop\Product\Dto\CategoryOutputDto")
     */
    public $category;
}
