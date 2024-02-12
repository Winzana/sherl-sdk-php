<?php

namespace Sherl\Sdk\Auth\Errors;

class AuthErr
{
    public const AUTH_FAILED = 'auth/auth-failed';
    public const AUTH_UNAUTHORIZED = 'auth/auth-unauthorized';
    public const LOGIN_FAILED = 'auth/login-failed';
    public const LOGIN_FAILED_UNAUTHORIZED = 'auth/login-failed-unauthorized';
    public const LOGIN_GOOGLE_FAILED = 'auth/google-login-failed';
    public const LOGIN_GOOGLE_FAILED_UNAUTHORIZED = 'auth/google-login-failed-unauthorized';
    public const LOGIN_FACEBOOK_FAILED = 'auth/facebook-login-failed';
    public const LOGIN_FACEBOOK_FAILED_UNAUTHORIZED = 'auth/facebook-login-failed-unauthorized';
    public const LOGIN_APPLE_FAILED = 'auth/apple-login-failed';
    public const LOGIN_APPLE_FAILED_UNAUTHORIZED = 'auth/apple-login-failed-unauthorized';
    public const LOGIN_WITH_CODE_FAILED = 'auth/login-with-code-failed';
    public const LOGIN_WITH_CODE_FAILED_UNAUTHORIZED = 'auth/login-with-code-failed-unauthorized';
    public const REQUEST_SMS_CODE_FAILED = 'auth/request-sms-code-failed';
    public const REQUEST_SMS_CODE_NOT_FOUND = 'auth/request-sms-code-failed-not-found';
    public const RESEND_SMS_CODE_FAILED = 'auth/resend-sms-code-failed';
    public const VALIDATE_SMS_CODE_FAILED = 'auth/validate-sms-code-failed';
    public const VALIDATE_SMS_CODE_FAILED_UNAUTHORIZED = 'auth/validate-sms-code-failed-unauthorized';
    public const VALIDATE_SMS_CODE_FAILED_FORBIDDEN = 'auth/validate-sms-code-failed-forbidden';
    public const LOGOUT_FAILED = 'auth/logout-failed';
    public const LOGOUT_UNAUTHORIZED = 'auth/logout-unauthorized';
    public const SMS_ALREADY_SENT = 'auth/sms-already-sent';
    public const SMS_VALIDATION_CODE_EXPIRED = 'auth/validate-sms-code-failed-expired';
    public const PHONE_NUMBER_NOT_FOUND = 'auth/phone-number-not-found';
    public const SMS_CODE_OR_PHONE_NUMBER_NOT_FOUND = 'auth/phone-number-or-code-not-found';
    public const UNKNOWN_LOGIN_CODE = 'auth/unknown-login-code';
    public const REFRESH_TOKEN_UNAUTHORIZED = 'auth/refresh-token-unauthorized';
    public const REFRESH_TOKEN_FAILED  = 'auth/refresh-token-failed';


    /** @var array<string, string>
    */
    public static $errors =  [
      self::AUTH_FAILED => 'Could not authenticate',
      self::AUTH_UNAUTHORIZED => 'Could not authenticate, unauthorized',
      self::LOGIN_FAILED => 'Could not login',
      self::LOGIN_FAILED_UNAUTHORIZED => 'Could not login, unauthorized',
      self::LOGIN_GOOGLE_FAILED => 'Failed to connect with google',
      self::LOGIN_GOOGLE_FAILED_UNAUTHORIZED =>
       'Failed to connect with google, unauthorized',
      self::LOGIN_FACEBOOK_FAILED => 'Failed to connect with facebook',
      self::LOGIN_FACEBOOK_FAILED_UNAUTHORIZED =>
       'Failed to connect with facebook, unauthorized',
      self::LOGIN_APPLE_FAILED => 'Failed to connect with apple',
      self::LOGIN_APPLE_FAILED_UNAUTHORIZED =>
       'Failed to connect with apple, unauthorized',
      self::LOGIN_WITH_CODE_FAILED => 'Failed to connect with code',
      self::LOGIN_WITH_CODE_FAILED_UNAUTHORIZED =>
       'Failed to connect with code, unauthorized',
      self::REQUEST_SMS_CODE_FAILED => 'Failed to request sms code',
      self::REQUEST_SMS_CODE_NOT_FOUND => 'Failed to request sms code, not found',
      self::RESEND_SMS_CODE_FAILED => 'Failed to resend sms code',
      self::VALIDATE_SMS_CODE_FAILED => 'Failed to connect validate sms code',
      self::VALIDATE_SMS_CODE_FAILED_UNAUTHORIZED =>
       'Failed to connect validate sms code, unauthorized',
      self::VALIDATE_SMS_CODE_FAILED_FORBIDDEN =>
       'Failed to connect validate sms code, forbidden',
      self::LOGOUT_FAILED => 'Failed to logout',
      self::LOGOUT_UNAUTHORIZED => 'Failed to logout, unauthorized',
      self::SMS_ALREADY_SENT => 'SMS already sent',
      self::SMS_VALIDATION_CODE_EXPIRED => 'SMS validation code expired',
      self::PHONE_NUMBER_NOT_FOUND => 'Phone number not found',
      self::SMS_CODE_OR_PHONE_NUMBER_NOT_FOUND =>
       'Phone number or SMS code not found',
      self::UNKNOWN_LOGIN_CODE => 'Unknown login code',
      self::REFRESH_TOKEN_UNAUTHORIZED => 'Refresh token is not authorized',
      self::REFRESH_TOKEN_FAILED => 'refresh token failed',
        ];
};
