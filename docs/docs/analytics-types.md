---
id: analytics-types
title: Analytics Types
---

## AnalyticsOutputDto

| Fields       |    Type    | Description                           |
| :----------- | :--------: | ------------------------------------- |
| **id**       |  `string`  | L'identifiant de l'analytique.        |
| **key**      |  `string`  | La clé de l'analytique.               |
| **value**    |  `float`   | La valeur de l'analytique.            |
| **number**   |  `float`   | Le nombre associé à l'analytique.     |
| **metadata** | `string[]` | Les métadonnées liées à l'analytique. |

## SessionOutputDto

| Fields            |          Type           | Description                                  |
| :---------------- | :---------------------: | -------------------------------------------- |
| **id**            |        `string`         | L'identifiant de la session.                 |
| **uri**           |        `string`         | L'URI de la session.                         |
| **ipAddress**     |        `string`         | L'adresse IP associée à la session.          |
| **createdAt**     |        `string`         | La date de création de la session.           |
| **updatedAt**     |        `string`         | La date de mise à jour de la session.        |
| **keywords**      |         `array`         | Les mots-clés associés à la session.         |
| **device**        |      `DevicesEnum`      | Le type de dispositif utilisé (enum).        |
| **source**        |      `SourcesEnum`      | La source de la session (enum).              |
| **location**      |       `IGeoPoint`       | Les coordonnées géographiques de la session. |
| **searchHistory** | `ISessionSearchHistory` | L'historique de recherche de la session.     |
| **uriOfPanels**   |         `array`         | Les URI des panneaux associés à la session.  |
| **metadatas**     |         `mixed`         | Les métadonnées associées à la session.      |

## TraceOutputDto

| Champs           |                               Type                                | Description                                |
| :--------------- | :---------------------------------------------------------------: | ------------------------------------------ |
| **id**           |                             `string`                              | L'identifiant de la trace.                 |
| **consumerId**   |                             `string`                              | L'identifiant du consommateur.             |
| **action**       |                            `TraceEnum`                            | L'action liée à la trace                   |
| **user**         |                              `User`                               | L'utilisateur associé à la trace.          |
| **session**      |                             `Session`                             | La session associée à la trace.            |
| **sessionId**    |                             `string`                              | L'identifiant de la session.               |
| **value**        |                              `mixed`                              | La valeur associée à la trace.             |
| **organization** | [OrganizationOutputDto](organization-types#organizationoutputdto) | L'organisation associée à la trace.        |
| **year**         |                               `int`                               | L'année de la trace.                       |
| **month**        |                               `int`                               | Le mois de la trace.                       |
| **day**          |                               `int`                               | Le jour de la trace.                       |
| **objectUri**    |                             `string`                              | L'URI de l'objet associé à la trace.       |
| **latitude**     |                              `float`                              | La latitude géographique de la trace.      |
| **longitude**    |                              `float`                              | La longitude géographique de la trace.     |
| **geopoint**     |                             `string`                              | Les coordonnées géographiques de la trace. |
| **createdAt**    |                             `string`                              | La date de création de la trace.           |
