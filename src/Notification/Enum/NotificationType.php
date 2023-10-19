<?php

namespace Sherl\Sdk\Notification\Enum;

enum NotificationType: string
{
  case EMAIL = 'email';
  case SMS = 'sms';
}
