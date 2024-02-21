<?php

namespace Sherl\Sdk\Media\Dto;

use JMS\Serializer\Annotation as Serializer;

class MediaObjectDto
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
     * @var float
     * @Serializer\Type("float")
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