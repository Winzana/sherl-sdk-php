<?php

namespace Sherl\Sdk\Common\Error;

class ErrorFactory
{
    private string $domainName;
    private array $errors;

    public function __construct(string $domainName, array $errors = null)
    {
        $this->domainName = $domainName;
        $this->errors = $errors;
    }

    public function create(string $errorCode, mixed $data = null): SherlException
    {
        $identifier = "{$errorCode}";

        $template = isset($this->errors[$errorCode]) ? $this->errors[$errorCode] : null;
        $template = $template ?: 'Error';

        if ($template && $data) {
            $template = self::bindData($template, $data);
        }

        $message = "[{$this->domainName}] {$template} ({$identifier})";
        $error = new SherlException($identifier, $message, $data);

        return $error;
    }

    public static function bindData(string $template, array $data): string
    {
        return preg_replace_callback('/\{\$([^}]+)}/', function ($matches) use ($data) {
            $key = $matches[1];
            $value = isset($data[$key]) ? $data[$key] : "<{$key}>";
            return $value;
        }, $template);
    }
}
