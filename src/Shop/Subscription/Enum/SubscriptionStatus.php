<?php

namespace Sherl\Sdk\Shop\Subscription\Enum;

enum SubscriptionStatus: int
{
  case NEW = 0;
  case ACTIVE = 100;
  case FINISHED = 200;
  case ERROR = 300;
}
