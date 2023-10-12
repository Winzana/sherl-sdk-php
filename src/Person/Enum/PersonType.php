<?php

namespace Sherl\Sdk\Person\Enum;

enum PersonType: string
{
  case DEFAULT = 'DEFAULT';

  case EMPLOYEE = 'EMPLOYEE';

  case FOUNDER = 'FOUNDER';

  case ADMIN = 'ADMIN';
}