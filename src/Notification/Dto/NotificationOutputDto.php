<?php

namespace Sherl\Sdk\Notification\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Notification\Enum\NotificationCode;

use Sherl\Sdk\Notification\Dto\EmailOutputDto;
use Sherl\Sdk\Notification\Dto\SMSOutputDto;
use Sherl\Sdk\Notification\Dto\PushOutputDto;

class NotificationOutputDto
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
    public $uri;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $consumerId;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $name;

    /**
     * @var NotificationCode
     * @Serializer\Type("enum<'Sherl\Sdk\Notification\Enum\NotificationEnum', 'value'>")
     */
    public $code;

    /**
     * @var EmailOutputDto
     * @Serializer\Type("Sherl\Sdk\Notification\Dto\EmailOutputDto")
     */
    public $email;

    /**
     * @var SMSOutputDto
     * @Serializer\Type("Sherl\Sdk\Notification\Dto\SMSOutputDto")
     */
    public $sms;

    /**
     * @var PushOutputDto
     * @Serializer\Type("Sherl\Sdk\Notification\Dto\PushOutputDto")
     */
    public $push;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $isActivatable;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $enabled;

    /**
     * @var array<string,mixed>
     * @Serializer\Type("array<string,mixed>")
     */
    public $conditions;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $createdAt;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $updatedAt;
}
