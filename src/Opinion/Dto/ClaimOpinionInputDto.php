<?php

namespace Sherl\Sdk\Opinion\Dto;

use JMS\Serializer\Annotation as Serializer;

class ClaimOpinionInputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $claimComment;
}
