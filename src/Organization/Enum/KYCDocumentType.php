<?php

namespace Sherl\Sdk\Organization\Enum;

enum KYCDocumentTypeEnum: string
{
  case IDENTITY_PROOF = 'IDENTITY_PROOF';
  case REGISTRATION_PROOF = 'REGISTRATION_PROOF';
  case ARTICLES_OF_ASSOCIATION = 'ARTICLES_OF_ASSOCIATION';
  case ADDRESS_PROOF = 'ADDRESS_PROOF';
  case IDENTITY_PROOF_PASSPORT = 'IDENTITY_PROOF_PASSPORT';
  case IDENTITY_PROOF_OTHER_DOCUMENT = 'IDENTITY_PROOF_OTHER_DOCUMENT';
}
