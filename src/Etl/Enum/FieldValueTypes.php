<?php

namespace Sherl\Sdk\Etl\Enum;

enum FieldValueTypesEnum: string
{
    case NUMBER = 'number';
    case STRING = 'string';
    case BOOLEAN = 'boolean';
    case OBJECT = 'object';
    case ARRAY = 'array';
    case ANY = 'any';
}
