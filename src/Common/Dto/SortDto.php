<?php

namespace Sherl\Sdk\Common;

/**
 * @template T
 */

class Sort {
  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $field;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $order;
}
