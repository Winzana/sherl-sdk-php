---
id: common-types
title: Common Types
---

In all the interfaces you will find, it's possible that some properties inherit from interfaces from other domains.

To access these properties, you need to have activated the domains on which the interfaces are based.

<details>
 <summary>ConfigDto</summary>

| Field         |   Type    | Description                                      |
| :------------ | :-------: | ------------------------------------------------ |
| **id**        | `string`  | L'identifiant de la configuration.               |
| **code**      | `string`  | Le code de la configuration.                     |
| **value**     | `string`  | La valeur de la configuration.                   |
| **consumer**  | `string`  | Le consommateur de la configuration.             |
| **position**  |  `float`  | La position de la configuration.                 |
| **appliedTo** | `string`  | La cible d'application de la configuration.      |
| **isPublic**  | `boolean` | Indique si la configuration est publique ou non. |

</details>

<details>
 <summary>Pagination</summary>

| Field       |  Type   | Description                                                |
| :---------- | :-----: | ---------------------------------------------------------- |
| **results** | `array` | Les résultats paginés (par défaut, un tableau vide).       |
| **view**    |         | La vue de pagination (le type dépend de l'implémentation). |

</details>

<details>
 <summary>LocationDto</summary>

| Champs            |   Type   | Description                           |
| :---------------- | :------: | ------------------------------------- |
| **id**            | `string` | L'identifiant de l'emplacement.       |
| **country**       | `string` | Le pays de l'emplacement.             |
| **locality**      | `string` | La localité de l'emplacement.         |
| **region**        | `string` | La région de l'emplacement.           |
| **postalCode**    | `string` | Le code postal de l'emplacement.      |
| **streetAddress** | `string` | L'adresse de la rue de l'emplacement. |
| **latitude**      | `float`  | La latitude de l'emplacement.         |
| **longitude**     | `float`  | La longitude de l'emplacement.        |

</details>
