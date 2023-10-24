<?php

namespace Sherl\Sdk\Cms\Dto;

use JMS\Serializer\Annotation as Serializer;

class CMSArticleTrainingCreateInputDto
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
     * @var array
     * @Serializer\Type("array<string>")
     */
    public $tags;
}