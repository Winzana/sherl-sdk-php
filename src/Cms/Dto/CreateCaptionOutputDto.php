<?php

namespace Sherl\Sdk\Cms\Dto;

use JMS\Serializer\Annotation as Serializer;

class CreateCaptionOutputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $contentUrl;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $description;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $duration;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $encodingFormat;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $size;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $name;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $id;
}
