<?php

namespace Sherl\Sdk\Opinion\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Opinion\Dto\OpinionStatusEnum;

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

class AverageDto
{
    /**
     * @var float
     * @Serializer\Type("float")
     */
    public $average;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $count;
}
