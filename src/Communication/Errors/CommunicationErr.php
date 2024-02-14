<?php

namespace Sherl\Sdk\Communication\Errors;

class CommunicationErr
{
    public const GET_COMMUNICATION_FAILED = 'communication/get-communication-failed';
    public const COMMUNICATION_NOT_FOUND = 'communication/communication-not-found';
    public const GET_COMMUNICATION_FORBIDDEN = 'communication/get-communication-forbidden';

    /**
     * @var array<string, string>
     */
    public static $errors = [
      self::GET_COMMUNICATION_FAILED => 'Failed to fetch communication API',
      self::COMMUNICATION_NOT_FOUND => 'Failed to fetch communication API. Communication not found',
      self::GET_COMMUNICATION_FORBIDDEN => 'Failed to fetch communication API. Forbidden access',
    ];
}
