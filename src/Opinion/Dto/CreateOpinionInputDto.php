<?php

namespace Sherl\Sdk\Opinion\Dto;

use JMS\Serializer\Annotation as Serializer;

class CreateOpinionInputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $comment;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $opinionToUri;

    /**
     * @var float
     * @Serializer\Type("float")
     */
    public $score;
}
