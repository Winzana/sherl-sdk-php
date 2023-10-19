<?php

namespace Sherl\Sdk\BugReport\Dto;

use JMS\Serializer\Annotation as Serializer;

class BugReportOutputDto
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
  public $osName;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $browserName;

  /**
   * @var integer
   * @Serializer\Type("integer")
   */
  public $windowHeight;

  /**
   * @var integer
   * @Serializer\Type("integer")
   */
  public $windowWidth;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $contactEmail;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $message;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $uri;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $consumerId;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $createdAt;
}
