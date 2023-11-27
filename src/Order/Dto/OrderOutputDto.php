<?php

namespace Sherl\Sdk\Order\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Order\Dto\OrderStatusHistoryOutputDto;
use Sherl\Sdk\Order\Dto\OrderItemOutputDto;
use Sherl\Sdk\Order\Dto\OrderCommissionOutputDto;
use Sherl\Sdk\Order\Dto\OrderRefundOutputDto;
use Sherl\Sdk\Order\Dto\PaymentOutputDto;

use Sherl\Sdk\Organization\Dto\OrganizationOutputDto;

use Sherl\Sdk\Person\Dto\PersonOutputDto;

use Sherl\Sdk\Place\Dto\AddressOutputDto;

use Sherl\Sdk\Shop\Discount\Dto\DiscountOutputDto;

use Sherl\Sdk\Shop\Product\Dto\OfferDto;

use Sherl\Sdk\Order\Enum\OrderStatus;
use Sherl\Sdk\Order\Enum\MeansOfPayment;

use Sherl\Sdk\Shop\Product\Enum\ShopProductType;

class OrderOutputDto
{
  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $id;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $uri;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $consumerId;

  /**
   * @var OrganizationOutputDto
   * @Serializer\Type("Sherl\Sdk\Organization\Dto\OrganizationOutputDto;")
   */
  public $organization;

  /**
   * @var PersonOutputDto
   * @Serializer\Type("Sherl\Sdk\Person\Dto\PersonOutputDto")
   */
  public $customer;

  /**
   * @var integer
   * @Serializer\Type("integer")
   */
  public $orderNumber;

  /**
   * @var integer
   * @Serializer\Type("integer")
   */
  public $orderNumberOfDay;

  /**
   * @var OrderStatus
   * @Serializer\Type("enum<'Sherl\Sdk\Order\Enum\OrderStatus', 'value'>")
   */
  public $orderStatus;

  /**
   * @var ShopProductType
   * @Serializer\Type("enum<'Sherl\Sdk\Shop\Product\Enum\ShopProductType', 'value'>")
   */
  public $type;

  /**
   * @var MeansOfPayment
   * @Serializer\Type("enum<'Sherl\Sdk\Order\Enum\MeansOfPayment', 'value'>")
   */
  public $meansOfPayment;

  /**
   * @var PaymentOutputDto[]
   * @Serializer\Type("array<Sherl\Sdk\Order\Dto\PaymentOutputDto>")
   */
  public $payments;

  /**
   * @var OfferDto[]
   * @Serializer\Type("array<Sherl\Sdk\Shop\Product\Dto\OfferDto>")
   */
  public $acceptedOffer;

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
  public $priceAdvancePayment;

  /**
   * @var float
   * @Serializer\Type("float")
   */
  public $priceCommission;

  /**
   * @var float
   * @Serializer\Type("float")
   */
  public $priceTaxIncludedWithCommission;

  /**
   * @var float
   * @Serializer\Type("float")
   */
  public $priceToPay;

  /**
   * @var integer
   * @Serializer\Type("integer")
   */
  public $numberOfCredit;

  /**
   * @var AddressOutputDto
   * @Serializer\Type("Sherl\Sdk\Place\Dto\AddressOutputDto")
   */
  public $billingAddress;

  /**
   * @var OrderItemOutputDto[]
   * @Serializer\Type("Sherl\Sdk\Order\Dto\OrderItemOutputDto")
   */
  public $orderedItems;

  /**
   * @var OrderStatusHistoryOutputDto[]
   * @Serializer\Type("array<Sherl\Sdk\Order\Dto\OrderStatusHistoryOutputDto>")
   */
  public $orderStatusHistory;

  /**
   * @var OrderCommissionOutputDto
   * @Serializer\Type("Sherl\Sdk\Order\Dto\OrderCommissionOutputDto")
   */
  public $commission;

  /**
   * @var OrderRefundOutputDto[]
   * @Serializer\Type("array<Sherl\Sdk\Order\Dto\OrderRefundOutputDto>")
   */
  public $refunds;

  /**
   * @var array
   * @Serializer\Type("array")
   */
  public $metadatas;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $sponsorshipCode;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $discountCode;

  /**
   * @var DiscountOutputDto[]
   * @Serializer\Type("array<Sherl\Sdk\Shop\Discount\Dto\DiscountOutputDto>")
   */
  public $discountToUsefull;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $subscriptionBeginDate;

  /**
   * @var boolean
   * @Serializer\Type("boolean")
   */
  public $isFreeTrial;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $createdAt;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $updatedAt;
}
