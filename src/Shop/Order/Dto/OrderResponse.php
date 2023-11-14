<?php

namespace Sherl\Sdk\Shop\Order\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Organization\Dto\OrganizationOutputDto;
use Sherl\Sdk\Person\Dto\PersonOutputDto;
use Sherl\Sdk\Shop\Product\Dto;
use Sherl\Sdk\Shop\Order\Dto\OrderItemDto;
use Sherl\Sdk\Shop\Order\Dto\OrderStatusHistoryDto;

use Sherl\Sdk\Shop\Product\Enum;
use Sherl\Sdk\Shop\Order\Enum;

use Sherl\Sdk\Place\Dto\AddressOutputDto

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
     * @var number
     * @Serializer\Type("number")
     */
    public $orderNumber;

            /**
     * @var number
     * @Serializer\Type("number")
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
    * @Serializer\Type("Sherl\Sdk\Shop\Dto\ShopBasketAddProductScheduleInputDto")
    */
   public $meansOfPayment;

   /** @var array
   * @Serializer\Type("array<Sherl\Sdk\Shop\Order\Dto\PaymentOutputDto>")
   */
  public $payments;

      /**
     * @var array
     * @Serializer\Type("array<Sherl\Sdk\Shop\Product\OfferDto>")
     */
    public $acceptedOffer;

    /**
     * @var number
     * @Serializer\Type("number")
     */
    public $price;

        /**
     * @var number
     * @Serializer\Type("number")
     */
    public $priceTaxIncluded;

        /**
     * @var number
     * @Serializer\Type("number")
     */
    public $priceAdvancePayment;

        /**
     * @var number
     * @Serializer\Type("number")
     */
    public $priceCommission;

        /**
     * @var number
     * @Serializer\Type("number")
     */
    public $priceTaxIncludedWithCommission;

        /**
     * @var number
     * @Serializer\Type("number")
     */
    public $priceToPay;

        /**
     * @var number
     * @Serializer\Type("number")
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
     * @var IOrderCommission ----
     * @Serializer\Type(IOrderCommission)
     */
    public commission;

    /**
     * @var array IShopOrderRefund ----
     * @Serializer\Type("array<IShopOrderRefund>")
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
    public $sponsorshipCode:;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public discountCode: string;

        /**
     * @var array IDiscount ----
     * @Serializer\Type("array<IDiscount>")
     */
    public discountToUsefull;

        /**
     * @var string
     * @Serializer\Type("string")
     */
    public subscriptionBeginDate;

            /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public isFreeTrial: boolean;

            /**
     * @var string
     * @Serializer\Type("string")
     */
    public createdAt;

            /**
     * @var string
     * @Serializer\Type("string")
     */
    public updatedAt;
}
