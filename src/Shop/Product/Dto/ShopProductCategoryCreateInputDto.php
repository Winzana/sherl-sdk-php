<?php

namespace Sherl\Sdk\Shop\Category\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Shop\Product\Dto\SEODto;

class ShopProductCategoryCreateInputDto
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
  public $globalUri;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $name;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $color;

  /**
   * @var float
   * @Serializer\Type("float")
   */
  public $taxeValue;

  /**
   * @var integer
   * @Serializer\Type("integer")
   */
  public $position;

  /**
   * @var SEODto
   * @Serializer\Type("Sherl\Sdk\Shop\Category\Dto\SEODto")
   */
  public $seo;

  /**
   * @var boolean
   * @Serializer\Type("boolean")
   */
  public $isPublic;
}
