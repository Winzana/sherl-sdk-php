---
id: gallery
title: Gallery
---

## Create gallery

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->gallery->createGallery(CreateDynamicBackgroundInputDto $gallery);
```

<details>
<summary><b>CreateGalleryInputDto</b></summary>

| Fields          |                           Type                            |      Required      | Description                                   |
| :-------------- | :-------------------------------------------------------: | :----------------: | --------------------------------------------- |
| **categoryUri** |                         `string`                          | :white_check_mark: | The URL of the category linked to the gallery |
| **media**       | [ImageObjectOutputDto](gallery-types#imageojectoutputdto) | :white_check_mark: | The image object used as the gallery          |

</details>

This call returns a [GalleryOutputDto](gallery-types#galleryoutputdto) object.

## Delete dynamic background

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->gallery->deleteDynamicBackground(string $dynamicBakgroundId);
```

This call returns a [GalleryOutputDto](gallery-types#galleryoutputdto) object.

## Delete gallery

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->gallery->deleteGallery(string $galleryId);
```

This call returns a [GalleryOutputDto](gallery-types#galleryoutputdto) object.

## Get dynamic background

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->gallery->getDynamicBackgrounds(GetDynamicBackgroundFilters $filters);
```

<details>
<summary><b>GetDynamicBackgroundFilters</b></summary>

| Field                          |    Type    | Required | Description                                                              |
| :----------------------------- | :--------: | :------: | ------------------------------------------------------------------------ |
| **uri**                        |  `string`  |   :x:    | The URI of the dynamic background.                                       |
| **id**                         |  `string`  |   :x:    | The identifier of the dynamic background.                                |
| **country**                    |  `string`  |   :x:    | The country associated with the dynamic background.                      |
| **locality**                   |  `string`  |   :x:    | The locality associated with the dynamic background.                     |
| **region**                     |  `string`  |   :x:    | The region associated with the dynamic background.                       |
| **postalCode**                 |  `string`  |   :x:    | The postal code associated with the dynamic background.                  |
| **streetAddress**              |  `string`  |   :x:    | The street address associated with the dynamic background.               |
| **createdAt**                  |  `string`  |   :x:    | The date of creation of the dynamic background.                          |
| **departement**                |  `string`  |   :x:    | The department associated with the dynamic background.                   |
| **complementaryStreetAddress** |  `string`  |   :x:    | The complementary street address associated with the dynamic background. |
| **name**                       |  `string`  |   :x:    | The name associated with the dynamic background.                         |
| **originId**                   |  `string`  |   :x:    | The origin identifier associated with the dynamic background.            |
| **latitude**                   |  `float`   |   :x:    | The latitude associated with the dynamic background.                     |
| **longitude**                  |  `float`   |   :x:    | The longitude associated with the dynamic background.                    |
| **displayDeleted**             | `boolean`  |   :x:    | Indicates if deleted items should be displayed (boolean).                |
| **displayZones**               | `string[]` |   :x:    | The display zones associated with the dynamic background.                |

</details>

This call returns a [DynamicBackgroundOutputDto](gallery-types#dynamicbackgroundoutputdto) object.

## Get galleries

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->gallery->getGalleries(GetGalleriesFiltersDto $filters);
```

<details>
<summary><b>GetGalleriesFiltersDto</b></summary>

| Fields  |   Type   | Required | Description            |
| :------ | :------: | :------: | ---------------------- |
| **id**  | `string` |   :x:    | The ID of the gallery  |
| **uri** | `string` |   :x:    | The URI of the gallery |

</details>

This call returns a [GalleryOutputDto](gallery-types#galleryoutputdto) object.

## Create dynamic background

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->gallery->createDynamicBackground(CreateDynamicBackgroundInputDto $dynamicBackground);
```

<details>
<summary><b>CreateDynamicBackgroundInputDto</b></summary>

| Fields           |          Type          |      Required      | Description                                                                     |
| :--------------- | :--------------------: | :----------------: | ------------------------------------------------------------------------------- |
| **media**        | `ImageObjectOutputDto` | :white_check_mark: | The image object associated with the dynamic background.                        |
| **metadatas**    |       `string[]`       |        :x:         | Dynamic background metadata.                                                    |
| **displayZones** |   `DisplayZonesEnum`   | :white_check_mark: | Display zones (TODO: import to be adjusted).                                    |
| **locations**    |   `PoiZoneInputDto`    |        :x:         | POI zones associated with the dynamic background (TODO: import to be adjusted). |

</details>

This call returns a [DynamicBackgroundOutputDto](gallery-types#dynamicbackgroundoutputdto) object.

## Update dynamic background

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->gallery->updateDynamicBackground(string $dynamicBackgroundId, CreateDynamicBackgroundInputDto $dynamicBackground);
```

<details>
<summary><b>CreateDynamicBackgroundInputDto</b></summary>

| Fields           |          Type          |      Required      | Description                                                                     |
| :--------------- | :--------------------: | :----------------: | ------------------------------------------------------------------------------- |
| **media**        | `ImageObjectOutputDto` | :white_check_mark: | The image object associated with the dynamic background                         |
| **metadatas**    |       `string[]`       |        :x:         | Dynamic background metadata                                                     |
| **displayZones** |   `DisplayZonesEnum`   | :white_check_mark: | Display zones (TODO: import to be adjusted).                                    |
| **locations**    |   `PoiZoneInputDto`    |        :x:         | POI zones associated with the dynamic background (TODO: import to be adjusted). |

</details>

This call returns a [DynamicBackgroundOutputDto](gallery-types#dynamicbackgroundoutputdto) object.
