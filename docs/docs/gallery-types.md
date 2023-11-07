---
id: gallery-types
title: Gallery types
---

## GalleryOutputDto

| Champs          |          Type          | Description                                                    |
| :-------------- | :--------------------: | -------------------------------------------------------------- |
| **id**          |        `string`        | L'identifiant de la galerie.                                   |
| **uri**         |        `string`        | L'URI de la galerie.                                           |
| **consumerId**  |        `string`        | L'identifiant du consommateur.                                 |
| **categoryUri** |        `string`        | L'URI de la catégorie associée à la galerie.                   |
| **category**    |   `CategoryResponse`   | La catégorie associée à la galerie (TODO : import à corriger). |
| **media**       | `ImageObjectOutputDto` | L'objet image associé à la galerie.                            |
| **createdAt**   |        `string`        | La date de création de la galerie.                             |
| **updatedAt**   |        `string`        | La date de mise à jour de la galerie.                          |

## DynamicBackgroundOutputDto

| Champs               |           Type           | Description                                                                            |
| :------------------- | :----------------------: | -------------------------------------------------------------------------------------- |
| **id**               |         `string`         |   L'identifiant de l'arrière-plan dynamique.                                           |
| **uri**              |         `string`         | L'URI de l'arrière-plan dynamique.                                                     |
| **medias**           | `ImageObjectOutputDto[]` | Les objets image associés à l'arrière-plan dynamique.                                  |
| **metadatas**        |        `string[]`        | Les métadonnées de l'arrière-plan dynamique.                                           |
| **createdAt**        |         `string`         | La date de création de l'arrière-plan dynamique.                                       |
| **versionCreatedAt** |         `string`         | La date de création de la version de l'arrière-plan dynamique.                         |
| **updatedAt**        |         `string`         | La date de mise à jour de l'arrière-plan dynamique.                                    |
| **deleted**          |        `boolean`         | Indique si l'arrière-plan dynamique est supprimé.                                      |
| **displayZones**     |    `DisplayZonesEnum`    | Les zones d'affichage (import à ajuster).                                              |
| **locations**        |    `PoiZoneInputDto`     | Les zones "Point Of Interest" associées à l'arrière-plan dynamique (import à ajuster). |
| **geoShapes**        |    `GeoShapeInputDto`    | Les formes géographiques associées à l'arrière-plan dynamique (import à ajuster).      |
| **version**          |        `integer`         | La version de l'arrière-plan dynamique.                                                |
| **parentUri**        |         `string`         | L'URI du parent de l'arrière-plan dynamique.                                           |
| **updatedBy**        |         `string`         | L'identifiant de l'utilisateur ayant effectué la mise à jour.                          |
| **createdBy**        |         `string`         | L'identifiant de l'utilisateur ayant créé l'arrière-plan dynamique.                    |
| **versionCreatedBy** |         `string`         | L'identifiant de l'utilisateur ayant créé la version de l'arrière-plan dynamique.      |
