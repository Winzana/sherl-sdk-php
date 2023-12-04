<?php

namespace Sherl\Sdk\Communication\Enum;

enum CommunicationChannelEnum: string
{
    case EMAIL = 'EMAIL';
    case SMS = 'SMS';
    case PUSH = 'PUSH';
    case WHATSAPP = 'WHATSAPP';
    case FACEBOOK = 'FACEBOOK';
    case TWITTER = 'TWITTER';
    case INSTAGRAM = 'INSTAGRAM';
    case TELEGRAM = 'TELEGRAM';
}
