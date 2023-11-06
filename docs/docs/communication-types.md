---
id: communication-types
title: Communication types
---

## CommunicationOutputDto

| Champs          |            Type            | Description                              |
| :-------------- | :------------------------: | ---------------------------------------- |
| **id**          |          `string`          | L'identifiant de la communication.       |
| **uri**         |          `string`          | L'URI de la communication.               |
| **consumerId**  |          `string`          | L'identifiant du consommateur.           |
| **title**       |          `string`          | Le titre de la communication.            |
| **content**     |          `string`          | Le contenu de la communication.          |
| **senderUri**   |          `string`          | L'URI de l'expéditeur.                   |
| **receiverUri** |          `string`          | L'URI du destinataire                    |
| **channel**     | `CommunicationChannelEnum` | Le canal de communication                |
| **type**        |  `CommunicationTypeEnum`   | Le type de communication                 |
| **code**        |          `string`          | Le code de la communication              |
| **createdAt**   |          `string`          | La date de création de la communication. |
