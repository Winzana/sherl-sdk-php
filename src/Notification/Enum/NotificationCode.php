<?php

namespace Sherl\Sdk\Notification\Enum;

enum NotificationCode: string
{
    case CONTACT = 'contact';
    case PERSON_REGISTER = 'person:register';
    case FOUNDER_REGISTER = 'founder:register';
    case EMPLOYEE_REGISTER = 'employee:register';
    case TEST_NOTIFICATION = 'notification:test';
    case AUTH_SMS_REQUEST = 'auth:sms-request';
    case USER_PASSWORD_FORGOT_REQUEST = 'user:password:forgot-request';
    case USER_REGISTERED = 'user:registered';
    case CLAIM_CREATED = 'claim:created';
    case CLAIM_REPLY = 'claim:reply';
    case CLAIM_REFUND = 'claim:refund';
    case OPINION_CREATE = 'opinion:create';
    case OPINION_CLAIM = 'opinion:claim';
    case OPINION_PROPOSITION_TO_CREATE = 'opinion:proposition-to-create';
    case SHOP_ORDER_NEW = 'shop:order:new';
    case SHOP_ORDER_STATUS_CHANGED_FINISHED_TO_REFUND = 'shop:order:status:changed:finished-to-refund';
    case SHOP_ORDER_STATUS_CHANGED_ORDER_ACCEPTED_TO_ORDER_IN_PROGRESS = 'shop:order:status:changed:order-accepted-to-order-in-progress';
    case SHOP_ORDER_STATUS_CHANGED_ORDER_IN_PROGRESS_TO_ORDER_READY = 'shop:order:status:changed:order-in-progress-to-order-ready';
    case SHOP_ORDER_STATUS_CHANGED_ORDER_READY_TO_FINISHED = 'shop:order:status:changed:order-ready-to-finished';
    case SHOP_ORDER_STATUS_CHANGED_ORDER_WAITING_VALIDATION_TO_ORDER_REFUSED = 'shop:order:status:changed:waiting-validation-to-order-refused';
    case SHOP_ORDER_STATUS_CHANGED_PAYED_TO_FINISHED = 'shop:order:status:changed:payed-to-finished';
    case SHOP_ORDER_STATUS_CHANGED_TO_PAYMENT_REFUSED = 'shop:order:status:basket-validated-to-payment-refused';
    case SHOP_ORDER_STATUS_CHANGED_TO_ORGANIZATION_CANCELLED = 'shop:order:order-in-progress-to-organization-cancelled';
}
