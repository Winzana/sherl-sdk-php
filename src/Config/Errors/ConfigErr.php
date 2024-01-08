<?php

namespace Sherl\Sdk\Config\Errors;

class ConfigErr
{
    public const GET_CONFIG_FAILED = 'config/config-get-failed';
    public const SET_CONFIG_FAILED = 'config/config-set-failed';
    public const CONFIG_NOT_FOUND = 'config/config-not-found';
    public const GET_CONFIG_FORBIDDEN = 'config/config-get-forbidden';
    public const SET_CONFIG_FORBIDDEN = 'config/config-set-forbidden';

    /**
     * @var array<string, string>
     */
    public static $errors = [
      self::GET_CONFIG_FAILED => 'Failed to fetch config API',
      self::SET_CONFIG_FAILED => 'Failed to set config API',
      self::CONFIG_NOT_FOUND => 'Config not found',
      self::GET_CONFIG_FORBIDDEN => 'Failed to fetch config API. Forbidden access',
      self::SET_CONFIG_FORBIDDEN => 'Failed to set config. Forbidden access',
    ];
}
