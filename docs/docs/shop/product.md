---
id: product
title: Product
---

## Get Products List

<span class="badge badge--warning">Require authentication</span>

```php
$products = $client->$shop->getProducts(ProductFindByDto $filters);
```

**IProductFindByDto** extends [PaginationFiltersInputDto](../pagination#PaginationFiltersInputDto)

| Fields                  | Type               | Required | Description                                               |
| ----------------------- | ------------------ | -------- | --------------------------------------------------------- |
| **ids**                 | string[]           | :x:      | Array of unique identifiers for products.                 |
| **externalIds**         | string[]           | :x:      | Array of external identifiers for products.               |
| **excludedExternalIds** | string[]           | :x:      | Array of external identifiers to be excluded.             |
| **externalIdentifier**  | string             | :x:      | A specific external identifier for a product.             |
| **uri**                 | string             | :x:      | The URI of the product.                                   |
| **versionNumber**       | number             | :x:      | The version number of the product.                        |
| **slug**                | string             | :x:      | The slug used in a human-readable URL for the product.    |
| **parentUri**           | string             | :x:      | The URI of the parent product.                            |
| **organizationUri**     | string             | :x:      | The URI of the organization associated with the product.  |
| **organizationSlug**    | string             | :x:      | The slug of the organization associated with the product. |
| **id**                  | string             | :x:      | The unique identifier of the product.                     |
| **name**                | string             | :x:      | The name of the product.                                  |
| **categoryUri**         | string             | :x:      | The URI of the product's category.                        |
| **categoryUris**        | string[]           | :x:      | Array of URIs for the product's categories.               |
| **consumerId**          | string             | :x:      | The consumer ID associated with the product.              |
| **q**                   | string             | :x:      | A search query string for finding products.               |
| **isEnable**            | boolean            | :x:      | Indicates whether the product is enabled.                 |
| **languages**           | string[]           | :x:      | Array of languages available for the product.             |
| **placeForward**        | boolean            | :x:      | A flag to indicate place forwarding.                      |
| **strictPlaceForward**  | boolean            | :x:      | A flag to indicate strict place forwarding.               |
| **geopoint**            | string             | :x:      | A geolocation point associated with the product.          |
| **distance**            | number             | :x:      | The distance range for the product's location.            |
| **withinHours**         | boolean            | :x:      | A flag to filter products available within certain hours. |
| **startDate**           | string             | :x:      | The start date for product availability.                  |
| **endDate**             | string             | :x:      | The end date for product availability.                    |
| **displayAllVersion**   | boolean            | :x:      | A flag to display all versions of the product.            |
| **includeDeleted**      | boolean            | :x:      | A flag to include deleted products in the results.        |
| **isUpdatedByHuman**    | boolean            | :x:      | Indicates whether the product was updated by a human.     |
| **tag**                 | ProductTags        | :x:      | A tag associated with the product.                        |
| **tags**                | number             | :x:      | Numeric tags associated with the product.                 |
| **displayMode**         | ProductDisplayMode | :x:      | The display mode of the product.                          |
| **type**                | ProductTypeEnum    | :x:      | The type of the product.                                  |
| **noBind**              | boolean            | :x:      | A flag indicating if the product should not be bound.     |
| **uriOfPanels**         | string[]           | :x:      | Array of URIs of panels associated with the product.      |
| **panel**               | string             | :x:      | The panel associated with the product.                    |

This call returns a [paginated](../pagination#pagination) array of [ProductPaginatedResultDto](../shop-types#ProductPaginatedResultDto) objects.

## Get Public Products

<span class="badge badge--success">Public</span>

```php
$publicProducts = $client->$shop->getPublicProducts(ProductFindByDto $filters);
```

This call returns a [paginated](../pagination#pagination) array of [ProductPaginatedResultDto](../shop-types#ProductPaginatedResultDto) objects.

## Get Product by ID

<span class="badge badge--warning">Require authentication</span>

```php
$product = $client->$shop->getProduct(string $id);
```

This call returns an [ProductResponseDto](../shop-types#ProductResponseDto) object.

## Get Public Product by Slug

<span class="badge badge--success">Public</span>

```php
$publicProduct = $client->$shop->getPublicProductBySlug(string $slug);
```

This call returns an [PublicProductResponseDto](../shop-types#PublicProductResponseDto) object.

## Add Comment on Product

<span class="badge badge--warning">Require authentication</span>

```php
$comment = $client->$shop->addCommentOnProduct(AddCommentOnProductDto $productComment);
```

This call returns an [CommentDto](../shop-types#CommentDto) object.

## Get All Product Comments

<span class="badge badge--warning">Require authentication</span>

```php
$comments = $client->$shop->getProductComments(string $productId, FindProductCommentsInputDto $filters);
```

This call returns an [SearchResultDto](../pagination#SearchResultDto) of [ProductCommentsResult](../shop-types#ProductCommentsResult) objects.

## Add Option to Product

<span class="badge badge--warning">Require authentication</span>

```php
$productResponse = $client->$shop->addOptionToProduct(string $productId, mixed $option);
```

This call returns an [ProductOutputDto](../shop-types#ProductOutputDto) object.

## Remove a Product Option

<span class="badge badge--warning">Require authentication</span>

```php
$productResponse = $client->$shop->removeProductOption(string $productId, string $optionId);
```

This call returns an [ProductOutputDto](../shop-types#ProductOutputDto) object.

## Add Like to Product

<span class="badge badge--warning">Require authentication</span>

```php
$likesCount = $client->$shop->addLikeToProduct(string $productId);
```

This call returns the current number of likes.

## Get Product Likes

<span class="badge badge--warning">Require authentication</span>

```php
$likesCount = $client->$shop->getProductLikes(string $productId);
```

This call returns the current number of likes.

## Get Product Views

<span class="badge badge--warning">Require authentication</span>

```php
$viewsCount = $client->$shop->getProductViews(string $productId);
```

This call returns the current number of views.
