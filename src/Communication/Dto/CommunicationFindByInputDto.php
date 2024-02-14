<?php

namespace Sherl\Sdk\Communication\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Communication\Enum\CommunicationChannelEnum;
use Sherl\Sdk\Communication\Enum\CommunicationTypeEnum;

class CommunicationFindByInputDto
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
    public $senderId;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $receiverUri;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $aboutUri;

    /**
     * @var CommunicationChannelEnum
     * @Serializer\Type(enum<'Sherl\Sdk\Communication\Enum\CommunicationChannelEnum', 'value'>")
     */
    public $channel;

    /**
     * @var CommunicationTypeEnum
     * @Serializer\Type(enum<'Sherl\Sdk\Communication\Enum\CommunicationTypeEnum', 'value'>)
     */
    public $type;
}
