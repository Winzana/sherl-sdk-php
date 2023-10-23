<?php

namespace Sherl\Sdk\Notification\Dto;

use JMS\Serializer\Annotation as Serializer;

class EmailContentOutputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $subject;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $text;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $html;
}
