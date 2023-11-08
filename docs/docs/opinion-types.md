---
id: opinion-types
title: Opinion types
---

# Opinion Types

## OpinionDto

| Fields             |  Type   | Description                                                     |
| :----------------- | :-----: | :-------------------------------------------------------------- |
| **id**             | string  | Unique identifier for the opinion                               |
| **opinionToUri**   | string  | URI to which the opinion is directed                            |
| **comment**        | string  | Content of the opinion                                          |
| **score**          | number  | Numerical rating associated with the opinion                    |
| **opinionFromUri** | string  | URI from which the opinion originates                           |
| **createdAt**      | string  | Timestamp of when the opinion was created                       |
| **uri**            | string  | Unique resource identifier for the opinion                      |
| **status**         | string  | Current status of the opinion                                   |
| **opinionFrom**    |    T    | Generic type representing the entity giving the opinion         |
| **refusedComment** | string  | Comment explaining why the opinion was refused (optional)       |
| **opinionTo**      |    K    | Generic type representing the entity receiving the opinion      |
| **isClaimed**      | boolean | Flag indicating whether the opinion has been claimed (optional) |
| **claimComment**   | string  | Comment on the claim, if any (optional)                         |
| **updatedAt**      | string  | Timestamp of the last update to the opinion (optional)          |

In this interface, we have 2 dynamics parameters **T** and **K**.

- T represent the entity which create opinion to K
- K represent the entity which receive opinion from T

## AverageDto

| Fields      |  Type  | Description                                              |
| :---------- | :----: | :------------------------------------------------------- |
| **average** | number | Average score (sum of each score divided by count)       |
| **count**   | number | Number of voters or opinions contributing to the average |
