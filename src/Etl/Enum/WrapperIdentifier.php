<?php

namespace Sherl\Sdk\Etl\Enum;

enum WrapperIdentifierEnum: string
{
    case UPPERCASE = 'uppercase';
    case LOWERCASE = 'lowercase';
    case PARSE_INT = 'parse_int';
    case BIRTHDATE_AGE = 'birthdate_age';
    case LEADING_ZEROS = 'leading_zeros';
    case NOT_OPERATOR = 'not_operator';
    case ARRAY_FIND = 'array_find';
    case ARRAY_MAP = 'array_map';
    case PROPERTY = 'property';
    case TO_BOOLEAN = 'to_boolean';
    case NORMALIZER = 'normalizer';
    case MATCH = 'match';
}
