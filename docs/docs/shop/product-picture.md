---
id: product-picture
title: Product picture
---

## Add Picture on Product

<span class="badge badge--warning">Require authentication</span>

```php
$productResponse = $client->$shop->addPictureToProduct(string $productId, string $mediaId);
```

This call returns an [ProductResponseDto](../shop-types#ProductResponseDto) object.

## Remove Picture on Product

<span class="badge badge--warning">Require authentication</span>

```php
$productResponse = $client->$shop->removePictureToProduct(string $productId, string $mediaId);
```

This call returns an [ProductResponseDto](../shop-types#ProductResponseDto) object.
