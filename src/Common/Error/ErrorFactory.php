<?php

namespace Sherl\Sdk\Common\Error;

class ErrorFactory
{
    private string $domainName;
    private mixed $errors;

    public function __construct($domainName, $errors = null)
    {
        $this->domainName = $domainName;
        $this->errors = $errors;
    }

    public function create(string $code, mixed $data = null): SherlException
    {
        $identifier = "{$code}";

        $template = isset($this->errors[$code]) ? $this->errors[$code] : null;
        $template = $template ?: 'Error';

        if ($template && $data) {
            $template = self::bindData($template, $data);
        }

        $message = "[{$this->domainName}] {$template} ({$identifier})";
        $error = new SherlException($identifier, $message, $data);

        return $error;
    }

    public static function bindData($template, $data): string
    {
        return preg_replace_callback('/\{\$([^}]+)}/', function ($matches) use ($data) {
            $key = $matches[1];
            $value = isset($data[$key]) ? $data[$key] : "<{$key}>";
            return $value;
        }, $template);
    }
}
