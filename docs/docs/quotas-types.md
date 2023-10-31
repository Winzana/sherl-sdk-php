---
id: quotas-types
title: Quota types
---

## QuotaOutputDto

| Fields            | Type                    | Description                           |
| ----------------- | ----------------------- | ------------------------------------- |
| **id**            | string                  | Unique identifier for the quota       |
| **uri**           | string                  | Uri for the quota                     |
| **consumerId**    | string                  | Consumer ID associated with the quota |
| **type**          | CommunicationTypeEnum   | Type of communication                 |
| **amount**        | number                  | Amount of quota                       |
| **allowNegative** | boolean                 | Allows negative quota values or not   |
| **ownerUri**      | string                  | Owner Uri for the quota               |
| **sources**       | array of QuotaSourceDto | Sources associated with the quota     |
| **createdAt**     | datetime                | Date and time of quota creation       |
| **updatedAt**     | datetime                | Date and time of last update          |

## QuotasSourceOutputDto

| Fields          | Type     | Description                             |
| --------------- | -------- | --------------------------------------- |
| **id**          | string   | Unique identifier for the quota source  |
| **uri**         | string   | Uri for the quota source                |
| **lastApply**   | datetime | Date and time of the last apply         |
| **nextApply**   | datetime | Date and time of the next apply         |
| **amount**      | number   | Amount for the quota source             |
| **remaining**   | number   | Remaining amount for the quota source   |
| **createdFrom** | string   | Source from where the quota was created |
| **createdBy**   | string   | User who created the quota source       |
| **createdAt**   | datetime | Date and time of quota source creation  |
| **quotaId**     | string   | ID of the associated quota              |
