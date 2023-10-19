<?php

namespace Sherl\Sdk\BugReport\Dto;

use Sherl\Sdk\Common\Dto\PaginationFiltersInputDto;

class BugReportListInputDto extends PaginationFiltersInputDto
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
   * @var integer
   */
  public $windowHeight;

  /**
   * @var integer
   */
  public $windowWidth;
}
