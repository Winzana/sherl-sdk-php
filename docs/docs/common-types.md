---
id: common-types
title: Common Types
---

In all the interfaces you will find, it's possible that some properties inherit from interfaces from other domains.

To access these properties, you need to have activated the domains on which the interfaces are based.

<details>
 <summary>ConfigDto</summary>

| Field         |   Type    | Description                         |
| :------------ | :-------: | ----------------------------------- |
| **id**        | `string`  | The configuration ID                |
| **code**      | `string`  | The configuration code              |
| **value**     | `string`  | The configuration value             |
| **consumer**  | `string`  | The configuration consumer          |
| **position**  |  `float`  | The configuration position          |
| **appliedTo** | `string`  | The target configuration applied to |
| **isPublic**  | `boolean` | The configuration public status     |

</details>

<details>
 <summary>LocationDto</summary>

| Champs            |   Type   | Description                  |
| :---------------- | :------: | ---------------------------- |
| **id**            | `string` | The location ID              |
| **country**       | `string` | The location country         |
| **locality**      | `string` | The location locality        |
| **region**        | `string` | The location region          |
| **postalCode**    | `string` | The location postal code     |
| **streetAddress** | `string` | The location address         |
| **latitude**      | `float`  | The location latitude point  |
| **longitude**     | `float`  | The location longitude point |

</details>

<details>
 <summary>SortDto</summary>

| Champs    |   Type   | Description         |
| :-------- | :------: | ------------------- |
| **field** | `string` | The field to filter |
| **order** | `string` | The order to filter |

</details>
