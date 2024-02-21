---
id: advertisements
title: Advertisements
---

## Create an advertisement

<span class="badge badge--warning">Require authentication</span>

```php
$advertisement = $client->$shop->createAdvertisement(CreateAdvertisementInputDto $createAdvertisement);
```

<details>
<summary><b>CreateAdvertisementInputDto</b></summary>

| Fields              |                                    Type                                    |      Required      | Description                                        |
| ------------------- | :------------------------------------------------------------------------: | :----------------: | -------------------------------------------------- |
| name                |                                   string                                   | :white_check_mark: | The name of the **advertisement**                  |
| **description**     |                                   string                                   | :white_check_mark: | Description of the **advertisement**               |
| **redirectUrl**     |                                   string                                   | :white_check_mark: | The redirect **url**                               |
| **displayZones**    |              [DisplayZoneEnum](../shop-types#displayzoneenum)              |        :x:         | Zones to display the **advertisement**             |
| **backgroundImage** |          [MediaObjectOutputDto](media-types#MediaObjectOutputDto)          |        :x:         | The background image to **display**                |
| **translations**    | [AdvertisementTranslationDto[]](../shop-types#AdvertisementTranslationDto) |        :x:         | The translations available for this advertisement. |
| **metadatas**       |                                   mixed                                    |        :x:         | TODO                                               |

</details>

This call returns an [AdvertisementDto](../shop-types#AdvertisementDto) object.

## Update an advertisement

Updates an advertisement identified by its advertisementId.

<span class="badge badge--warning">Require authentication</span>

```php
$advertisement = $client->$shop->updateAdvertisement(
  string $advertisementId,
  CreateAdvertisementInputDto $updateAdvertisement
  );
```

<details>
<summary><b>CreateAdvertisementInputDto</b></summary>

| Fields              |                                    Type                                    |      Required      | Description                                            |
| ------------------- | :------------------------------------------------------------------------: | :----------------: | ------------------------------------------------------ |
| **name**            |                                   string                                   | :white_check_mark: | The name of the **advertisement**                      |
| **description**     |                                   string                                   | :white_check_mark: | Description of the **advertisement**                   |
| **redirectUrl**     |                                   string                                   | :white_check_mark: | The redirect **url**                                   |
| **displayZones**    |              [DisplayZoneEnum](../shop-types#displayzoneenum)              |        :x:         | Zones to display the **advertisement**                 |
| **backgroundImage** |          [MediaObjectOutputDto](media-types#MediaObjectOutputDto)          |        :x:         | The background image to **display**                    |
| **translations**    | [AdvertisementTranslationDto[]](../shop-types#AdvertisementTranslationDto) |        :x:         | The translations available for this **advertisement**. |
| **metadatas**       |                                   mixed                                    |        :x:         | TODO                                                   |

</details>

This call returns the updated [AdvertisementDto](../shop-types#AdvertisementDto) object.

## Delete an advertisement

Delete the advertisement identified by its advertisementId.

<span class="badge badge--warning">Require authentication</span>

```php
$success = $client->$shop->deleteAdvertisement(string $advertisementId);
```

This call returns the updated [AdvertisementDto](../shop-types#AdvertisementDto) object.

## Get an advertisement

Retrieve an advertisement identified by its advertisementId.

<span class="badge badge--warning">Require authentication</span>

```php
$advertisement = $client->$shop->getAdvertisement(string $advertisementId);
```

This call returns the identified [AdvertisementDto](../shop-types#AdvertisementsOutpuDto) object.

## Get advertisements with filter

Updates an advertisement identified by its advertisementId.

<span class="badge badge--warning">Require authentication</span>

```php
$advertisements = $client->$shop->getAdvertisements(FindAdvertisementInputDto $filters);
```

See [FindAdvertisementInputDto](../shop-types#FindAdvertisementInputDto)

This call returns a [FindAdvertisementsOutputDto](../shop-types#FindAdvertisementsOutputDto) object.
