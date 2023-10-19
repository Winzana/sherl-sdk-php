---
id: notification
title: Notification
---

## Register firebase notification

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->notification->registerFirebaseNotification(string $notificationRegistrationToken);
```

This call returns a [NotificationRegistrationOutputDto](notification-types#notificationregistrationoutputdto) class.

## Update notification

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->notification->updateNotification(string $notificationId, NotificationUpdateInputDto $notificationUpdateInput);
```

<details>
<summary><b>NotificationUpdateInputDto</b></summary>

| Fields            |  Type   |      Required      | Description           |
| :---------------- | :-----: | :----------------: | :-------------------- |
| **$contentEmail** | string  | :white_check_mark: | Content of email      |
| **$contentSMS**   | string  | :white_check_mark: | Content of sms        |
| **$enabled**      | boolean | :white_check_mark: | Notification's status |

</details>

This call returns a [NotificationRegistrationOutputDto](notification-types#notificationoutputdto) class.

## Get notifications

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->notification->getNotifications(NotificationFiltersInputDto $notificationFiltersInput);
```

<details>
<summary><b>NotificationFiltersInputDto</b></summary>

| Fields    |  Type   | Required | Description        |
| :-------- | :-----: | :------: | :----------------- |
| **sms**   | integer |   :x:    | TODO               |
| **email** | integer |   :x:    | TODO               |
| **uri**   | string  |   :x:    | Notification's uri |
| **id**    | string  |   :x:    | Notification's id  |

</details>

This call returns a [NotificationListOutputDto](notification-types#notificationlistoutputdto) class.

## Enable notification on organization

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->notification->enableNotificationToOrganization(string $notificationId, string $organizationId);
```

This call returns a [NotificationOutputDto](notification-types#notificationoutputdto) class.

## Disable notification on organization

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->notification->disableNotificationToOrganization(string $notificationId, string $organizationId);
```

This call returns a [NotificationOutputDto](notification-types#notificationoutputdto) class.

## Send notification by type

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->notification->sendNotification(NotificationType $notificationType, SendNotificationInputDto $sendNotificationInput);
```

<details>
<summary><b>SendNotificationInputDto</b></summary>

| Fields      |  Type  |      Required      | Description            |
| :---------- | :----: | :----------------: | :--------------------- |
| **html**    | string | :white_check_mark: | Notification html text |
| **text**    | string | :white_check_mark: | Notification text      |
| **subject** | string | :white_check_mark: | Notification subject   |

</details>

This call returns a boolean according to successfully of notification sending.
