---
id: payout
title: Payout
---

## Generate payout

<span class="badge badge--warning">Require authentication</span>

```php
$payouts = $client->$shop->generatePayout();
```

This call returns an array [PayoutDto](../shop-types#PayoutDto) objects.

## Submit Payout

<span class="badge badge--warning">Require authentication</span>

```php
$payout = $client->$shop->submitPayout();
```

This call returns an [PayoutDto](../shop-types#PayoutDto) object.
