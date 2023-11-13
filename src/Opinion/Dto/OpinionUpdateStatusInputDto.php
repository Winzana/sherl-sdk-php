<?php

namespace Sherl\Sdk\Opinion\Dto;

use JMS\Serializer\Annotation as Serializer;

class OpinionUpdateStatusInputDto
{
    /**
     * @var OpinionStatusEnum
     * @Serializer\Type("Sherl\Sdk\Opinion\Dto\OpinionStatusEnum")
     */
    public $status;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $refusedComment;
}
