---
id: quota-types
title: Quota types
---

## QuotaOutputDto

|      Fields       |                           Type                           |              Description              |
| :---------------: | :------------------------------------------------------: | :-----------------------------------: |
|      **id**       |                          string                          |    Unique identifier for the quota    |
|      **uri**      |                          string                          |           URI for the quota           |
|  **consumerId**   |                          string                          | Consumer ID associated with the quota |
|     **type**      |                  CommunicationTypeEnum                   |         Type of communication         |
|    **amount**     |                          number                          |            Amount of quota            |
| **allowNegative** |                         boolean                          |  Allows negative quota values or not  |
|   **ownerUri**    |                          string                          |        Owner URI for the quota        |
|    **sources**    | [QuotaSourceOutputDto](quota-types#QuotaSourceOutputDto) |   Sources associated with the quota   |
|   **createdAt**   |                         datetime                         |    Date and time of quota creation    |
|   **updatedAt**   |                         datetime                         |     Date and time of last update      |

## QuotaSourceOutputDto

|     Fields      |   Type   |               Description               |
| :-------------: | :------: | :-------------------------------------: |
|     **id**      |  string  | Unique identifier for the quota source  |
|     **uri**     |  string  |        URI for the quota source         |
|  **lastApply**  | datetime |     Date and time of the last apply     |
|  **nextApply**  | datetime |     Date and time of the next apply     |
|   **amount**    |  float   |       Amount for the quota source       |
|  **remaining**  |  float   |  Remaining amount for the quota source  |
| **createdFrom** |  string  | Source from where the quota was created |
|  **createdBy**  |  string  |    User who created the quota source    |
|  **createdAt**  | datetime | Date and time of quota source creation  |
|   **quotaId**   |  string  |       ID of the associated quota        |
