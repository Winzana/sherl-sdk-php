<?php

namespace Sherl\Sdk\VirtualMoney\Dto;

use JMS\Serializer\Annotation as Serializer;

class WalletInputDto
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
