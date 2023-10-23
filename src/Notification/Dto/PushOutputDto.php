<?php

namespace Sherl\Sdk\Notification\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Notification\Dto\PushContentOutputDto;

class PushOutputDto
{
    /**
     * @var PushContentOutputDto
     * @Serializer\Type("Sherl\Sdk\Notification\Dto\PushContentOutputDto")
     */
    public $fr;

    /**
     * @var PushContentOutputDto
     * @Serializer\Type("Sherl\Sdk\Notification\Dto\PushContentOutputDto")
     */
    public $en;

    /**
     * @var array
     * @Serializer\Type("array")
     */
    public $data;
}
