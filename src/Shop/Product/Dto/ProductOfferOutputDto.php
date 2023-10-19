<?php

namespace Sherl\Sdk\Shop\Product\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Shop\Product\Enum\ProductOfferFrequency;

class ProductOfferOutputDto
{
  /**
   * @var float
   * @Serializer\Type("float")
   */
  public $priceDiscount;

  /**
   * @var float
   * @Serializer\Type("float")
   */
  public $price;

  /**
   * @var float
   * @Serializer\Type("float")
   */
  public $priceTaxIncluded;

  /**
   * @var float
   * @Serializer\Type("float")
   */
  public $taxRate;

  /**
   * @var ProductOfferFrequency
   * @Serializer\Type("enum<'Sherl\Sdk\Shop\Product\Enum\ProductOfferFrequency', 'value'>")
   */
  public $frequency;
}
