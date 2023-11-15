---
id: order
title: Order
---

## Get orders list

<span class="badge badge--warning">Require authentication</span>

```php
$orders = $shopClient->getOrders(OrderFindByDto $filters);
```

<details>
<summary><b>SubscriptionFindOnByDto</b></summary>

|          Field           |             Type              | Required |                        Description                        |
| :----------------------: | :---------------------------: | :------: | :-------------------------------------------------------: |
|          **id**          |            string             |   :x:    |         Optional unique identifier of the order.          |
|         **type**         |      ShopProductTypeEnum      |   :x:    |    Optional type of product associated with the order.    |
|          **q**           |            string             |   :x:    |    Optional query string for searching within orders.     |
|         **date**         |            string             |   :x:    |           Optional specific date for the order.           |
|     **dateRangeMin**     |            string             |   :x:    | Optional minimum date range for searching within orders.  |
|     **dateRangeMax**     |            string             |   :x:    | Optional maximum date range for searching within orders.  |
| **scheduleDateRangeMin** |            string             |   :x:    |   Optional minimum scheduled date range for the order.    |
| **scheduleDateRangeMax** |            string             |   :x:    |   Optional maximum scheduled date range for the order.    |
|     **orderNumber**      |             float             |   :x:    |           Optional order number for the order.            |
|     **orderStatus**      |        OrderStatusEnum        |   :x:    |           Optional current status of the order.           |
|    **orderStatusTab**    |       OrderStatusEnum[]       |   :x:    |      Optional array of order statuses for filtering.      |
|      **customerId**      |            string             |   :x:    | Optional identifier of the customer who placed the order. |
|     **customerName**     |            string             |   :x:    |    Optional name of the customer who placed the order.    |
|    **meansOfPayment**    |            string             |   :x:    |       Optional means of payment used for the order.       |
|     **serviceType**      |  OrganizationServiceTypeEnum  |   :x:    |    Optional type of service associated with the order.    |
|        **amount**        |             float             |   :x:    |               Optional amount of the order.               |
|    **filterByUsage**     | OrganizationFilterByUsageEnum |   :x:    | Optional filter for usage type associated with the order. |
|         **sort**         |             ISort             |   :x:    |      Optional sorting parameters for the order list.      |

</details>

## Get Order by ID

<span class="badge badge--warning">Require authentication</span>

```php
$order = $shopClient->getOrder(string $orderId);
```

This call returns an [OrderResponseDto](../shop-types#OrderResponseDto) object.

## Cancel Order

<span class="badge badge--warning">Require authentication</span>

```php
$cancelledOrder = $shopClient->cancelOrder(string $orderId,CancelOrderInputDto $cancelOrderDates);
```

This call returns an [OrderResponseDto](../shop-types#OrderResponseDto) object.

## Update Order Status

<span class="badge badge--warning">Require authentication</span>

```php
$updatedOrder = $shopClient->updateOrderStatus(string $orderId, OrderStatusEnum $status);
```

This call returns an [OrderResponseDto](../shop-types#OrderResponseDto) object.

## Get Organization Orders

<span class="badge badge--warning">Require authentication</span>

```php
$organizationOrders = $shopClient->getOrganizationOrders(string $organizationId, OrderFindByDto $filters);
```

This call returns a [paginated](../pagination#pagination) array of [OrderResponseDto](../shop-types#OrderResponseDto)
