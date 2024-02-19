---
id: virtual-money
title: Virtual Money
---

## Create wallet historical

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->virtualMoney->createWalletHistorical(string $walletId, WalletHistoricalInputDto $walletHistorical);
```

<details>
<summary><b>WalletHistoricalInputDto</b></summary>

| Fields             |   Type   |      Required      | Description                           |
| :----------------- | :------: | :----------------: | ------------------------------------- |
| **id**             | `string` | :white_check_mark: | The identifier of the wallet history. |
| **uri**            | `string` | :white_check_mark: | The URI associated with the history.  |
| **amount**         | `float`  | :white_check_mark: | The amount of the history.            |
| **consumerId**     | `string` | :white_check_mark: | The identifier of the consumer.       |
| **organizationId** | `string` | :white_check_mark: | The identifier of the organization.   |
| **description**    | `string` | :white_check_mark: | The description of the history.       |
| **personId**       | `string` | :white_check_mark: | The identifier of the person.         |
| **walletId**       | `string` | :white_check_mark: | The identifier of the wallet.         |
| **createdAt**      | `string` | :white_check_mark: | The creation date of the history.     |

</details>

This call returns a [WalletHistoricalOutputDto](virtual-money-types#wallethistoricaloutputdto) class object.

## Create wallet

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->virtualMoney->createWallet(WalletInputDto $walletHistorical);
```

<details>
<summary><b>WalletInputDto</b></summary>

| Fields       |   Type   |      Required      | Description                                            |
| :----------- | :------: | :----------------: | ------------------------------------------------------ |
| **id**       | `string` | :white_check_mark: | The identifier of the wallet.                          |
| **personId** | `string` | :white_check_mark: | The ID of the person to be associated with the wallet. |

</details>

This call returns a [WalletOutputDto](virtual-money-types#walletoutputdto) class object.

## Credit wallet

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->virtualMoney->creditWallet(string $walletId, TransferWalletInputDto $transferWallet);
```

<details>
<summary><b>TransferWalletInputDto</b></summary>

| Fields             |   Type   |      Required      | Description                                      |
| :----------------- | :------: | :----------------: | ------------------------------------------------ |
| **amount**         | `float`  | :white_check_mark: | The amount to be credited to the wallet.         |
| **description**    | `string` | :white_check_mark: | Description of the transaction.                  |
| **organizationId** | `string` | :white_check_mark: | The ID of the organization that owns the wallet. |

</details>

This call returns a [WalletOutputDto](virtual-money-types#walletoutputdto) class object.

## Debit wallet

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->virtualMoney->debitWallet(string $walletId, TransferWalletInputDto $transferWallet);
```

<details>
<summary><b>TransferWalletInputDto</b></summary>

| Fields             |   Type   |      Required      | Description                                             |
| :----------------- | :------: | :----------------: | ------------------------------------------------------- |
| **amount**         | `float`  | :white_check_mark: | The amount to be debited from the wallet.               |
| **description**    | `string` | :white_check_mark: | Description of the transaction.                         |
| **organizationId** | `string` | :white_check_mark: | The ID of the organization to which the wallet belongs. |

</details>

This call returns a [WalletOutputDto](virtual-money-types#walletoutputdto) class object.

## Find one wallet

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->virtualMoney->findOneWallet(string $id, string $personId, string $consumerId);
```

This call returns a [WalletOutputDto](virtual-money-types#walletoutputdto) class object.

## Get wallet by id

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->virtualMoney->getWalletById(string $walletId);
```

This call returns a [WalletOutputDto](virtual-money-types#walletoutputdto) class object.

## Get wallet historical

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->virtualMoney->getWalletHistorical(string $walletId, string $historicalId);
```

This call returns a [WalletHistoricalOutputDto](virtual-money-types#wallethistoricaloutputdto) class object.
