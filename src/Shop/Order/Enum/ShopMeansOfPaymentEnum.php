<?php

namespace Sherl\Sdk\Shop\Order\Enum;

enum ShopMeansOfPaymentEnum: string
{
  case CARD = 'CARD';
  case ADVANCE_PAYMENT = 'ADVANCE_PAYMENT';
  case ADVANCE_PAYMENT_EXTERNAL = 'ADVANCE_PAYMENT_EXTERNAL';
  case EXTERNAL = 'EXTERNAL';
  case CREDIT = 'CREDIT';
}
