<?php

namespace Sherl\Sdk\Shop\Order\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Shop\Order\Dto\ChecksOutputDto;

class CardOutputDto
{
    /**
    * @var string
    * @Serializer\Type("string")
    */
    public $brand;
    /**
    * @var ChecksOutputDto
    * @Serializer\Type("Sherl\Sdk\Shop\Order\Dto\ChecksOutputDto")
    */
    public $checks;
    /**
    * @var string
    * @Serializer\Type("string")
    */
    public $country;
    /**
    * @var integer
    * @Serializer\Type("integer")
    */
    public $exp_month;
    /**
    * @var integer
    * @Serializer\Type("integer")
    */
    public $exp_year;
    /**
    * @var string
    * @Serializer\Type("string")
    */
    public $fingerprint;
    /**
    * @var string
    * @Serializer\Type("string")
    */
    public $funding;
    /**
    * @var mixed
    * @Serializer\Type("mixed")
    */
    public $installments;
    /**
    * @var string
    * @Serializer\Type("string")
    */
    public $last4;
    /**
    * @var string
    * @Serializer\Type("string")
    */
    public $network;
    /**
    * @var mixed
    * @Serializer\Type("mixed")
    */
    public $three_d_secure;
    /**
    * @var mixed
    * @Serializer\Type("mixed")
    */
    public $wallet;
}
