<?php

namespace Sherl\Sdk\Shop\Order\Dto;

use JMS\Serializer\Annotation as Serializer;

class IShopBasketAddProductOptionItemInputDto
{
  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $name;

  /**
   * @var integer
   * @Serializer\Type("integer")
   */
  public $quantity;
}
