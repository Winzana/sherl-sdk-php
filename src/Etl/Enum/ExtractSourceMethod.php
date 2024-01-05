<?php

namespace Sherl\Sdk\Etl\Enum;

enum ExtractSourceMethodEnum: string
{
    case HTTP_REQUEST = 'http-request';

    case HTTP_PARSE = 'http-parse';

    case DB_CONNECTION = 'db-connection';

    case FILE_READING = 'file-reading';
}
