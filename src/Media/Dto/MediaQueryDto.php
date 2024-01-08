<?php

namespace Sherl\Sdk\Media\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Media\Enum\TypeEnum;

class MediaQueryDto
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
    public $domain;

    /**
     * @var TypeEnum
     * @Serializer\Type("Sher\Sdk\Media\Enum\TypeEnum")
     */
    public $type;
}