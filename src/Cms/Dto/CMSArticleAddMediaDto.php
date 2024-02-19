<?php

namespace Sherl\Sdk\Cms\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Cms\Dto\CreateCaptionOutputDto;
use Sherl\Sdk\Cms\Dto\CreateThumbnailOutputDto;

class CMSArticleAddMediaDto
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
     * @var integer
     * @Serializer\Type("integer")
     */
    public $width;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $height;

    /**
     * @var CreateCaptionOutputDto
     * @Serializer\Type("Sherl\Sdk\Cms\Dto\CreateCaptionOutputDto")
     */
    public $caption;

    /**
     * @var CreateThumbnailOutputDto
     * @Serializer\Type("Sherl\Sdk\Cms\Dto\CreateThumbnailOutputDto")
     */
    public $thumbnail;
}
