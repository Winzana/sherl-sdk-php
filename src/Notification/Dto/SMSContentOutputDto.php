<?php

namespace Sherl\Sdk\Notification\Dto;

use JMS\Serializer\Annotation as Serializer;

class SMSContentOutputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $text;
}
