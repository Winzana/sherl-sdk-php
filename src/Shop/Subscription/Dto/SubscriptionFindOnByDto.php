<?php

namespace Sherl\Sdk\Shop\Subscription\Dto;

use JMS\Serializer\Annotation as Serializer;

class SubscriptionFindOnByDto
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
  public $name;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $ownerUri;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $actionFrom;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $activeUntil;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $activeFor;

  /**
   * @var boolean
   * @Serializer\Type("boolean")
   */
  public $enabled;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $sourceUri;
}
