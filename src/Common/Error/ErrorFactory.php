<?php

namespace Sherl\Sdk\Common\Error;

class ErrorFactory
{
    private string $domainName;

    /**
     * @var array<string, string>
     */
    private array $errors;

    /**
     * @param string $domainName
     * @param array<string, string> $errors
     */
    public function __construct(string $domainName, array $errors = [])
    {
        $this->domainName = $domainName;
        $this->errors = $errors;
    }

    public function create(string $errorCode, mixed $data = null): SherlException
    {
        $identifier = "{$errorCode}";

        $template = $this->errors[$errorCode] ?? 'Error';

        if ($data) {
            $template = self::bindData($template, $data);
        }

        $message = "[{$this->domainName}] {$template} ({$identifier})";
        $error = new SherlException($identifier, $message, $data);

        return $error;
    }

    /**
     * @param string $template
     * @param array<string, string> $data
     * @return string
     */
    public static function bindData(string $template, array $data): string
    {
        $bindedTemplate = preg_replace_callback('/\{\$([^}]+)}/', function ($matches) use ($data) {
            $key = $matches[1];
            $value = isset($data[$key]) ? $data[$key] : "<{$key}>";
            return $value;
        }, $template);

        if (!$bindedTemplate) {
            return $template;
        }

        return $bindedTemplate;
    }
}
