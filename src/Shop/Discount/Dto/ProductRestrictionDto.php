<?php

namespace Sherl\Sdk\Shop\Discount\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Shop\Product\Dto\ProductOutputDto;
use Sherl\Sdk\Shop\Category\Dto\ProductCategoryDto;

class ProductRestrictionDto
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
     * @var ProductCategoryDto
     * @Serializer\Type("Sherl\Sdk\Shop\Product\Dto\ProductCategoryDto")
     */
    public $category;
}
