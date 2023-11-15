<?php

namespace Sherl\Sdk\Shop\Order\Dto;

use JMS\Serializer\Annotation as Serializer;

class ChecksOutputDto
{
    /**
    * @var mixed
    * @Serializer\Type("mixed")
    */
    public $address_line1_check;
    /**
    * @var mixed
    * @Serializer\Type("mixed")
    */
    public $address_postal_code_check;
    /**
    * @var mixed
    * @Serializer\Type("mixed")
    */
    public $cvc_check;
}
