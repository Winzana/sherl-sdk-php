<?php

namespace Sherl\Sdk\Search\Errors;

class SearchErr
{
    public const SEARCH_FAILED = 'search/search-failed';
    public const SEARCH_FORBIDDEN = 'search/search-failed-forbidden';

    /**
     * @var array<string, string>
     */
    public static $errors = [
      self::SEARCH_FAILED => 'Failed to fetch search API',
      self::SEARCH_FORBIDDEN => 'Failed to fetch search API. Forbidden access',
    ];
}
