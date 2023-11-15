<?php

namespace Sherl\Sdk\Shop\Order\Enum;

enum ProgressOrderStatusEnum: int
{
    case BASKET = 0;
    case BASKET_VALIDATED = 100;
    case WAITING_PAYMENT = 200;
    case PAYMENT_REFUSED = 300;
    case PAYED = 400;
    case WAITING_VALIDATION = 500;
    case ORDER_REFUSED = 600;
    case ORDER_ACCEPTED = 700;
    case ORDER_IN_PROGRESS = 800;
    case ORDER_READY = 900;
    case FINISHED = 1000;
    case REFUND = 1100;
    case CONSUMER_CANCELLED = 9000;
    case ORGANIZATION_CANCELLED = 9100;

}
