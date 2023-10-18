<?php

namespace Sherl\Sdk\Etl\Enum;

enum LoaderTypeEnum: string
{
    case DATABASE = 'database';
    case REST_API = 'rest-api';
    case EVENT = 'event';
}