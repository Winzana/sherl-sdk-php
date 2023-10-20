<?php

namespace Sherl\Sdk\Common\Error;

use Exception;

class SherlException extends Exception
{
    public function __construct(string $domain, string $message, int $code = 0)
    {
        parent::__construct(ucfirst($domain) . ': ' . $message, $code);
    }
}
