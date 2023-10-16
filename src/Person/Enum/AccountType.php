<?php

namespace Sherl\Sdk\Person\Enum;

enum AccountType: string
{
  case PERSONAL = 'PERSONAL';

  case PROFESSIONAL = 'PROFESSIONAL';

  case BILLING = 'BILLING';
}