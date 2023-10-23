<?php

namespace Sherl\Sdk\Quotas\Dto;

use JMS\Serializer\Annotation as Serializer;

class CreateWalletInputDto
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
    public $personId;
}
