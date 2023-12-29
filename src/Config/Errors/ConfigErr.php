<?php

class ConfigErr
{
    public const FETCH_FAILED = 'config/config-fetch-failed';
    public const CONFIG_NOT_FOUND = 'config/config-not-found';
    public const GET_CONFIG_FORBIDDEN = 'config/config-get-forbidden';
    public const SET_CONFIG_FORBIDDEN = 'config/config-set-forbidden';

    public static $errors = [
      self::FETCH_FAILED => 'Failed to fetch config API',
      self::CONFIG_NOT_FOUND => 'Config not found',
      self::GET_CONFIG_FORBIDDEN => 'Failed to fetch config API. Forbidden access',
      self::SET_CONFIG_FORBIDDEN => 'Failed to set config. Forbidden access',
    ];
}
