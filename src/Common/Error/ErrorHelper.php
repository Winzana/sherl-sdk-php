<?php

namespace Sherl\Sdk\Common\Error;

use Sherl\Sdk\Common\Error\SherlException;

class ErrorHelper
{
    public static function getSherlError(mixed $error, SherlException $fallbackError): SherlException
    {
        if ($error instanceof SherlException) {
            return $error;
        }
        return $fallbackError;
    }
}
