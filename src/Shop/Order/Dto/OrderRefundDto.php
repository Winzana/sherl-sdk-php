<?php

namespace Sherl\Sdk\Shop\Order\Dto;

use JMS\Serializer\Annotation as Serializer;

class OrderRefundDto
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
  public $productId;

  /**
   * @var float
   * @Serializer\Type("float")
   */
  public $amount;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $askedBy;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $createdAt;

  /**
   * @var array
   * @Serializer\Type("array")
   */
  public $metadatas;
}
