---
id: place
title: Place
---

## Get places list

<span class="badge badge--warning">Required authentication</span>

Retrieve a paginated list of places with optional query filters.

```php
$places = $sherlClient->place->getPlaces(PlaceFindByInputDto $filters, int $page, int $itemsPerPage,);
```

<details>
 <summary><b>PlaceFindByInputDto</b></summary>

|     Fields     |  Type  | Required |      Description      |
| :------------: | :----: | :------: | :-------------------: |
|     **id**     | string |   :x:    |       Place ID        |
|    **uri**     | string |   :x:    |       Place URI       |
|  **language**  | string |   :x:    | Language of the place |
| **consumerId** | string |   :x:    |      Consumer ID      |
|   **query**    | string |   :x:    |  Query for the place  |
|    **city**    | string |   :x:    |   City of the place   |

</details>

This call returns a paginated array of [PlaceOutputDto](place-types#PlaceOutputDto) objects.
