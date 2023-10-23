<?php

namespace Sherl\Sdk\Order\Enum;

enum MeansOfPayment: string
{
    case CARD = 'CARD';
    case ADVANCE_PAYMENT = 'ADVANCE_PAYMENT';
    case ADVANCE_PAYMENT_EXTERNAL = 'ADVANCE_PAYMENT_EXTERNAL';
    case EXTERNAL = 'EXTERNAL';
    case CREDIT = 'CREDIT';
}
