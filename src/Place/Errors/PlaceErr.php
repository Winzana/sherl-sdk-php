<?php

namespace Sherl\Sdk\Place\Errors;

class PlaceErr
{
    public const FETCH_FAILED = 'place/fetch-failed';
    public const FETCH_PLACES_FORBIDDEN = 'place/forbidden';

    public static $errors = [
        self::PlaceErr.FETCH_FAILED => 'Failed to fetch place API',
        self::PlaceErr.FETCH_PLACES_FORBIDDEN => 'Fetch quota failed forbidden',
    ];
}
