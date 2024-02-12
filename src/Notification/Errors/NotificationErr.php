<?php

namespace Sherl\Sdk\Notification\Errors;

class NotificationErr
{
    public const NOTIFICATION_NOT_FOUND = 'notification/notification_not_found';
    public const NOTIFICATION_REGISTRATION_FAILED = 'notification/post-notification-failed';
    public const GET_NOTIFICATIONS_FAILED = 'notification/fetch-failed';
    public const TYPE_NOT_FOUND = 'notification/type_not_found';
    public const UPDATE_NOTIFICATION_FAILED = 'notification/update-notification-failed';
    public const ENABLE_TO_ORGANIZATION_FAILED = 'notification/enable-notification-failed';
    public const ENABLE_TO_ORGANIZATION_FORBIDDEN = 'notification/enable-to-organization-forbidden';
    public const DISABLE_TO_ORGANIZATION_FAILED = 'notification/disable-notification-failed';
    public const DISABLE_TO_ORGANIZATION_FORBIDDEN = 'notification/disable-to-organization-forbidden';
    public const SEND_NOTIFICATION_BY_TYPE_FAILED = 'notification/send-notification-by-type-failed';
    public const GET_NOTIFICATIONS_FORBIDDEN = 'notification/get-notifications-forbidden';
    public const NOTIFICATION_REGISTRATION_FORBIDDEN = 'notification/notification-registration-forbidden';
    public const SEND_NOTIFICATION_BY_TYPE_FORBIDDEN = 'send-notification-by-type-forbidden';
    public const UPDATE_NOTIFICATION_FORBIDDEN = 'update-notification-forbidden';
    public const REGISTER_FIREBASE_NOTIFICATION_FORBIDDEN = "notification/register-firebase-notification-forbidden";
    public const REGISTER_FIREBASE_NOTIFICATION_FAILED = "notification/register-firebase-notification-failed";

    /**
     * @var array<string, string>
     */
    public static $errors = [
      self::GET_NOTIFICATIONS_FAILED => 'Failed to fetch notification API',
      self::NOTIFICATION_NOT_FOUND => 'Notification not found',
      self::TYPE_NOT_FOUND => 'Type not found',
      self::NOTIFICATION_REGISTRATION_FAILED => 'Failed to create notification',
      self::ENABLE_TO_ORGANIZATION_FAILED => 'Failed to enable notifications',
      self::DISABLE_TO_ORGANIZATION_FAILED => 'Failed to disable notifications',
      self::SEND_NOTIFICATION_BY_TYPE_FAILED => 'Failed to send notification by type',
      self::DISABLE_TO_ORGANIZATION_FORBIDDEN => 'Failed to enable organization, forbidden',
      self::ENABLE_TO_ORGANIZATION_FORBIDDEN => 'Failed to enable organization, forbidden',
      self::GET_NOTIFICATIONS_FORBIDDEN => 'Failed to get organization, forbidden',
      self::NOTIFICATION_REGISTRATION_FORBIDDEN => 'Failed to register notification, forbidden',
      self::SEND_NOTIFICATION_BY_TYPE_FORBIDDEN => 'Failed to send notification by type, forbidden',
      self::UPDATE_NOTIFICATION_FORBIDDEN => 'Failed to update notification, forbidden',
      self::UPDATE_NOTIFICATION_FAILED => 'Failed to update notification',
      self::REGISTER_FIREBASE_NOTIFICATION_FORBIDDEN => 'Failed to register firebase notification, forbidden',
      self::REGISTER_FIREBASE_NOTIFICATION_FAILED => 'Failed to register firebase notification',
    ];
}
