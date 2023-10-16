<?php

namespace Sherl\Sdk\Person\Enum;

enum TravelingGroup: string
{
  case SOLO = 'SOLO';

  case COUPLE = 'COUPLE';

  case FAMILY_WITH_KIDS = 'FAMILY_WITH_KIDS';

  case WITH_FRIENDS = 'WITH_FRIENDS';
}