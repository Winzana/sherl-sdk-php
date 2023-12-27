<?php

namespace Sherl\Sdk\Common\Error;

use Exception;

const ERROR_NAME = 'SherlError';

class SherlException extends Exception {
    public string $name = ERROR_NAME;
    public $code;
    public mixed $data;

    public function __construct($code, $message, $data = null) {
        parent::__construct($message);
        $this->code = $code;
        $this->data = $data;
    }
}