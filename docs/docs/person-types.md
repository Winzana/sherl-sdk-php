---
id: person-types
title: Person Types
---

In all the interfaces you will find, it's possible that some properties inherit from interfaces from other domains.

To access these properties, you need to have activated the domains on which the interfaces are based.

<details>
 <summary>PersonDto</summary>

| Fields                       |                 Type                 | Description                                 |
| :--------------------------- | :----------------------------------: | :------------------------------------------ |
| **id**                       |               `string`               | The id of the person                        |
| **uri**                      |               `string`               | The uri of the person                       |
| **consumerId**               |               `string`               | The consumerId of the person                |
| **firstName**                |               `string`               | The firstName of the person                 |
| **lastName**                 |               `string`               | The lastName of the person                  |
| **address**                  |             `AddressDto`             | The address of the person                   |
| **myAddresses**              |            `AddressDto[]`            | The registered addresses of the person      |
| **subscriptionLocation**     |         `GeoCoordinatesDto`          | The subscription location of the person     |
| **phoneNumber**              |               `string`               | The phone number of the person              |
| **mobilePhoneNumber**        |               `string`               | The mobile phone number of the person       |
| **faxNumber**                |               `string`               | The fax number of the person                |
| **nationality**              |               `string`               | The nationality of the person               |
| **affiliation**              |    `PersonOrganizationCreateDto`     | The affiliation of the person               |
| **birthDate**                |               `string`               | The birth date of the person                |
| **email**                    |               `string`               | The email of the person                     |
| **gender**                   |               `Gender`               | The gender of the person                    |
| **latitude**                 |               `float`                | The latitude of the person                  |
| **longitude**                |               `float`                | The longitude of the person                 |
| **jobTitle**                 |               `string`               | The job title of the person                 |
| **enabled**                  |              `boolean`               | The status of the person ( true of false)   |
| **legalNotice**              |        `AcceptLegalNoticeDto`        | The legal notice status of the person       |
| **privacyNotive**            |       `AcceptPrivacyNoticeDto`       | The privacy notice status of the person     |
| **createdAt**                |               `string`               | The creation date of the person             |
| **updatedAt**                |               `string`               | The update of the person                    |
| **picture**                  |           `ImageObjectDto`           | The picture of the person                   |
| **settings**                 |         `SettingsOutputDto`          | The settings of the person                  |
| **organizationFavorites**    |              `string[]`              | The favorites organizations of the person   |
| **mangopayUserId**           |               `string`               | The MangoPay id of the person               |
| **mangopayWalletId**         |               `string`               | The MangoPay wallet id of the person        |
| **mangopayCards**            |      `MangopayCardOutputDto[]`       | The MangoPay cards of the person            |
| **stripe**                   |          `StripeOutputDto`           | The stripe account of the person            |
| **lemonway**                 |         `LemonwayOutputDto`          | The lemonway account of the person          |
| **type**                     |             `PersonType`             | The type of the person                      |
| **frequentedEstablishments** | `FrequentedEstablishmentOutputDto[]` | The frequented establishments by the person |
| **metadatas**                |               `string`               | The metadatas of the person                 |
| **statistics**               |         `StatisticOutputDto`         | The statistics of the person                |

</details>

<details>
 <summary>PersonUpdateDto</summary>

| Fields                |             Type              | Description                           |
| :-------------------- | :---------------------------: | :------------------------------------ |
| **firstName**         |           `string`            | The first name of the person          |
| **lastName**          |           `string`            | The last name of the person           |
| **address**           |         `AddressDto`          | The address of the person             |
| **type**              |         `PersonType`          | The type of the person                |
| **phoneNumber**       |           `string`            | The phone number of the person        |
| **mobilePhoneNumber** |           `string`            | The mobile phone number of the person |
| **faxNumber**         |           `string`            | The fax phone number of the person    |
| **nationality**       |           `string`            | The nationality of the person         |
| **affiliation**       | `PersonOrganizationCreateDto` | The mobile phone number of the person |
| **latitude**          |            `float`            | The latitude of the person            |
| **longitude**         |            `float`            | The latitude of the person            |
| **birthDate**         |           `string`            | The birth date of the person          |
| **email**             |           `string`            | The email of the person               |
| **gender**            |           `Gender`            | The gender of the person              |
| **jobTitle**          |           `string`            | The job title of the person           |
| **metadatas**         |           `string`            | The metadatas of the person           |
| **userProfileUri**    |           `string`            | The user profile uri of the person    |

</details>
