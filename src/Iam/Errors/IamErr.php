<?php

namespace Sherl\Sdk\Iam\Errors;

class IamErr
{
    public const FETCH_FAILED = 'iam/fetch-failed';
    public const IAM_PROFILE_NOT_FOUND_ERROR = 'iam/fetch-failed-profile-not-found';
    public const IAM_GET_PROFILE_BY_ID_FORBIDDEN = 'iam/fetch-profile-by-id-failed-forbidden';
    public const IAM_ROLE_NOT_FOUND_ERROR = 'iam/fetch-failed-role-not-found';
    public const IAM_GET_ROLE_BY_ID_FORBIDDEN = 'iam/fetch-role-by-id-failed-forbidden';
    public const IAM_GET_ALL_FORBIDDEN = 'iam/fetch-failed-forbidden';

    public static $errors = [
        self::OpinionErr.FETCH_FAILED => 'Failed to fetch quota',
        self::IamErr.FETCH_FAILED  => 'Failed to fetch iam profiles',
        self::IamErr.IAM_PROFILE_NOT_FOUND_ERROR  =>
          'Failed to fetch iam profile, profile not found',
        self::IamErr.IAM_GET_PROFILE_BY_ID_FORBIDDEN  =>
          'Failed to fetch iam profile by id, forbidden',
        self::IamErr.IAM_ROLE_NOT_FOUND_ERROR  => 'Failed to fetch iam role, role not found',
        self::IamErr.IAM_GET_ROLE_BY_ID_FORBIDDEN  =>
          'Failed to fetch iam role by id, forbidden',
        self::IamErr.IAM_GET_ALL_FORBIDDEN => 'Failed to fetch iam profiles, forbidden',
    ];
}
