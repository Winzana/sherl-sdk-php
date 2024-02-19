<?php

namespace Sherl\Sdk\Opinion\Enum;

enum OpinionStatusEnum: string
{
    case PUBLISHED = 'published';
    case REFUSED = 'refused';
    case IS_CLAIMED = 'is_claimed';
}
