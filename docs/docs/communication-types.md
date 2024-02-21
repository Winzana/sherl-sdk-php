---
id: communication-types
title: Communication types
---

## CommunicationOutputDto

| Fields          |            Type            | Description                         |
| :-------------- | :------------------------: | ----------------------------------- |
| **id**          |          `string`          | The communication unique identifier |
| **uri**         |          `string`          | The communication URI               |
| **consumerId**  |          `string`          | The consumer unique identifier      |
| **title**       |          `string`          | The communication title             |
| **content**     |          `string`          | The communication content           |
| **senderUri**   |          `string`          | The sender URI                      |
| **receiverUri** |          `string`          | The receiver URI                    |
| **channel**     | `CommunicationChannelEnum` | The communication channel           |
| **type**        |  `CommunicationTypeEnum`   | The communication type              |
| **code**        |          `string`          | The communication code              |
| **createdAt**   |         `DateTime`         | The communication creation date     |

## CommunicationChannelEnum

| Values        |   Type   |
| :------------ | :------: |
| **EMAIL**     | `string` |
| **SMS**       | `string` |
| **PUSH**      | `string` |
| **WHATSAPP**  | `string` |
| **FACEBOOK**  | `string` |
| **TWITTER**   | `string` |
| **INSTAGRAM** | `string` |
| **TELEGRAM**  | `string` |

## CommunicationTypeEnum

| Fields            |   Type   |
| :---------------- | :------: |
| **MESSAGING**     | `string` |
| **TRANSACTIONAL** | `string` |
