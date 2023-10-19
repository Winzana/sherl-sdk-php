<?php

namespace Sherl\Sdk\BugReport\Dto;

class CreateBugReportInputDto
{
  /**
   * @var string
   */
  public $osName;

  /**
   * @var string
   */
  public $browserName;

  /**
   * @var string
   */
  public $contactEmail;

  /**
   * @var string
   */
  public $message;

  /**
   * @var integer
   */
  public $windowHeight;

  /**
   * @var integer
   */
  public $windowWidth;
}
