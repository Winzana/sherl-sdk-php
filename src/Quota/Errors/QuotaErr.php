<?php

namespace Sherl\Sdk\Quota\Errors;

class QuotaErr
{
    public const FETCH_FAILED = 'quota/fetch-failed';
    public const FETCH_QUOTA_FIND_ONE_BY_FORBIDDEN = 'quota/fetch-find-one-by-forbidden';

    /** @var array<string, string> */
    public static $errors = [
        self::FETCH_FAILED => 'Failed to fetch quota',
        self::FETCH_QUOTA_FIND_ONE_BY_FORBIDDEN => 'Fetch quota failed forbidden',
    ];
}
