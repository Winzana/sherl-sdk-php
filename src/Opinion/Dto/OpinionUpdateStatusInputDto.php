<?php

namespace Sherl\Sdk\Opinion\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Opinion\Enum\OpinionStatusEnum;

class OpinionUpdateStatusInputDto
{
    /**
     * @var OpinionStatusEnum
     * @Serializer\Type("enum<'Sherl\Sdk\Opinion\Dto\OpinionStatusEnum', 'value'>")
     */
    public $status;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $refusedComment;
}
