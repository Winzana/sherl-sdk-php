<?php

namespace Sherl\Sdk\Shop\Product\Dto;

use DateTime;

use JMS\Serializer\Annotation as Serializer;

class CommentDto
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
  public $personName;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $organizationUri;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $content;

  /**
   * @var DateTime
   * @Serializer\Type("DateTime")
   */
  public $createdAt;

  /**
   * @var DateTime
   * @Serializer\Type("DateTime")
   */
  public $updatedAt;
}
