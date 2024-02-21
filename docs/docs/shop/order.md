---
id: order
title: Order
---

## Get orders list

<span class="badge badge--warning">Require authentication</span>

```php
$orders = $client->$shop->getOrders(OrderFindByDto $filters);
```

<details>
<summary><b>OrderFindInputDto</b></summary>

|          Field           |             Type              | Required |                   Description                    |
| :----------------------: | :---------------------------: | :------: | :----------------------------------------------: |
|          **id**          |            string             |   :x:    |         unique identifier of the order.          |
|         **type**         |      ShopProductTypeEnum      |   :x:    |    type of product associated with the order.    |
|          **q**           |            string             |   :x:    |    query string for searching within orders.     |
|         **date**         |            string             |   :x:    |           specific date for the order.           |
|     **dateRangeMin**     |            string             |   :x:    | minimum date range for searching within orders.  |
|     **dateRangeMax**     |            string             |   :x:    | maximum date range for searching within orders.  |
| **scheduleDateRangeMin** |            string             |   :x:    |   minimum scheduled date range for the order.    |
| **scheduleDateRangeMax** |            string             |   :x:    |   maximum scheduled date range for the order.    |
|     **orderNumber**      |             float             |   :x:    |           order number for the order.            |
|     **orderStatus**      |          OrderStatus          |   :x:    |           current status of the order.           |
|    **orderStatusTab**    |         OrderStatus[]         |   :x:    |      array of order statuses for filtering.      |
|      **customerId**      |            string             |   :x:    | identifier of the customer who placed the order. |
|     **customerName**     |            string             |   :x:    |    name of the customer who placed the order.    |
|    **meansOfPayment**    |            string             |   :x:    |       means of payment used for the order.       |
|     **serviceType**      |  OrganizationServiceTypeEnum  |   :x:    |    type of service associated with the order.    |
|        **amount**        |             float             |   :x:    |               amount of the order.               |
|    **filterByUsage**     | OrganizationFilterByUsageEnum |   :x:    | filter for usage type associated with the order. |
|         **sort**         |             ISort             |   :x:    |      sorting parameters for the order list.      |

</details>

## Get Order by ID

<span class="badge badge--warning">Require authentication</span>

```php
$order = $client->$shop->getOrder(string $orderId);
```

This call returns an [OrderDto](../order-types#OrderDto) object.

## Cancel Order

<span class="badge badge--warning">Require authentication</span>

```php
$cancelledOrder = $client->$shop->cancelOrder(string $orderId,CancelOrderInputDto $cancelOrderDates);
```

This call returns an [OrderDto](../order-types#OrderDto) object.

## Update Order Status

<span class="badge badge--warning">Require authentication</span>

```php
$updatedOrder = $client->$shop->updateOrderStatus(string $orderId, OrderStatus $status);
```

This call returns an [OrderFindOutputDto](../order-types#OrderFindOutputDto) object.

## Get Organization Orders

<span class="badge badge--warning">Require authentication</span>

```php
$organizationOrders = $client->$shop->getOrganizationOrders(string $organizationId, OrderFindInputDto $filters);
```

This call returns a [OrderFindOutputDto](../order-types#OrderFindOutputDto).
