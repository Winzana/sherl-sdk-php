<?php

namespace Sherl\Sdk\Shop\Order\Enum;

enum OrderStatusEnum: string
{
  case CARD = 'CARD'; // Par carte
  case ADVANCE_PAYMENT = 'ADVANCE_PAYMENT'; // Acompte + Paiement en ligne
  case ADVANCE_PAYMENT_EXTERNAL = 'ADVANCE_PAYMENT_EXTERNAL'; // Acompte + Paiement sur place
  case EXTERNAL = 'EXTERNAL'; // Sur place
  case CREDIT = 'CREDIT'; // Avec virtual money
}
