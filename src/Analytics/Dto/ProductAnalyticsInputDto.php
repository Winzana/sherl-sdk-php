<?php

namespace Sherl\Sdk\Analytic\Dto;

use JMS\Serializer\Annotation as Serializer;

class ProductAnalyticsInputDto extends AnalyticsInputBaseDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $productId;
}
