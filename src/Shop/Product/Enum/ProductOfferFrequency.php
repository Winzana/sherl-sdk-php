<?php

namespace Sherl\Sdk\Shop\Product\Enum;

enum ProductOfferFrequency: string
{
  case ONCE = 'once';
  case MONTHLY = 'monthly';
  case YEARLY = 'yearly';
}
