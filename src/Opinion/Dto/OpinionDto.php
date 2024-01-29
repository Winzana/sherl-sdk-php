<?php

namespace Sherl\Sdk\Opinion\Dto;

use JMS\Serializer\Annotation as Serializer;
use DateTime;

class OpinionDto
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
    public $opinionToUri;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $comment;

    /**
     * @var float
     * @Serializer\Type("float")
     */
    public $score;

    /**
     * @var DateTime
     * @Serializer\Type("DateTime")
     */
    public $opinionFromUri;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public string $createdAt;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public string $uri;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public string $status;

    /**
     * @var mixed
     * @Serializer\Type("mixed")
     */
    public $opinionFrom;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $refusedComment;

    /**
     * @var mixed
     * @Serializer\Type("mixed")
     */
    public $opinionTo;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $isClaimed;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $claimComment;

    /**
     * @var DateTime
     * @Serializer\Type("DateTime")
     */
    public $updatedAt;
}
