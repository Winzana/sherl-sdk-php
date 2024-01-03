<?php

namespace Sherl\Sdk\Common\Error;

use Exception;

class SherlException extends Exception
{
    public string $name = 'SherlException';
    public string $errorCode;
    public mixed $data;

    /**
     * @param string $errorCode
     * @param string $message
     * @param array<string, string>|null $data
     */
    public function __construct(string $errorCode, string $message, array $data = null)
    {
        parent::__construct($message);
        $this->errorCode = $errorCode;
        $this->data = $data;
    }
}
