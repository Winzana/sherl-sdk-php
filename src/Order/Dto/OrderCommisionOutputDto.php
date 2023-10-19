<?php

namespace Sherl\Sdk\Order\Dto;


use JMS\Serializer\Annotation as Serializer;
use MangoPay\Transfer;

class OrderCommissionOutputDto extends Transfer
{
  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $createdAt;
}
