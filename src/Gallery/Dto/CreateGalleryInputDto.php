<?php

namespace Sherl\Sdk\Contact\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Media\Dto\ImageObjectOutputDto;

class CreateGalleryInputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $categoryUri;

    /**
     * @var ImageObjectOutputDto
     * @Serializer\Type("Sherl\Sdk\Media\Dto\ImageObjectOutputDto")
     */
    public $media;
}
