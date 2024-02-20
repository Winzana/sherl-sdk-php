<?php

namespace Sherl\Sdk\Etl\Errors;

class EtlErr
{
    public const ETL_CONFIG_NOT_FOUND = 'etl/config_not_found';
    public const EXTRACT_TRANSFORM_FORBIDDEN = 'etl/transform_forbidden';
    public const EXTRACT_TRANSFORM_LOAD_FORBIDDEN = 'etl/transform_load_forbidden';
    public const SAVE_CONFIG_FAILED = 'etl/save-config-failed';
    public const EXTRACT_TRANSFORM_LOAD_FAILED = 'etl/extract-transform-load-failed';
    public const SAVE_CONFIG_FORBIDDEN = 'etl/save-config-forbidden';

    /** @var array<string, string> */
    public static $errors = [
        self::SAVE_CONFIG_FAILED => 'Failed to save etl config',
        self::ETL_CONFIG_NOT_FOUND => 'Failed etl config not found',
        self::EXTRACT_TRANSFORM_FORBIDDEN =>
          'Failed to extract load and transform data forbidden',
        self::EXTRACT_TRANSFORM_LOAD_FORBIDDEN =>
          'Failed to extract load and transform data forbidden',
        self::EXTRACT_TRANSFORM_LOAD_FAILED =>
          'Failed to extract load and transform data',
        self::SAVE_CONFIG_FORBIDDEN => 'Failed to save etl config forbidden',
    ];
}
