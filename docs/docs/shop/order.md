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
|          **id**          |            string             |   :x:    |         Unique identifier of the order.          |
|         **type**         |      ShopProductTypeEnum      |   :x:    |           Type of associated product.            |
|          **q**           |            string             |   :x:    |    Query string for searching within orders.     |
|         **date**         |            string             |   :x:    |                 Date the order.                  |
|     **dateRangeMin**     |            string             |   :x:    | Minimum date range for searching within orders.  |
|     **dateRangeMax**     |            string             |   :x:    | Maximum date range for searching within orders.  |
| **scheduleDateRangeMin** |            string             |   :x:    |   Minimum scheduled date range for the order.    |
| **scheduleDateRangeMax** |            string             |   :x:    |   Maximum scheduled date range for the order.    |
|     **orderNumber**      |             float             |   :x:    |                  Order number.                   |
|     **orderStatus**      |          OrderStatus          |   :x:    |           Current status of the order.           |
|    **orderStatusTab**    |         OrderStatus[]         |   :x:    |      Array of order statuses for filtering.      |
|      **customerId**      |            string             |   :x:    | Identifier of the customer associated the order. |
|     **customerName**     |            string             |   :x:    |  Name of the customer associated to the order.   |
|    **meansOfPayment**    |            string             |   :x:    |       Means of payment used for the order.       |
|     **serviceType**      |  OrganizationServiceTypeEnum  |   :x:    |    Type of service associated with the order.    |
|        **amount**        |             float             |   :x:    |               Amount of the order.               |
|    **filterByUsage**     | OrganizationFilterByUsageEnum |   :x:    |    Usage filter type associated to the order.    |
|         **sort**         |             ISort             |   :x:    |      Sorting parameters for the order list.      |

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
