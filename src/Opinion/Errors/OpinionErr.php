<?php

namespace Sherl\Sdk\Opinion\Errors;

class OpinionErr
{
    public const FETCH_FAILED = 'opinion/fetch-failed';
    public const OPINION_NOT_FOUND = 'opinion/not-found';
    public const CREATE_OPINION_FAILED = 'opinion/creation-failed';
    public const CREATE_OPINION_CLAIM_FAILED = 'opinion/creation-claim-failed';
    public const UPDATE_OPINION_FAILED = 'opinion/update-failed';
    public const FETCH_OPINION_AVERAGE_FAILED = 'opinion/fetch-average-failed';
    public const CREATE_OPINION_FORBIDDEN = 'opinion/creation-claim-forbidden';
    public const FETCH_OPINION_AVERAGE_FORBIDDEN = 'opinion/fetch-average-forbidden';
    public const FETCH_OPINION_I_GIVE_FORBIDDEN = 'opinion/fetch-opinion-i-give-forbidden';
    public const FETCH_OPINIONS_FORBIDDEN = 'opinion/fetch-opinion-forbidden';
    public const FETCH_PUBLIC_OPINIONS_FORBIDDEN = 'opinion/fetch-public-opinion-forbidden';
    public const UPDATE_OPINION_FORBIDDEN = 'opinion/update-forbidden';

    /** @var array<string, string> */
    public static $errors = [
        self::FETCH_FAILED => 'Failed to fetch opinion API',
        self::OPINION_NOT_FOUND => 'Opinion not found',
        self::CREATE_OPINION_FAILED => 'Failed to create new opinion',
        self::CREATE_OPINION_CLAIM_FAILED => 'Failed to create opinion claim',
        self::UPDATE_OPINION_FAILED => 'Failed to update opinion',
        self::FETCH_OPINION_AVERAGE_FAILED => 'Failed to fetch opinion average',
        self::CREATE_OPINION_FORBIDDEN => 'Failed to create opinion forbidden',
        self::FETCH_OPINION_AVERAGE_FORBIDDEN =>
          'Failed to fetch opinion forbidden',
        self::FETCH_OPINION_I_GIVE_FORBIDDEN =>
          'Failed to fetch opinion i give: Access forbidden',
        self::FETCH_OPINIONS_FORBIDDEN => 'Failed to fetch opinion forbidden',
        self::FETCH_PUBLIC_OPINIONS_FORBIDDEN =>
          'Failed to fetch opinion public forbidden',
        self::UPDATE_OPINION_FORBIDDEN => 'Failed to update opinion forbidden',
    ];
}
