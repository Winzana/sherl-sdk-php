---
id: payment
title: Payment
---

## Request Credentials to Add Card

<span class="badge badge--warning">Require authentication</span>

```php
$creditCard = $shopClient->requestCredentialsToAddCard();
```

This call returns an [CreditCardDto](../shop-types#CreditCardDto) object.

**Next step is specific to the selected provider. Please refer to the associated SDK.**

**The data supplied by the supplier's SDK must be used to fill parameters of the saveCard function.**

## Save Card

<span class="badge badge--warning">Require authentication</span>

```php
$person = $shopClient->saveCard(string $cardId, string $token);
```

This call returns an **PersonInputDto** (TODO: Add Link) object.

## Delete Card

<span class="badge badge--warning">Require authentication</span>

```php
$person = $shopClient->deleteCard(string $cardId);
```

This call returns an **PersonInputDto** (TODO: Add Link) object.

## Set Default Card

<span class="badge badge--warning">Require authentication</span>

```php
$person = $shopClient->setDefaultCard(string $cardId);
```

This call returns an **PersonInputDto** (TODO: Add Link) object.

## Validate Card

<span class="badge badge--warning">Require authentication</span>

```php
$creditCard = $shopClient->validateCard(string $cardId);
```

This call returns an [CreditCardDto](../shop-types#CreditCardDto) object.
