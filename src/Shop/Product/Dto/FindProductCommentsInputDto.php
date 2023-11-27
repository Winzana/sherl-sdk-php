<?php

namespace Sherl\Sdk\Shop\Product\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Common\Dto\PaginationFiltersInputDto;

class FindProductCommentsInputDto extends PaginationFiltersInputDto
{
  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $productId;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $personId;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $organizationUri;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $sort;
}
