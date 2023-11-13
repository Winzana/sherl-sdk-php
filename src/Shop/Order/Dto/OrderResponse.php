<?php

namespace Sherl\Sdk\Shop\Order\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Organization\Dto\OrganizationOutputDto;
use Sherl\Sdk\Person\Dto\PersonOutputDto;
use Sherl\Sdk\Shop\Product\Enum;
use Sherl\Sdk\Shop\Order\Enum;

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
     * @var ----ShopProductTypeEnum
     * @Serializer\Type("Sherl\Sdk\Shop\Dto\ShopBasketAddProductOptionInputDto")
     */
    public $type;

    /** @var ShopMeansOfPaymentEnum
    * @Serializer\Type("Sherl\Sdk\Shop\Dto\ShopBasketAddProductScheduleInputDto")
    */
   public $meansOfPayment;

   /** @var array----IPayment
   * @Serializer\Type("string")
   */
  public $payments;

      /**
     * @var array---IOffer
     * @Serializer\Type("mixed")
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
     * @var IAddress ----
     * @Serializer\Type(IAddress)
     */
    public billingAddress;

    /**
     * @var array IOrderItem ----
     * @Serializer\Type(IOrderItem)
     */
    public orderedItems;

    /**
     * @var array IOrderStatusHistory ----
     * @Serializer\Type("array<IOrderStatusHistory>")
     */
    public orderStatusHistory;

    /**
     * @var IOrderCommission ----
     * @Serializer\Type(IOrderCommission)
     */
    public commission;

    /**
     * @var array IShopOrderRefund ----
     * @Serializer\Type("array<IShopOrderRefund>")
     */
    public refunds;

        /**
     * @var mixed
     * @Serializer\Type("mixed")
     */
    public metadatas: any;

            /**
     * @var string
     * @Serializer\Type("string")
     */
    public sponsorshipCode:;

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
