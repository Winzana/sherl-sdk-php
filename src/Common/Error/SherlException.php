<?php

namespace Sherl\Sdk\Common\Error;

use Exception;

class SherlException extends Exception
{
    public string $name = 'SherlError';
    public string $errorCode;
    public mixed $data;

    public function __construct($errorCode, $message, $data = null)
    {
        parent::__construct($message);
        $this->errorCode = $errorCode;
        $this->data = $data;
    }
}
