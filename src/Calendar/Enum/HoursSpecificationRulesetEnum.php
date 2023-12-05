<?php

namespace Sherl\Sdk\Calendar\Enum;

enum HoursSpecificationRulesetEnum: string
{
    case OPEN_EVERY_DAY = 'OPEN_EVERY_DAY';
    case OPEN_EXCEPT_WEEK_DAYS = 'OPEN_EXCEPT_WEEK_DAYS';
    case OPEN_WEEK_DAYS = 'OPEN_WEEK_DAYS';
}
