<?php

namespace Sherl\Sdk\Organization\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Organization\Dto\TaxonomyValueOutputDto;

class TaxonomyOutputDto
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
  public $code;

  /**
   * @var TaxonomyValueOutputDto[]
   * @Serializer\Type("array<Sherl\Sdk\Organization\Dto\TaxonomyValueOutputDto>")
   */
  public $values;

  /**
   * @var TaxonomyOutputDto
   * @Serializer\Type("Sherl\Sdk\Organization\Dto\TaxonomyOutputDto")
   */
  public $parent;

  /**
   * @var TaxonomyOutputDto[]
   * @Serializer\Type("array<Sherl\Sdk\Organization\Dto\TaxonomyOutputDto>")
   */
  public $childrens;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $createdAt;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $updatedAt;
}
