<?php

namespace Sherl\Sdk\Shop\Loyalty\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Common\Dto\PaginationFiltersInputDto;

class LoyaltyCardFindByDto extends PaginationFiltersInputDto
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
  public $uri;
  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $ownerUri;
  /**
   * @var array<string>
   * @Serializer\Type("array<string>")
   */
  public $ownerUris;
  /**
   * @var boolean
   * @Serializer\Type("boolean")
   */
  public $enabled;
}
