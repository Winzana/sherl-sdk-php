---
id: basket
title: Basket
---

## Get current basket

<span class="badge badge--warning">Require authentication</span>

```php
$order = $shopClient->getCustomerBasket(customerUri: string)
```

This call returns an [OrderOutputDto](../shop-types#OrderDto) object.

## Add product to basket

<span class="badge badge--warning">Require authentication</span>

```php
$order = $shopClient->addProductToBasket(product: AddProductInputDto);
```

<details>
<summary><b>AddProductInputDto</b></summary>

| Fields              |                                             Type                                             |      Required      | Description                                |
| ------------------- | :------------------------------------------------------------------------------------------: | :----------------: | ------------------------------------------ |
| **organizationUri** |                                            string                                            | :white_check_mark: | The identifier of the **advertisement**    |
| **orderId**         |                                            string                                            |        :x:         | The uri of the **advertisment**            |
| **lattitude**       |                                            float                                             |        :x:         | The name of the **advertisement**          |
| **longitude**       |                                            float                                             |        :x:         | TODO                                       |
| **productId**       |                 [OrganizationOutputDto](../shop-types#OrganizationOutputDto)                 | :white_check_mark: | The organization associated to the order   |
| **orderQuantity**   |                                           integer                                            | :white_check_mark: | The customer associated to the order       |
| **options**         |   [ShopBasketAddProductOptionInputDto[]](../shop-types#ShopBasketAddProductOptionInputDto)   |        :x:         | The number of the order                    |
| **schedules**       | [ShopBasketAddProductScheduleInputDto[]](../shop-types#ShopBasketAddProductScheduleInputDto) |        :x:         | Number of day of the order                 |
| **offerId**         |                                            string                                            |        :x:         | Type of the order                          |
| **metadatas**       |                                            mixed                                             |        :x:         | The means of payment used                  |
| **customerUri**     |                                            string                                            |        :x:         | Payments associated to the order           |
| **isFreeTrial**     |                                           boolean                                            |        :x:         | The accepted offer associated to the order |

</details>

This call returns an [OrderOutputDto](../shop-types#OrderDto) object.

## Remove product to basket

Removes an item identified by its id from the basket.
<span class="badge badge--warning">Require authentication</span>

```php
$order = $shopClient->removeItemFromBasket(itemId: string);
```

This call returns an [OrderOutputDto](../shop-types#OrderDto) object.

## Clear basket

Clears basket for a customer.

<span class="badge badge--warning">Require authentication</span>

```php
$result = $shopClient->clearBasket(customerId: string);
```

This call returns an [OrderOutputDto](../shop-types#OrderDto) object.

## Add comment to basket

<span class="badge badge--warning">Require authentication</span>

```php
$order = $shopClient->addCommentToBasket(comment: string);
```

This call returns an [OrderOutputDto](../shop-types#OrderDto) object.

## Add discount code to basket

<span class="badge badge--warning">Require authentication</span>

```php
$order = $shopClient->addDiscountCodeToBasket(strng $code);
```

This call returns an [OrderOutputDto](../shop-types#OrderDto) object.

## Add sponsor code to basket

<span class="badge badge--warning">Require authentication</span>

```php
$order = $shopClient->addSponsorCodeToBasket(string $code);
```

This call returns an [OrderOutputDto](../shop-types#OrderDto) object.

## Validate and pay current basket

<span class="badge badge--warning">Require authentication</span>

```php
$order = $shopClient->validateAndPayBasket(ShopBasketValidateAndPayInputDto $validation)
```

<details>
<summary><b>ShopBasketValidateAndPayInputDto</b></summary>

ShopBasketValidateAndPayInputDto extends [ShopBasketValidatePaymentInputDto](../shop-types#ShopBasketValidatePaymentInputDto)

| Fields             |                      Type                      |      Required      | Description                         |
| ------------------ | :--------------------------------------------: | :----------------: | ----------------------------------- |
| **meansOfPayment** | [MeansOfPayment](../shop-types#MeansOfPayment) | :white_check_mark: | The identifier of the advertisement |

</details>

This call returns an [OrderOutputDto](../shop-types#OrderDto) object.

## Validate pending payment to basket

<span class="badge badge--warning">Require authentication</span>

```php
$order = $shopClient->validatePaymentBasket(ShopBasketValidatePaymentInputDto $validation)

```

Parameter is an instance of [ShopBasketValidatePaymentInputDto](../shop-types#ShopBasketValidatePaymentInputDto)

This call returns an [OrderOutputDto](../shop-types#OrderDto) object.
