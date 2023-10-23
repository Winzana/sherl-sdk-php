<?php

namespace Sherl\Sdk\Common\Dto;

use JMS\Serializer\Annotation as Serializer;

class ViewOutputDto
{
  /**
   * @var integer
   * @Serializer\Type("integer")
   */
  public $itemsPerPage;

  /**
   * @var integer
   * @Serializer\Type("integer")
   */
  public $page;

  /**
   * @var integer
   * @Serializer\Type("integer")
   */
  public $total;
}
