<?php

namespace Sherl\Sdk\Shop\Product\Dto;

use JMS\Serializer\Annotation as Serializer;

class ProductOutputDto
{
  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $id;
}
