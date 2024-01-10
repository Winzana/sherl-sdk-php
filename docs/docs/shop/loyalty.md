---
id: loyalty
title: Loyalty
---

## Get loyalty cards (current user connected)

<span class="badge badge--warning">Require authentication</span>

```php
$results = $shopClient->getLoyaltiesCardToMe(LoyaltyCardFindByDto $filter );
```

<details>
<summary><b>LoyaltyCardFindByDto</b></summary>

| Fields         |   Type   | Required | Description                                     |
| -------------- | :------: | :------: | ----------------------------------------------- |
| id             |  string  |   :x:    | The identifier of the Loyalty card              |
| uri            |  string  |   :x:    | The uri of the Loyalty card                     |
| ownerUri       |  string  |   :x:    | The uri of the Loyalty card's owner             |
| ownerownerUris | string[] |   :x:    | List of owner uris                              |
| enabled        | boolean  |   :x:    | Indicates if the loyalty card is enabled or not |

This call returns a [LoyaltySearchResultDto](../shop-types#LoyaltySearchResultDto) objects.

</details>

## Get organization loyalty card

<span class="badge badge--warning">Require authentication</span>

```php
$card = $shopClient->getOrganizationLoyaltyCard(string $organizationId);
```

This call returns an [LoyaltyCardDto](../shop-types#LoyaltyCardDto) object.

## Update loyalty card

<span class="badge badge--warning">Require authentication</span>

```php
card = $shopClient->updateLoyaltyCard(string $cardId, ShopLoyaltyCardUpdateInputDto  $updateInfo);
```

<details>
<summary><b>LoyaltyCardFindByDto</b></summary>

| Fields       |                    Type                    |      Required      | Description                                     |
| ------------ | :----------------------------------------: | :----------------: | ----------------------------------------------- |
| amount       |                   string                   |        :x:         | The identifier of the Loyalty card              |
| discountType | [DiscountType](../shop-types#DiscountType) | :white_check_mark: | The uri of the Loyalty card                     |
| percentage   |                   string                   |        :x:         | The uri of the Loyalty card's owner             |
| enabled      |                  boolean                   |        :x:         | Indicates if the loyalty card is enabled or not |

</details>

This call returns an [LoyaltyCardDto](../shop-types#LoyaltyCardDto) object.
