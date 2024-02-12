<?php

namespace Sherl\Sdk\Config\Dto;

use JMS\Serializer\Annotation as Serializer;

class ConfigOutputDto
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
    public $code;

    /**
     * @var mixed
     * @Serializer\Type("mixed")
     */
    public $value;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $consumer;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $position;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $appliedTo;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $isPublic;
}
