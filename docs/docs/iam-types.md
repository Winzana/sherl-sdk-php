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
