<?php

namespace Sherl\Sdk\Notification\Errors;

class NotificationErr
{
    public const NOTIFICATION_NOT_FOUND = 'notification/notification_not_found';
    public const POST_FAILED = 'notification/post-notification-failed';
    public const FETCH_FAILED = 'notification/fetch-failed';
    public const UPDATE_FAILED = 'notification/update-notification-failed';
    public const ENABLED_FAILED = 'notification/enabled-notification-failed';
    public const DISABLED_FAILED = 'notification/disabled-notification-failed';
    public const SEND_NOTIFICATION_BY_TYPE_FAILED = 'notification/send-notification-by-type-failed';
    public const DISABLE_TO_ORGANIZATION_FORBIDDEN = 'notification/disable-to-organization-forbidden';
    public const ENABLE_TO_ORGANIZATION_FORBIDDEN = 'notification/enable-to-organization-forbidden';
    public const GET_NOTIFICATIONS_FORBIDDEN = 'notification/get-notifications-forbidden';
    public const NOTIFICATION_REGISTRATION_FORBIDDEN = 'notification/notification-registration-forbidden';
    public const SEND_NOTIFICATION_BY_TYPE_FORBIDDEN = 'send-notification-by-type-forbidden';
    public const UPDATE_NOTIFICATION_FORBIDDEN = 'update-notification-forbidden';

    /**
     * @var array<string, string>
     */
    public static $errors = [
      self::NOTIFICATION_NOT_FOUND => 'Notification not found',
      self::POST_FAILED => 'Failed to create notification',
      self::FETCH_FAILED => 'Failed to fetch notification API',
      self::UPDATE_FAILED => 'Failed to update notification',
      self::ENABLED_FAILED => 'Failed to enable notifications',
      self::DISABLED_FAILED => 'Failed to disabled notifications',
      self::SEND_NOTIFICATION_BY_TYPE_FAILED => 'Failed to send notification by type',
      self::DISABLE_TO_ORGANIZATION_FORBIDDEN => 'Disabling to organization forbidden',
      self::ENABLE_TO_ORGANIZATION_FORBIDDEN => 'Enabling to organization forbidden',
      self::GET_NOTIFICATIONS_FORBIDDEN => 'Getting notifications forbidden',
      self::NOTIFICATION_REGISTRATION_FORBIDDEN => 'Notification registration forbidden',
      self::SEND_NOTIFICATION_BY_TYPE_FORBIDDEN => 'Sending notification by type forbidden',
      self::UPDATE_NOTIFICATION_FORBIDDEN => 'Updating notification forbidden',
    ];
}
