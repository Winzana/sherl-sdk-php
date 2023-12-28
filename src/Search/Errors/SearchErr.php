<?php

namespace Sherl\Sdk\Search\Errors;

class SearchErr
{
    public const FETCH_FAILED = 'search/fetch-failed';
    public const SEARCH_FORBIDDEN = 'search/fetch-failed-forbidden';

    public static $errors = [
      self::FETCH_FAILED => 'Failed to fetch search API',
      self::SEARCH_FORBIDDEN => 'Failed to fetch search API, forbidden',
    ];
}
