<?php

namespace Sherl\Sdk\Notification\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Notification\Dto\SMSContentOutputDto;

class SMSOutputDto
{
    /**
     * @var SMSContentOutputDto
     * @Serializer\Type("Sherl\Sdk\Notification\Dto\SMSContentOutputDto")
     */
    public $fr;

    /**
     * @var SMSContentOutputDto
     * @Serializer\Type("Sherl\Sdk\Notification\Dto\SMSContentOutputDto")
     */
    public $en;
}
