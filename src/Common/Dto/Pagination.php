<?php

namespace Sherl\Sdk\Common\Dto;

abstract class Pagination
{
    /**
     * @var mixed[]
     */
    public array $results;
    public mixed $view;

    /**
     * @param mixed[] $results
     */
    public function __construct(array $results, mixed $view)
    {
        $this->results = $results;
        $this->view = $view;
    }
}
