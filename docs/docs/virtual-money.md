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

| Fields             |   Type   |       Requis       | Description                                    |
| :----------------- | :------: | :----------------: | ---------------------------------------------- |
| **id**             | `string` | :white_check_mark: | L'identifiant de l'historique du portefeuille. |
| **uri**            | `string` | :white_check_mark: | L'URI associée à l'historique.                 |
| **amount**         | `float`  | :white_check_mark: | Le montant de l'historique.                    |
| **consumerId**     | `string` | :white_check_mark: | L'identifiant du consommateur.                 |
| **organizationId** | `string` | :white_check_mark: | L'identifiant de l'organisation.               |
| **description**    | `string` | :white_check_mark: | La description de l'historique.                |
| **personId**       | `string` | :white_check_mark: | L'identifiant de la personne.                  |
| **walletId**       | `string` | :white_check_mark: | L'identifiant du portefeuille.                 |
| **createdAt**      | `string` | :white_check_mark: | La date de création de l'historique.           |

</details>

This call returns a [WalletHistoricalOutputDto](virtual-money-types#wallethistoricaloutputdto) class object.

## Create wallet

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->virtualMoney->createWallet(WalletInputDto $walletHistorical);
```

<details>
<summary><b>WalletInputDto</b></summary>

| Fields       |   Type   |       Requis       | Description                                     |
| :----------- | :------: | :----------------: | ----------------------------------------------- |
| **id**       | `string` | :white_check_mark: | L'identifiant du portefeuille.                  |
| **personId** | `string` | :white_check_mark: | L'id de la personne à associer au portefeuille. |

</details>

This call returns a [WalletOutputDto](virtual-money-types#walletoutputdto) class object.

## Credit wallet

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->virtualMoney->creditWallet(string $walletId, TransferWalletInputDto $transferWallet);
```

<details>
<summary><b>TransferWalletInputDto</b></summary>

| Fields             |   Type   |       Requis       | Description                                             |
| :----------------- | :------: | :----------------: | ------------------------------------------------------- |
| **amount**         | `float`  | :white_check_mark: | Le montant à créditer sur le portefeuille               |
| **description**    | `string` | :white_check_mark: | Description de la transaction                           |
| **organizationId** | `string` | :white_check_mark: | L'id de l'organisation à qui appartient le portefeuille |

</details>

This call returns a [WalletOutputDto](virtual-money-types#walletoutputdto) class object.

## Debit wallet

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->virtualMoney->creditWallet(string $walletId, TransferWalletInputDto $transferWallet);
```

<details>
<summary><b>TransferWalletInputDto</b></summary>

| Fields             |   Type   |       Requis       | Description                                             |
| :----------------- | :------: | :----------------: | ------------------------------------------------------- |
| **amount**         | `float`  | :white_check_mark: | Le montant à débiter sur le portefeuille                |
| **description**    | `string` | :white_check_mark: | Description de la transaction                           |
| **organizationId** | `string` | :white_check_mark: | L'id de l'organisation à qui appartient le portefeuille |

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
