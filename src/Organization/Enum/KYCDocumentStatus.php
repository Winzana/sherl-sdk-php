<?php

namespace Sherl\Sdk\Organization\Enum;

enum KYCDocumentStatusEnum: string
{
  case CREATED = 'CREATED';
  case VALIDATION_ASKED = 'VALIDATION_ASKED';
  case VALIDATED = 'VALIDATED';
  case REFUSED = 'REFUSED';
}
