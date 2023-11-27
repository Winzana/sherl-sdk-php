<?php

namespace Sherl\Sdk\Shop\Product\Dto;

use Sherl\Sdk\Common\Dto\Pagination;
use Sherl\Sdk\Shop\Product\Dto\ProductResponseDto;

class ProductPaginatedResultDto extends Pagination
{
  /**
   * @var ProductResponseDto[]
   * @Serializer\Type("array<Sherl\Sdk\Order\Dto\ProductOutputDto>")
   */
  public $results;

  /**
   * @var ViewOutputDto
   * @Serializer\Type("Sherl\Sdk\Common\Dto\ViewOutputDto")
   */
  public $view;
}
