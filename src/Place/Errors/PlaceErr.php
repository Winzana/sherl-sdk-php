<?php

namespace Sherl\Sdk\Place\Errors;

class PlaceErr
{
    public const FETCH_FAILED = 'place/fetch-failed';
    public const FETCH_PLACES_FORBIDDEN = 'place/forbidden';

    /** @var array<string, string> */
    public static $errors = [
        self::FETCH_FAILED => 'Failed to fetch place API',
        self::FETCH_PLACES_FORBIDDEN => 'Fetch quota failed forbidden',
    ];
}
