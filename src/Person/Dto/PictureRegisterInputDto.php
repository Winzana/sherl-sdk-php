<?php

namespace Sherl\Sdk\Person\Dto;

use JMS\Serializer\Annotation as Serializer;

use Psr\Http\Message\UploadedFileInterface;

class PictureRegisterInputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $personId;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $mediaId;

    /**
     * @var UploadedFileInterface
     * @Serializer\Type("UploadedFileInterface")
     */
    public $file;

}
