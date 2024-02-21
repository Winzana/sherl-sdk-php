---
id: payment
title: Payment
---

## Request Credentials to Add Card

<span class="badge badge--warning">Require authentication</span>

```php
$creditCard = $client->$shop->requestCredentialsToAddCard();
```

This call returns an [CreditCardDto](../shop-types#CreditCardDto) object.

**Next step is specific to the selected provider. Please refer to the associated SDK.**

**The data supplied by the supplier's SDK must be used to fill parameters of the saveCard function.**

## Save Card

<span class="badge badge--warning">Require authentication</span>

```php
$person = $client->$shop->saveCard(string $cardId, string $token);
```

This call returns an [PersonOutputDto](../shop-types#PersonOutputDto) object.

## Delete Card

<span class="badge badge--warning">Require authentication</span>

```php
$person = $client->$shop->deleteCard(string $cardId);
```

This call returns an [PersonOutputDto](../shop-types#PersonOutputDto) object.

## Set Default Card

<span class="badge badge--warning">Require authentication</span>

```php
$person = $client->$shop->setDefaultCard(string $cardId);
```

This call returns an [PersonOutputDto](../shop-types#PersonOutputDto) object.

## Validate Card

<span class="badge badge--warning">Require authentication</span>

```php
$creditCard = $client->$shop->validateCard(string $cardId);
```

This call returns an [CreditCardDto](../shop-types#CreditCardDto) object.
