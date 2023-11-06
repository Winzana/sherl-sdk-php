<?php

namespace Sherl\Sdk\Notification\Dto;

use JMS\Serializer\Annotation as Serializer;

class SetConfigInputDto
{
    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $isPublic;

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
    public $appliedTo;
}
