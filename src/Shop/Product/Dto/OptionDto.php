<?php

namespace Sherl\Sdk\Shop\Product\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Shop\Product\Dto\ProductOptionItemTranslationDto;
use Sherl\Sdk\Shop\Product\Dto\OptionItemDto;

class OptionDto
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
  public $name;

  /**
   * @var OptionItemDto[]
   * @Serializer\Type("array<Sherl\Sdk\Shop\Product\Dto\OptionItemDto>")
   */
  public $items;

  /**
   * @var boolean
   * @Serializer\Type("boolean")
   */
  public $required;

  /**
   * @var boolean
   * @Serializer\Type("boolean")
   */
  public $multiple;

  /**
   * @var float
   * @Serializer\Type("float")
   */
  public $rangeMin;

  /**
   * @var float
   * @Serializer\Type("float")
   */
  public $rangeMax;

  /**
   * @var boolean
   * @Serializer\Type("boolean")
   */
  public $enabled;

  /**
   * @var ProductOptionItemTranslationDto[]
   * @Serializer\Type("array<Sherl\Sdk\Shop\Product\Dto\ProductOptionItemTranslationDto>")
   */
  public $translations;
}
