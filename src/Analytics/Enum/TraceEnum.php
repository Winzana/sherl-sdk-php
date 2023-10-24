<?php

namespace Sherl\Sdk\Analytics\Enum;

enum TraceEnum: string
{
    // USER
    case USER_LOGGED = 'user:logged';
    case USER_LOGGED_SMS = 'user:logged:sms';
    case USER_LOGGED_FACEBOOK = 'user:logged:facebook';
    case USER_LOGGED_GOOGLE = 'user:logged:google';
    case USER_LOGGED_EMAIL = 'user:logged:email';
    case USER_LOGOUT = 'user:logout';
    case USER_DETECTED = 'user:detected';
    case ETL_EXTRACT_TRANSFORM_LOAD = 'etl:extract-transform-load';
    // PERSON
    case PERSON_REGISTER = 'person:register';
    // ORGANIZATION
    case ORGANIZATION_VIEW = 'organization:view';
    case ORGANIZATION_VISITED = 'organization:visited';
    case ORGANIZATION_VISITED_FIRST = 'organization:visited-first';
    case ORGANIZATION_LIKED = 'organization:liked';
    // ORDER
    case ORDER_FINISHED = 'order:finished';
    case ORDER_FINISHED_AMOUNT = 'order:finished:amount';
    case ORDER_FINISHED_AMOUNT_COMMISSION = 'order:finished:amount:commission';
    case ORDER_FINISHED_AMOUNT_TO_ORGANIZATION = 'order:finished:amount:to-organization';
    case ORDER_FINISHED_PRODUCT = 'order:finished:product';
    case ORDER_FINISHED_PRODUCT_AMOUNT = 'order:finished:product:amount';
    // PRODUCT
    case PRODUCT_ADD_TO_BASKET = 'product:add-to-basket';
    case PRODUCT_LIKED = 'product:liked';
    case PRODUCT_VIEWS = 'product:views';
    // NOTIFICATION
    case NOTIFICATION_EMAIL_SENT = 'notification:email-sent';
    case NOTIFICATION_SMS_SENT = 'notification:sms-sent';
    // ANALYTICS
    case WEBSITE_PAGE_CHANGE = 'bi:website:page:change';
}
