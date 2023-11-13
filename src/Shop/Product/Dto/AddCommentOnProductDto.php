<?php

namespace Sherl\Sdk\Shop\Product\Dto;

use JMS\Serializer\Annotation as Serializer;

class AddCommentOnProductDto
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
    public $content;
}
