<?php

namespace Sherl\Sdk\Order\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Place\Dto\AddressOutputDto;

class BillingDetailsOutputDto
{
    /**
     * @var AddressOutputDto
     * @Serializer\Type("Sherl\Sdk\Place\Dto\AddressOutputDto")
     */
    public $address;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $email;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $name;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $phone;
}
