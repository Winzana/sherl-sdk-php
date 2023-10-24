<?php

namespace Sherl\Sdk\Analytics\Enum;

enum SourcesEnum: string
{
    case QR = 'qr';
    case SOCIAL = 'social';
    case ORGANIC = 'organic';
    case REFERRAL = 'referral';
    case DIRECT = 'direct';
    case CAMPAIGNS = 'campaigns';
}
