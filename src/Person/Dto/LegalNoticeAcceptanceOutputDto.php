<?php

namespace Sherl\Sdk\Person\Dto;

use JMS\Serializer\Annotation as Serializer;

class LegalNoticeAcceptanceOutputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $version;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $dateOfAcceptance;

}
