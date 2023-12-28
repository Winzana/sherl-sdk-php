<?php

namespace Sherl\Sdk\Quotas\Errors;

class QuotasErr
{
    public const FETCH_FAILED = 'quota/fetch-failed';
    public const FETCH_QUOTA_FIND_ONE_BY_FORBIDDEN = 'quota/fetch-find-one-by-forbidden';

    public static $errors = [
        self::QuotasErr.FETCH_FAILED => 'Failed to fetch quota',
        self::QuotasErr.FETCH_QUOTA_FIND_ONE_BY_FORBIDDEN => 'Fetch quota failed forbidden',
    ];
}
