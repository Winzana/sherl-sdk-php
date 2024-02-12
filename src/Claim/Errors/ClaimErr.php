<?php

namespace Sherl\Sdk\Claim\Errors;

class ClaimErr
{
    public const CLAIM_NOT_FOUND = 'claim/claim-not-found';

    public const GET_ALL_CLAIM_FAILED = 'claim/get-all-claim';
    public const GET_ALL_CLAIM_FORBIDDEN = 'claim/get-all-claim-forbidden';

    public const GET_CLAIM_BY_ID_FAILED = 'claim/get-by-id';
    public const GET_CLAIM_BY_ID_FORBIDDEN = 'claim/get-by-id-forbidden';

    public const CREATE_CLAIM_ERROR = 'claim/create-by-id';
    public const CREATE_CLAIM_FORBIDDEN = 'claim/create-by-id-forbidden';

    public const UPDATE_CLAIM_ERROR = 'claim/update-by-id';
    public const UPDATE_CLAIM_FORBIDDEN = 'claim/update-by-id-forbidden';

    public const REFUND_CLAIM_FAILED = 'claim/refund-failed';
    public const REFUND_CLAIM_FORBIDDEN = 'claim/refund-forbidden';

    public const REPLY_CLAIM_FAILED = 'claim/reply-failed';
    public const REPLY_CLAIM_FORBIDDEN = 'claim/reply-forbidden';

    public const FIND_CLAIM_BY_FAILED = 'claim/find-claim-by-failed';
    public const FIND_CLAIM_BY_FORBIDDEN = 'claim/find-claim-by-forbidden';

    /** @var array<string, string>
    */
    public static $errors =  [
       self::CLAIM_NOT_FOUND => 'Claim error, not found',
       self::GET_ALL_CLAIM_FAILED => 'Failed to get all claim tickets',
       self::GET_ALL_CLAIM_FORBIDDEN =>
          'Failed to get all claim tickets, forbidden',

       self::GET_CLAIM_BY_ID_FAILED => 'Failed to get ticket',
       self::GET_CLAIM_BY_ID_FORBIDDEN => 'Failed to get ticket, forbidden',

       self::CREATE_CLAIM_ERROR => 'Failed to create ticket',
       self::CREATE_CLAIM_FORBIDDEN => 'Failed to create ticket, forbidden',

       self::UPDATE_CLAIM_ERROR => 'Failed to update ticket',
       self::UPDATE_CLAIM_FORBIDDEN => 'Failed to update ticket, forbidden',

       self::REFUND_CLAIM_FAILED => 'Failed to refund ticket',
       self::REFUND_CLAIM_FORBIDDEN => 'Failed to refund ticket, forbidden',

       self::REPLY_CLAIM_FAILED => 'Failed to reply ticket',
       self::REPLY_CLAIM_FORBIDDEN => 'Failed to reply ticket, forbidden',

       self::FIND_CLAIM_BY_FAILED => 'Failed to find ticket',
       self::FIND_CLAIM_BY_FORBIDDEN => 'Failed to find ticket, forbidden',
        ];
};
