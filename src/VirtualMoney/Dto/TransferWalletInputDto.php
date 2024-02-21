<?php

namespace Sherl\Sdk\VirtualMoney\Dto;

use JMS\Serializer\Annotation as Serializer;

class TransferWalletInputDto
{
    /**
     * @var float
     * @Serializer\Type("float")
     */
    public $amount;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $description;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $organizationId;
}
