---
id: gallery-types
title: Gallery types
---

## GalleryOutputDto

| Fields          |          Type          | Description                                                              |
| :-------------- | :--------------------: | ------------------------------------------------------------------------ |
| **id**          |        `string`        | The identifier of the gallery.                                           |
| **uri**         |        `string`        | The URI of the gallery.                                                  |
| **consumerId**  |        `string`        | The identifier of the consumer.                                          |
| **categoryUri** |        `string`        | The URI of the category associated with the gallery.                     |
| **category**    |   `CategoryResponse`   | The category associated with the gallery (TODO: import to be corrected). |
| **media**       | `ImageObjectOutputDto` | The image object associated with the gallery.                            |
| **createdAt**   |        `string`        | The date of gallery creation.                                            |
| **updatedAt**   |        `string`        | The date of gallery update.                                              |

## DynamicBackgroundOutputDto

| Fields               |           Type           | Description                                                                                   |
| :------------------- | :----------------------: | --------------------------------------------------------------------------------------------- |
| **id**               |         `string`         | The identifier of the dynamic background.                                                     |
| **uri**              |         `string`         | The URI of the dynamic background.                                                            |
| **medias**           | `ImageObjectOutputDto[]` | The image objects associated with the dynamic background.                                     |
| **metadatas**        |  `array<string, mixed>`  | The metadata of the dynamic background.                                                       |
| **createdAt**        |         `string`         | The date of dynamic background creation.                                                      |
| **versionCreatedAt** |         `string`         | The date of creation of the dynamic background version.                                       |
| **updatedAt**        |         `string`         | The date of dynamic background update.                                                        |
| **deleted**          |        `boolean`         | Indicates whether the dynamic background is deleted.                                          |
| **displayZones**     |    `DisplayZonesEnum`    | The display zones (import to be adjusted).                                                    |
| **locations**        |    `PoiZoneInputDto`     | The "Point Of Interest" zones associated with the dynamic background (import to be adjusted). |
| **geoShapes**        |    `GeoShapeInputDto`    | The geographical shapes associated with the dynamic background (import to be adjusted).       |
| **version**          |        `integer`         | The version of the dynamic background.                                                        |
| **parentUri**        |         `string`         | The URI of the parent of the dynamic background.                                              |
| **updatedBy**        |         `string`         | The identifier of the user who performed the update.                                          |
| **createdBy**        |         `string`         | The identifier of the user who created the dynamic background.                                |
| **versionCreatedBy** |         `string`         | The identifier of the user who created the version of the dynamic background.                 |
