<?php

namespace Sherl\Sdk\Common\Error;

use Exception;

class SherlException extends Exception
{
    public string $name = 'SherlError';
    public $code;
    public mixed $data;

    public function __construct($code, $message, $data = null)
    {
        parent::__construct($message);
        $this->code = $code;
        $this->data = $data;
    }
}
