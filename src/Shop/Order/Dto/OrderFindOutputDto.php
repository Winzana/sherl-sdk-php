<?php

namespace Sherl\Sdk\Shop\Order\Dto;

use Sherl\Sdk\Common\Dto\Pagination;
use Sherl\Sdk\Order\Dto\OrderOutputDto;

class OrderFindOutputDto extends Pagination
{
  /**
   * @var OrderOutputDto[]
   * @Serializer\Type("array<Sherl\Sdk\Order\Dto\OrderOutputDto>")
   */
  public $results;

  /**
   * @var ViewOutputDto
   * @Serializer\Type("Sherl\Sdk\Common\Dto\ViewOutputDto")
   */
  public $view;
}
