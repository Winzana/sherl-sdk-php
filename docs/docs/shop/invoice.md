---
id: invoice
title: Invoice
---

This page list all actions available on shop invoices.

## Send link to paid online

<span class="badge badge--warning">Require authentication</span>

```php
$order = $shopClient->sendLinkToPaidOnline(string $invoiceId);
```

This call returns an [OrderDto](../shop-types#OrderDto) object.
