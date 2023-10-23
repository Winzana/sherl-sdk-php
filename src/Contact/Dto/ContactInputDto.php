<?php

namespace Sherl\Sdk\Contact\Dto;

use JMS\Serializer\Annotation as Serializer;

class ContactInputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $name;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $email;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $message;
}
