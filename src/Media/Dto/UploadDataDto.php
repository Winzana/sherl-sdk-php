<?php

namespace Sher\Sdk\Media\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sher\Sdk\Media\Enum\TypeEnum;

class UploadDataDto
{
    /**
     * @var mixed
     * @Serializer\Type("mixed")
     */
    public $upload;

}
