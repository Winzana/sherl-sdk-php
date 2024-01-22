---
id: iam-types
title: IAM types
---

## StatementDto

| Fields         |   Type   | Description                         |
| :------------- | :------: | :---------------------------------- |
| **action**     | string[] | List of actions for the statement   |
| **effect**     |  string  | Effect of the statement             |
| **ressources** |  string  | Resources affected by the statement |

## IamProfilesFilterDto

| Fields           |  Type   | Description                          |
| :--------------- | :-----: | :----------------------------------- |
| **page**         | integer | Page number to retrieve              |
| **itemsPerPage** | integer | Number of items to retrieve per page |

## ProfileDto

|     Fields     |             Type             |               Description               |
| :------------: | :--------------------------: | :-------------------------------------: |
|     **id**     |            string            |    Unique identifier for the profile    |
|    **uri**     |            string            |           Uri for the profile           |
|    **name**    |            string            |           Name of the profile           |
| **consumerId** |            string            | Consumer ID associated with the profile |
|   **roles**    | [RoleDto](iam-types#RoleDto) |        Array of associated roles        |
| **createdAt**  |           DateTime           |    Date and time of profile creation    |
| **updatedAt**  |           DateTime           |      Date and time of last update       |
