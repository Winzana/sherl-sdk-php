<?php

namespace Sherl\Sdk\Common;

class ConfigDto {
  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $id;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $code;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $value;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $consumer;

  /**
   * @var float
   * @Serializer\Type("float")
   */
  public $position;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $appliedTo;

  /**
   * @var boolean
   * @Serializer\Type("boolean")
   */
  public $isPublic;
}
