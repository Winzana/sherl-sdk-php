<?php

namespace Sherl\Sdk\Common\Dto;

abstract class Pagination
{
  public $results = [];
  public $view;

  public function __construct($results, $view)
  {
    $this->results = $results;
    $this->view = $view;
  }
}
