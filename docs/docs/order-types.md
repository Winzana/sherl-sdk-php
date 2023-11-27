---
id: order-types
title: Order types
---

### Orders

## OrderDto

| Fields                             |                               Type                                | Description                                 |
| ---------------------------------- | :---------------------------------------------------------------: | ------------------------------------------- |
| **id**                             |                              string                               | The identifier of the advertisement         |
| **uri**                            |                                                                   | The uri of the advertisment                 |
| **name**                           |                              string                               | The name of the advertisement               |
| **consumerId**                     |                              string                               | TODO                                        |
| **organization**                   | [OrganizationOutputDto](organization-types#OrganizationOutputDto) | The organization associated to the order    |
| **customer**                       |          [PersonOutputDto](person-types#PersonOutputDto)          | The customer associated to the order        |
| **orderNumber**                    |                              integer                              | The number of the order                     |
| **orderNumberOfDay**               |                              integer                              | Number of day of the order                  |
| **orderStatus**                    |                    [OrderStatus](#OrderStatus)                    | The status of the order                     |
| **type**                           |                [ShopProductType](#ShopProductType)                | Type of the order                           |
| **meansOfPayment**                 |         [ShopMeansOfPaymentEnum](#ShopMeansOfPaymentEnum)         | The means of payment used                   |
| **payments**                       |               [PaymentDto[]](shop-types#PaymentDto)               | Payments associated to the order            |
| **acceptedOffer**                  |                 [OfferDto[]](shop-types#OfferDto)                 | The accepted offer associated to the order  |
| **price**                          |                               float                               | Price of the order                          |
| **priceTaxIncluded**               |                               float                               | Price of the order, all taxes included      |
| **priceAdvancePayment**            |                               float                               | Amount to pay in advance                    |
| **priceCommission**                |                               float                               | Amount of the commission                    |
| **priceTaxIncludedWithCommission** |                               float                               | Price with taxes and comission included     |
| **priceToPay**                     |                               float                               | Price to pay                                |
| **numberOfCredit**                 |                               float                               | Amount of credit                            |
| **billingAddress**                 |        [AddressOutputDto](../place-types#AddressOutputDto)        | The billing address                         |
| **orderedItems**                   |                   [OrderItemDto](#OrderItemDto)                   | List of the ordered items                   |
| **orderStatusHistory**             |          [OrderStatusHistoryDto](#OrderStatusHistoryDto)          | List of the order status                    |
| **commission**                     |             [OrderCommissionDto](#OrderCommissionDto)             | MangoPay Commision associated to the order  |
| **refund**                         |             [ShopOrderRefundDto](#ShopOrderRefundDto)             | Refund associated to the order              |
| **metadatas**                      |                               mixed                               | TODO                                        |
| **sponsorshipCode**                |                              string                               | Sponsor ship code                           |
| **discountCode**                   |                              string                               | Discount code                               |
| **discountToUsefull**              |                   [DiscountDto[]](#DiscountDto)                   | Total discounts to be applied               |
| **subscriptionBeginDate**          |                             DateTime                              | Begin date of the subscription              |
| **isFreeTrial**                    |                              boolean                              | Indicates the order has a free trial period |
| **createdAt**                      |                             DateTime                              | The creation date                           |
| **updatedAt**                      |                             DateTime                              | The update date                             |

## OrderFindOutputDto

| Fields           |                                  Type                                   | Description                                  |
| ---------------- | :---------------------------------------------------------------------: | -------------------------------------------- |
| **results**      |                  [OrderDto[]](../shop-types#OrderDto)                   | List of [OrderDto[]](../shop-types#OrderDto) |
| **view**         |                [ViewOutputDto](pagination#viewoutputdto)                | The discount type associated to the reward   |
| **aggregations** | array<string,[AggregationsOutputDto](pagination#aggregationsoutputdto)> | The amount of the discount                   |

## OrderItemDto

| Fields                |                            Type                             | Description                                 |
| --------------------- | :---------------------------------------------------------: | ------------------------------------------- |
| **id**                |                           string                            | The identifier of the item                  |
| **product**           |   [ProductResponseDto](product-types#ProductResponseDto)    | The product associated to the item          |
| **productId**         |                           string                            | The id of the product                       |
| **orderQuantity**     |                           integer                           | The quantity of product                     |
| **price**             |                            float                            | The price of the order item                 |
| **priceTaxeIncluded** |                            float                            | The price of the order item, taxes included |
| **priceDiscount**     |                            float                            | The price with a discount of the order item |
| **totalPrice**        |                            float                            | The total price of the order item           |
| **taxRate**           |                            float                            | The taxes part of the order item            |
| **options**           |   [OrderItemProductOptionDto](#OrderItemProductOptionDto)   | List of options                             |
| **schedules**         | [OrderItemProductScheduleDto](#OrderItemProductScheduleDto) | List of schedules                           |
| **offerId**           |                 [PaymentDto[]](#PaymentDto)                 | The offer associated to the order           |
| **refunded**          |                           boolean                           | Indicates if the item was refunded or not   |
| **metadatas**         |                            mixed                            | Metadata associated with the order item.    |

## OrderCommissionDto

| Fields        |   Type   | Description                     |
| ------------- | :------: | ------------------------------- |
| **createdAt** | DateTime | Creation date of the commission |

## OrderItemProductOptionDto

| Fields    |                               Type                                | Description                                       |
| --------- | :---------------------------------------------------------------: | ------------------------------------------------- |
| **id**    |                              string                               | The identifier of the option                      |
| **name**  |                              string                               | The name of the option                            |
| **items** | [OrderItemProductOptionItemDto[]](#OrderItemProductOptionItemDto) | List of the option items associated to the option |

## OrderItemProductOptionItemDto

| Fields               |  Type   | Description                     |
| -------------------- | :-----: | ------------------------------- |
| **name**             | string  | The name of the option          |
| **priceTaxIncluded** |  float  | The price of the option         |
| **quantity**         | integer | The quantity of the option item |

## OrderItemProductScheduleDto

| Fields               |  Type  | Description           |
| -------------------- | :----: | --------------------- |
| **allowedFromDate**  | string | Start of the schedule |
| **allowedUntilDate** | float  | End of the schedule   |

## OrderStatus

| Fields                     | Value | Description                                  |
| -------------------------- | :---: | -------------------------------------------- |
| **BASKET**                 |   0   | In Basket                                    |
| **BASKET_VALIDATED**       |  100  | In basket and validated                      |
| **WAITING_PAYMENT**        |  200  | Waiting for payment                          |
| **PAYMENT_REFUSED**        |  300  | Payment refused                              |
| **PAYED**                  |  400  | Order payed                                  |
| **WAITING_VALIDATION**     |  500  | Waiting for validation                       |
| **ORDER_REFUSED**          |  600  | The order was refused                        |
| **ORDER_ACCEPTED**         |  700  | The order was accepted                       |
| **ORDER_IN_PROGRESS**      |  800  | Order is in progress                         |
| **ORDER_READY**            |  900  | The order is ready                           |
| **FINISHED**               | 1000  | Order finished                               |
| **REFUND**                 | 1100  | The order was refund                         |
| **CONSUMER_CANCELLED**     | 9000  | The order was cancelled by the consumer      |
| **ORGANIZATION_CANCELLED** | 9100  | The order was cancelled by the oraganization |
