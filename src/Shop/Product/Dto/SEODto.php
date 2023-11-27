<?php

namespace Sherl\Sdk\Shop\Seo\Dto;

use JMS\Serializer\Annotation as Serializer;

class SEODto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $title;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $description;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $keywords;

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $others;
}
