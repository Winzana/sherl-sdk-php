---
id: virtual-money-types
title: Virtual Money types
---

## WalletHistoricalOutputDto

| Fields             |   Type   | Description                           |
| :----------------- | :------: | ------------------------------------- |
| **id**             | `string` | The identifier of the wallet history. |
| **uri**            | `string` | The URI associated with the history.  |
| **amount**         | `float`  | The amount in the history.            |
| **consumerId**     | `string` | The consumer's identifier.            |
| **organizationId** | `string` | The organization's identifier.        |
| **description**    | `string` | The description of the history.       |
| **personId**       | `string` | The identifier of the person.         |
| **walletId**       | `string` | The wallet's identifier.              |
| **createdAt**      | `string` | The creation date of the history.     |

## WalletOutputDto

| Fields         |   Type   | Description                                |
| :------------- | :------: | ------------------------------------------ |
| **id**         | `string` | The wallet's identifier.                   |
| **uri**        | `string` | The URI associated with the wallet.        |
| **amount**     | `float`  | The amount in the wallet.                  |
| **consumerId** | `string` | The consumer's identifier.                 |
| **personId**   | `string` | The identifier of the person.              |
| **createdAt**  | `string` | The creation date of the wallet.           |
| **updatedAt**  | `string` | The date of the last update of the wallet. |
