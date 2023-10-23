<?php

namespace Sherl\Sdk\Notification\Dto;

use JMS\Serializer\Annotation as Serializer;

class NotificationRegistrationOutputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $personId;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $consumerId;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $registrationToken;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $createdAt;
}
