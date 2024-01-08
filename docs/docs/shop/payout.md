---
id: payout
title: Payout
---

## Generate payout

<span class="badge badge--warning">Require authentication</span>

```php
$payouts = $shopClient->generatePayout();
```

This call returns an array [PayoutDto](../shop-types#PayoutDto) objects.

## Submit Payout

<span class="badge badge--warning">Require authentication</span>

```php
$payout = $shopClient->submitPayout();
```

This call returns an [PayoutDto](../shop-types#PayoutDto) object.
