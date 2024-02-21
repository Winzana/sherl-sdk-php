<?php

namespace Sherl\Sdk\VirtualMoney\Dto;

use JMS\Serializer\Annotation as Serializer;

class CreateWalletHistoricalInputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $organizationId;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $description;

    /**
     * @var float
     * @Serializer\Type("float")
     */
    public $amount;
}
