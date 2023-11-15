<?php

namespace Sherl\Sdk\Shop\Order\Dto;

use Sherl\Sdk\Place\Dto\AddressOutputDto;

use JMS\Serializer\Annotation as Serializer;

class BillingOutputDto
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
