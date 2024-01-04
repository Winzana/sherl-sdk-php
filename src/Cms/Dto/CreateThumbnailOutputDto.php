<?php

namespace Sherl\Sdk\Cms\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Cms\Dto\CreateCaptionOutputDto;

class CreateThumbnailOutputDto
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
    public $uri;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $width;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $height;

    /**
     * @var CreateCaptionOutputDto
     * @Serializer\Type("Sherl\Sdk\Cms\Dto\CreateCaptionOutputDto")
     */
    public $caption;
}
