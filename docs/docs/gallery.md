---
id: gallery
title: Gallery
---

## Create gallery

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->gallery->createGallery(CreateDynamicBackgroundInputDto $gallery);
```

<!-- <details>
<summary><b>CreateDynamicBackgroundInputDto</b></summary>

| Champs           |                           Type                            |       Requis       | Description                                           |
| :--------------- | :-------------------------------------------------------: | :----------------: | ----------------------------------------------------- |
| **media**        | [ImageObjectOutputDto](gallery-types#imageojectoutputdto) | :white_check_mark: | L'objet image utilisé comme arrière-plan dynamique.   |
| **metadatas**    |                      `string[]`                      |        :x:         | Les métadonnées associées à l'arrière-plan dynamique. |
| **displayZones** |    [DisplayZonesEnum](gallery-types#displayzonesenum)     | :white_check_mark: | Les zones d'affichage (enum).                         |
| **locations**    |     [PoiZoneInputDto](gallery-types#poizoneinputdto)      |        :x:         | Les emplacements associés à l'arrière-plan dynamique. |

</details> -->

<details>
<summary><b>CreateGalleryInputDto</b></summary>

| Champs          |                           Type                            |       Requis       | Description                              |
| :-------------- | :-------------------------------------------------------: | :----------------: | ---------------------------------------- |
| **categoryUri** |                         `string`                          | :white_check_mark: | L'url de la catégorie liée à la gallerie |
| **media**       | [ImageObjectOutputDto](gallery-types#imageojectoutputdto) | :white_check_mark: | L'objet image utilisé comme gallerie.    |

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

| Champs                         |    Type    | Requis | Description                                                          |
| :----------------------------- | :--------: | :----: | -------------------------------------------------------------------- |
| **uri**                        |  `string`  |  :x:   | L'URI de l'arrière-plan dynamique.                                   |
| **id**                         |  `string`  |  :x:   | L'identifiant de l'arrière-plan dynamique.                           |
| **country**                    |  `string`  |  :x:   | Le pays associé à l'arrière-plan dynamique.                          |
| **locality**                   |  `string`  |  :x:   | La localité associée à l'arrière-plan dynamique.                     |
| **region**                     |  `string`  |  :x:   | La région associée à l'arrière-plan dynamique.                       |
| **postalCode**                 |  `string`  |  :x:   | Le code postal associé à l'arrière-plan dynamique.                   |
| **streetAddress**              |  `string`  |  :x:   | L'adresse de rue associée à l'arrière-plan dynamique.                |
| **createdAt**                  |  `string`  |  :x:   | La date de création de l'arrière-plan dynamique.                     |
| **departement**                |  `string`  |  :x:   | Le département associé à l'arrière-plan dynamique.                   |
| **complementaryStreetAddress** |  `string`  |  :x:   | L'adresse de rue complémentaire associée à l'arrière-plan dynamique. |
| **name**                       |  `string`  |  :x:   | Le nom associé à l'arrière-plan dynamique.                           |
| **originId**                   |  `string`  |  :x:   | L'identifiant d'origine associé à l'arrière-plan dynamique.          |
| **latitude**                   |  `float`   |  :x:   | La latitude associée à l'arrière-plan dynamique.                     |
| **longitude**                  |  `float`   |  :x:   | La longitude associée à l'arrière-plan dynamique.                    |
| **displayDeleted**             | `boolean`  |  :x:   | Indique si les éléments supprimés doivent être affichés (booléen).   |
| **displayZones**               | `string[]` |  :x:   | Les zones d'affichage associées à l'arrière-plan dynamique.          |

</details>

This call returns a [DynamicBackgroundOutputDto](gallery-types#dynamicbackgroundoutputdto) object.

## Get galleries

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->gallery->getGalleries(GetGalleriesFiltersDto $filters);
```

<details>
<summary><b>GetGalleriesFiltersDto</b></summary>

| Champs  |   Type   | Requis | Description                  |
| :------ | :------: | :----: | ---------------------------- |
| **id**  | `string` |  :x:   | L'identifiant de la gallerie |
| **uri** | `string` |  :x:   | L'URI de la gallerie         |

</details>

This call returns a [GalleryOutputDto](gallery-types#galleryoutputdto) object.

## Register dynamic background

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->gallery->registerDynamicBackground(CreateDynamicBackgroundInputDto $dynamicBackground);
```

<details>
<summary><b>CreateDynamicBackgroundInputDto</b></summary>

| Champs           |          Type          |       Requis       | Description                                                            |
| :--------------- | :--------------------: | :----------------: | ---------------------------------------------------------------------- |
| **media**        | `ImageObjectOutputDto` | :white_check_mark: | L'objet image associé à l'arrière-plan dynamique.                      |
| **metadatas**    |       `string[]`       |        :x:         | Les métadonnées de l'arrière-plan dynamique.                           |
| **displayZones** |   `DisplayZonesEnum`   | :white_check_mark: | Les zones d'affichage (import à ajuster).                              |
| **locations**    |   `PoiZoneInputDto`    |        :x:         | Les zones POI associées à l'arrière-plan dynamique (import à ajuster). |

</details>

This call returns a [DynamicBackgroundOutputDto](gallery-types#dynamicbackgroundoutputdto) object.

## Update dynamic background

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->gallery->updateDynamicBackground(string $dynamicBackgroundId, CreateDynamicBackgroundInputDto $dynamicBackground);
```

<details>
<summary><b>CreateDynamicBackgroundInputDto</b></summary>

| Champs           |          Type          |       Requis       | Description                                                            |
| :--------------- | :--------------------: | :----------------: | ---------------------------------------------------------------------- |
| **media**        | `ImageObjectOutputDto` | :white_check_mark: | L'objet image associé à l'arrière-plan dynamique.                      |
| **metadatas**    |       `string[]`       |        :x:         | Les métadonnées de l'arrière-plan dynamique.                           |
| **displayZones** |   `DisplayZonesEnum`   | :white_check_mark: | Les zones d'affichage (import à ajuster).                              |
| **locations**    |   `PoiZoneInputDto`    |        :x:         | Les zones POI associées à l'arrière-plan dynamique (import à ajuster). |

</details>

This call returns a [DynamicBackgroundOutputDto](gallery-types#dynamicbackgroundoutputdto) object.
