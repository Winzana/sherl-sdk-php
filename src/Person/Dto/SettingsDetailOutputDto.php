<?php

namespace Sherl\Sdk\Person\Dto;

use JMS\Serializer\Annotation as Serializer;

class SettingsDetailOutputDto
{
    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $emailEnable;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $smsEnable;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $pushEnable;

}
