<?php

namespace Sherl\Sdk\Account\Errors;

class AccountErr
{
    public const CREATE_ACCOUNT_FORBIDDEN = 'account/create-account-forbidden';

    public const CREATE_ACCOUNT_FAILED = 'account/create-account-failed';
    /**
       * @var array<string, string>
       */
    public static $errors = [
        self::CREATE_ACCOUNT_FORBIDDEN =>
        'Failed to create account. Forbidden access',
          self::CREATE_ACCOUNT_FAILED =>
          'Failed to create account'
        ];
};
