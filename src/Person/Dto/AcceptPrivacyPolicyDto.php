<?php

namespace Sherl\Sdk\Person\Dto;

use JMS\Serializer\Annotation as Serializer;

class AcceptPrivacyNoticeDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $version;
}
