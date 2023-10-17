<?php

namespace Sherl\Sdk\Order\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Order\Dto\CardCheckOutputDto;

class CardOutputDto
{

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $brand;

  /**
   * @var CardCheckOutputDto
   * @Serializer\Type("Sherl\Sdk\Order\Dto\CardCheckOutputDto")
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
