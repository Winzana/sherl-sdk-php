<?php

namespace Sherl\Sdk\Shop\Order\Dto;

use JMS\Serializer\Annotation as Serializer;

class RefundsOutputDto
{
  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $object;

  /**
   * @var mixed
   * @Serializer\Type("mixed")
   */
  public $data;

  /**
   * @var boolean
   * @Serializer\Type("boolean")
   */
  public $has_more;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $url;
}
