---
id: virtual-money
title: Virtual Money
---

## Create wallet historical

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->virtualMoney->createWalletHistorical(string $walletId, WalletHistoricalInputDto $walletHistoricalInput);
```

This call returns a [WalletHistoricalOutputDto](virtual-money-types#wallethistoricaloutputdto) class.
