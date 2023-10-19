<?php

namespace Sherl\Sdk\Notification\Dto;

class NotificationUpdateInputDto
{
  /**
   * @var string
   */
  public $contentEmail;

  /**
   * @var string
   */
  public $contentSMS;

  /**
   * @var boolean
   */
  public $enabled;
}
