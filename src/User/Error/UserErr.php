<?php

namespace Sherl\Sdk\Etl\Errors;

class UserErr
{
    public const PUT_FAILED = 'user/put-user-failed';
    public const POST_FAILED = 'user/post-user-failed';
    public const UPDATE_MY_PASSWORD_FAILED = 'user/update-password-failed';
    public const RESET_PASSWORD_REQUEST_FAILED = 'user/reset-password-request-failed';
    public const RESET_PASSWORD_VALIDATE_FAILED = 'user/reset-password-failed';
    public const FETCH_FAILED = 'user/fetch-failed';
    public const NOT_FOUND = 'user/not-found';
    public const RESET_PASSWORD_REQUEST_FORBIDDEN = 'user/reset-password-request-forbidden';
    public const RESET_PASSWORD_REQUEST_NOT_FOUND = 'user/reset-password-request-not-found';
    public const RESET_PASSWORD_VALIDATE_FORBIDDEN = 'user/reset-password-validate-forbidden';
    public const RESET_PASSWORD_VALIDATE_NOT_FOUND = 'user/reset-password-validate-not-found';
    public const UPDATE_MY_PASSWORD_FORBIDDEN = 'user/update-my-password-forbidden';


    /** @var array<string, string> */
    public static $errors = [
    self::FETCH_FAILED => 'Failed to fetch user API',
    self::NOT_FOUND => 'User not found',
    self::PUT_FAILED => 'Failed to update user',
    self::POST_FAILED => 'Failed to post user',
    self::UPDATE_MY_PASSWORD_FAILED => 'Failed to update password',
    self::RESET_PASSWORD_REQUEST_FAILED => 'Failed to reset password',
    self::RESET_PASSWORD_VALIDATE_FAILED => 'Failed to reset password',
    self::RESET_PASSWORD_REQUEST_FORBIDDEN => 'Failed to reset password forbidden',
    self::RESET_PASSWORD_REQUEST_NOT_FOUND => 'Failed to reset password not found ',
    self::RESET_PASSWORD_VALIDATE_FORBIDDEN => 'Failed to validate password forbidden',
    self::RESET_PASSWORD_VALIDATE_NOT_FOUND => 'Failed to validate password not found ',

    self::UPDATE_MY_PASSWORD_FORBIDDEN => 'Failed to update passwordforbidden',
];
};
