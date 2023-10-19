<?php

namespace Sherl\Sdk\Shop\Product\Enum;

enum ShopProductType: string
{
  case CREDIT = 'CREDIT';
  case DEFAULT = 'DEFAULT';
  case ROOM = 'ROOM';
  case TIP = 'TIP';
  case SERVICE = 'SERVICE';
  case PLAN = 'PLAN';
  case QUOTA = 'QUOTA';
  case REFUND = 'REFUND';
}
