<?php

namespace Sherl\Sdk\Media\Errors;

class MediaErr
{
    public const MEDIA_NOT_FOUND = 'media/media-not-found';
    public const UPLOAD_FILE_FAILED = 'media/upload-file-failed';
    public const UPLOAD_FILE_FORBIDDEN = 'media/upload-file-failed-forbidden';
    public const GET_FILE_FAILED = 'media/get-file-failed';
    public const GET_FILE_FORBIDDEN = 'media/get-file-failed-forbidden';
    public const DELETE_FILE_FAILED = 'media/delete-file-failed';
    public const DELETE_FILE_FORBIDDEN = 'media/delete-file-failed-forbidden';

    /** @var array<string, string> */
    public static $errors = [
        self::MEDIA_NOT_FOUND => 'Error on media action, not found',
        self::UPLOAD_FILE_FAILED => 'Failed to upload file',
        self::UPLOAD_FILE_FORBIDDEN => 'Failed to upload file, forbidden',
        self::GET_FILE_FAILED => 'Failed to get file',
        self::GET_FILE_FORBIDDEN => 'Failed to get file, forbidden',
        self::DELETE_FILE_FAILED => 'Failed to delete file',
        self::DELETE_FILE_FORBIDDEN => 'Failed to delete file, forbidden',
    ];
}
