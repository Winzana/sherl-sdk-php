<?php

namespace Sherl\Sdk\Shop\Category\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Shop\Product\Dto\SEODto;

class ShopProductSubCategoryCreateInputDto
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
  public $color;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $name;

  /**
   * @var SEODto
   * @Serializer\Type("Sherl\Sdk\Shop\Seo\Dto\SEODto")
   */
  public $seo;

  /**
   * @var integer
   * @Serializer\Type("integer")
   */
  public $position;
}
