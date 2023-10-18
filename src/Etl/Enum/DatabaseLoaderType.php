<?php

namespace Sherl\Sdk\Etl\Enum;

enum DatabaseLoaderTypeEnum: string
{
    case MONGODB = 'mongodb';
    case ELASTIC_SEARCH = 'elastic_search';
}