<?php

namespace Sherl\Sdk\Shop\Order\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Organization\Dto\OrganizationOutputDto;

use Sherl\Sdk\Person\Dto\PersonOutputDto;

use Sherl\Sdk\Shop\Discount\Dto\DiscountOutputDto;

use Sherl\Sdk\Shop\Order\Dto\OrderItemDto;
use Sherl\Sdk\Shop\Order\Dto\OrderStatusHistoryDto;
use Sherl\Sdk\Shop\Order\Dto\PaymentOutputDto;
use Sherl\Sdk\Shop\Order\Dto\OrderComissionDto;
use Sherl\Sdk\Shop\Order\Dto\ShopOrderRefundDto;

use Sherl\Sdk\Shop\Order\Enum\OrderStatusEnum;
use Sherl\Sdk\Shop\Order\Enum\ShopMeansOfPaymentEnum;

use Sherl\Sdk\Shop\Product\Enum\ShopProductType;
use Sherl\Sdk\Shop\Product\Dto\OfferDto;

use Sherl\Sdk\Place\Dto\AddressOutputDto;


class OrderResponse
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
     * @Serializer\Type("Sherl\Sdk\Organization\Dto\OrganizationOutputDto")
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
     * @var OrderStatusEnum
     * @Serializer\Type("Sherl\Sdk\Shop\Order\Enum\OrderStatusEnum")
     */
    public $orderStatus;

    /**
     * @var ShopProductType
     * @Serializer\Type("Sherl\Sdk\Shop\Product\Enum\ShopProductType")
     */
    public $type;

    /** @var ShopMeansOfPaymentEnum
    * @Serializer\Type("Sherl\Sdk\Shop\Order\Enum\ShopMeansOfPaymentEnum")
    */
   public $meansOfPayment;

   /** @var array<PaymentOutputDto>
   * @Serializer\Type("array<Sherl\Sdk\Shop\Order\Dto\PaymentOutputDto>")
   */
  public $payments;

      /**
     * @var array<OfferDto>
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
     * @var float
     * @Serializer\Type("float")
     */
    public $numberOfCredit;

    /**
     * @var AddressOutputDto
     * @Serializer\Type("Sherl\Sdk\Place\Dto\AddressOutputDto")
     */
    public $billingAddress;

    /**
     * @var array<OrderItemDto>
     * @Serializer\Type("array<Sherl\Sdk\Shop\Order\Dto\OrderItemDto>")
     */
    public $orderedItems;

    /**
     * @var array<OrderStatusHistoryDto>
     * @Serializer\Type("array<Sherl\Sdk\Shop\Order\Dto\OrderStatusHistoryDto>")
     */
    public $orderStatusHistory;

    /**
     * @var OrderComissionDto
     * @Serializer\Type("Sherl\Sdk\Shop\Order\Dto\OrderComissionDto")
     */
    public $commission;

    /**
     * @var array<ShopOrderRefundDto>
     * @Serializer\Type("array<Sherl\Sdk\Shop\Order\Dto\ShopOrderRefundDto>")
     */
    public $refunds;

        /**
     * @var mixed
     * @Serializer\Type("mixed")
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
     * @var array<DiscountOutputDto>
     * @Serializer\Type("array<Sherl\Sdk\Shop\Discount\Dto\DiscountOutputDto>")
     */
    public $discountToUsefull;

        /**
     * @var DateTime
     * @Serializer\Type("DateTime")
     */
    public $subscriptionBeginDate;

            /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $isFreeTrial;

            /**
     * @var DateTime
     * @Serializer\Type("DateTime")
     */
    public $createdAt;

            /**
     * @var DateTime
     * @Serializer\Type("DateTime")
     */
    public $updatedAt;
}
