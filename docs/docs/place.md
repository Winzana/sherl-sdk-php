---
id: place
title: Place
---

## Get places list

<span class="badge badge--warning">Required authentication</span>

Retrieve a paginated list of places with optional query filters.

```php
$places = $placeProvider->getPlaces(int $page, int $itemsPerPage, array $filters);
```

This call returns a paginated array of [PlaceOutputDto](place-types#PlaceOutputDto) objects.
