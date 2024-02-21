<?php

namespace Sherl\Sdk\Etl\Enum;

enum HttpRequestTypeEnum: string
{
    case REST_API = 'rest-api';
    case SOAP_API = 'soap_api';
    case HTML_PARSE = 'html-parse';
}
