<?php

namespace Sherl\Sdk\Claim\Enum;

enum ClaimStatus: string
{
  case NEW = 'NEW';

  case READ = 'READ';

  case REFUND = 'REFUND';

  case CLOSED = 'CLOSED';
}
