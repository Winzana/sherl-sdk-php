---
id: subscription
title: Subscription
---

## Find one subscription

<span class="badge badge--warning">Require authentication</span>

```php
$subscription = $shopClient->getSubscriptionFindOneBy(ISubscriptionFindOnByDto $filters);
```

<details>
<summary><b>SubscriptionFindOnByDto</b></summary>

|      Field      |  Type   | Required |                  Description                   |
| :-------------: | :-----: | :------: | :--------------------------------------------: |
|     **id**      | string  |   :x:    |   The unique identifier of the subscription.   |
|     **uri**     | string  |   :x:    |          The URI of the subscription.          |
|    **name**     | string  |   :x:    |         The name of the subscription.          |
|  **ownerUri**   | string  |   :x:    |   The URI of the owner of the subscription.    |
| **consumerId**  | string  |   :x:    |  The consumer ID related to the subscription.  |
| **actionFrom**  | string  |   :x:    | The start point of the subscription activity.  |
| **activeUntil** | string  |   :x:    |  The end point of the subscription activity.   |
|  **activeFor**  | string  |   :x:    | Duration for which the subscription is active. |
|   **enabled**   | boolean |   :x:    | Indicates whether the subscription is enabled. |
|  **sourceUri**  | string  |   :x:    |      The source URI of the subscription.       |

</details>

This call returns an [SubscriptionOutputDto](../shop-types#SubscriptionOutputDto) object.

## Cancel subscription

<span class="badge badge--warning">Require authentication</span>

```php
$cancelledSubscription = $shopClient->cancelSubscription(string $subscriptionId);
```

This call returns an updated [SubscriptionOutputDto](../shop-types#SubscriptionOutputDto) object, typically reflecting its cancelled status.
