<?php

namespace Sherl\Sdk\Shop\Order\Dto;

use JMS\Serializer\Annotation as Serializer;

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
public $fingerprint: string;
  /**
  * @var string
  * @Serializer\Type("string")
  */
public $funding: string;
  /**
  * @var mixed
  * @Serializer\Type("mixed")
  */
public $installments: any;
  /**
  * @var string
  * @Serializer\Type("string")
  */
public $last4: string;
  /**
  * @var string
  * @Serializer\Type("string")
  */
public $network: string;
  /**
  * @var mixed
  * @Serializer\Type("mixed")
  */
public $three_d_secure: any;
  /**
  * @var mixed
  * @Serializer\Type("mixed")
  */
public $wallet: any;
}