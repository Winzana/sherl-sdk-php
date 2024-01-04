<?php

namespace Sherl\Sdk\Media\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Media\Enum\TypeEnum;

class UploadDataDto
{
    /**
     * @var mixed
     * @Serializer\Type("mixed")
     */
    public $upload;

}
