<?php

namespace Sherl\Sdk\Cms\Dto;

use JMS\Serializer\Annotation as Serializer;

class CMSArticleFaqCreateInputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $title;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $content;
}