<?php

namespace Sherl\Sdk\Opinion\Errors;

class OpinionErr
{
    public const   FETCH_FAILED = 'opinion/fetch-failed';
    public const OPINION_NOT_FOUND = 'opinion/not-found';
    public const CREATE_OPINION_FAILED = 'opinion/creation-failed';
    public const CREATE_OPINION_CLAIM_FAILED = 'opinion/creation-claim-failed';
    public const UPDATE_OPINION_FAILED = 'opinion/update-failed';
    public const  FETCH_OPINION_AVERAGE_FAILED = 'opinion/fetch-average-failed';
    public const CREATE_OPINION_CLAIM_FORBIDDEN = 'opinion/creation-claim-forbidden';
    public const CREATE_OPINION_FORBIDDEN = 'opinion/creation-claim-forbidden';
    public const FETCH_OPINION_AVERAGE_FORBIDDEN = 'opinion/fetch-average-forbidden';
    public const FETCH_OPINION_I_GIVE_FORBIDDEN = 'opinion/fetch-opinion-i-give-forbidden';
    public const FETCH_OPINIONS_FORBIDDEN = 'opinion/fetch-opinion-forbidden';
    public const FETCH_PUBLIC_OPINIONS_FORBIDDEN = 'opinion/fetch-public-opinion-forbidden';
    public const UPDATE_OPINION_FORBIDDEN = 'opinion/update-forbidden';

    public static $errors = [
        self::OpinionErr.FETCH_FAILED => 'Failed to fetch quota',
        self::OpinionErr.FETCH_QUOTA_FIND_ONE_BY_FORBIDDEN => 'Fetch quota failed forbidden',

        self::OpinionErr.FETCH_FAILED => 'Failed to fetch opinion API',
        self::OpinionErr.OPINION_NOT_FOUND => 'Opinion not found',
        self::OpinionErr.CREATE_OPINION_FAILED => 'Failed to create new opinion',
        self::OpinionErr.CREATE_OPINION_CLAIM_FAILED => 'Failed to create opinion claim',
        self::OpinionErr.UPDATE_OPINION_FAILED => 'Failed to update opinion',
        self::OpinionErr.FETCH_OPINION_AVERAGE_FAILED => 'Failed to fetch opinion average',
        self::OpinionErr.CREATE_OPINION_CLAIM_FORBIDDEN =>
          'Failed to create opinion forbidden',
        self::OpinionErr.CREATE_OPINION_FORBIDDEN => 'Failed to create opinion forbidden',
        self::OpinionErr.FETCH_OPINION_AVERAGE_FORBIDDEN =>
          'Failed to fetch opinion forbidden',
        self::OpinionErr.FETCH_OPINION_I_GIVE_FORBIDDEN =>
          'Failed to fetch opinion i give forbidden',
        self::OpinionErr.FETCH_OPINIONS_FORBIDDEN => 'Failed to fetch opinion forbidden',
        self::OpinionErr.FETCH_PUBLIC_OPINIONS_FORBIDDEN =>
          'Failed to fetch opinion public forbidden',
        self::OpinionErr.UPDATE_OPINION_FORBIDDEN => 'Failed to update opinion forbidden',
    ];
}
