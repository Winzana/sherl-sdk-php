<?php

namespace Sherl\Sdk\Shop\Product\Dto\ProductOutputDto;

use Sherl\Sdk\Common\Dto\Pagination;
use Sherl\Sdk\Shop\Product\Dto\ProductOutputDto;

class ProductPaginatedResultDto extends Pagination
{
  /**
   * @var ProductOutputDto[]
   * @Serializer\Type("array<Sherl\Sdk\Order\Dto\ProductOutputDto>")
   */
  public $results;

  /**
   * @var ViewOutputDto
   * @Serializer\Type("Sherl\Sdk\Common\Dto\ViewOutputDto")
   */
  public $view;
}
