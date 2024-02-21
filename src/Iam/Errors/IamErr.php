<?php

namespace Sherl\Sdk\Iam\Errors;

class IamErr
{
    public const IAM_PROFILE_NOT_FOUND_ERROR = 'iam/fetch-failed-profile-not-found';
    public const IAM_GET_PROFILE_BY_ID_FORBIDDEN = 'iam/fetch-profile-by-id-failed-forbidden';
    public const IAM_ROLE_NOT_FOUND_ERROR = 'iam/fetch-failed-role-not-found';
    public const IAM_GET_ROLE_BY_ID_FORBIDDEN = 'iam/fetch-role-by-id-failed-forbidden';
    public const IAM_GET_ALL_FORBIDDEN = 'iam/fetch-failed-forbidden';
    public const IAM_GET_ALL_FAILED = 'iam/get-all-failed';
    public const IAM_GET_PROFILE_BY_ID_FAILED = 'iam/get-all-profile-by-id-failed';
    public const IAM_GET_ROLE_BY_ID_FAILED = 'iam/get-role-by-id-failed';

    /** @var array<string, string> */
    public static $errors = [
        self::IAM_PROFILE_NOT_FOUND_ERROR  =>
          'Failed to fetch iam profile, profile not found',
        self::IAM_GET_PROFILE_BY_ID_FORBIDDEN  =>
          'Failed to fetch iam profile by id, forbidden',
        self::IAM_ROLE_NOT_FOUND_ERROR  => 'Failed to fetch iam role, role not found',
        self::IAM_GET_ROLE_BY_ID_FORBIDDEN  =>
          'Failed to fetch iam role by id, forbidden',
        self::IAM_GET_ALL_FORBIDDEN => 'Failed to fetch iam profiles, forbidden',
        self::IAM_GET_ALL_FAILED  => 'Failed to fetch iam all, all not found',
        self::IAM_GET_PROFILE_BY_ID_FAILED  => 'Failed to fetch iam profile, profile not found',
        self::IAM_GET_ROLE_BY_ID_FAILED  => 'Failed to fetch iam role, role not found',
    ];
}
