---
id: person-types
title: Person Types
---

In all the interfaces you will find, it's possible that some properties inherit from interfaces from other domains.

To access these properties, you need to have activated the domains on which the interfaces are based.

<details>
 <summary>PersonInputDto</summary>

| Fields                       |                                   Type                                    | Description                                 |
| :--------------------------- | :-----------------------------------------------------------------------: | :------------------------------------------ |
| **id**                       |                                 `string`                                  | The id of the person                        |
| **uri**                      |                                 `string`                                  | The uri of the person                       |
| **consumerId**               |                                 `string`                                  | The consumerId of the person                |
| **firstName**                |                                 `string`                                  | The firstName of the person                 |
| **lastName**                 |                                 `string`                                  | The lastName of the person                  |
| **address**                  |                    [AddressInputDto](#addressinputdto)                    | The address of the person                   |
| **myAddresses**              |                  [AddressInputDto](#addressinputdto)`[]`                  | The registered addresses of the person      |
| **subscriptionLocation**     |                  [GeoCoordinatesDto](#geocoordinatesdto)                  | The subscription location of the person     |
| **phoneNumber**              |                                 `string`                                  | The phone number of the person              |
| **mobilePhoneNumber**        |                                 `string`                                  | The mobile phone number of the person       |
| **faxNumber**                |                                 `string`                                  | The fax number of the person                |
| **nationality**              |                                 `string`                                  | The nationality of the person               |
| **affiliation**              |   [PersonOrganizationCreateInputDto](#personorganizationcreateinputdto)   | The affiliation of the person               |
| **birthDate**                |                                `DateTime`                                 | The birth date of the person                |
| **email**                    |                                 `string`                                  | The email of the person                     |
| **gender**                   |                             [Gender](#gender)                             | The gender of the person                    |
| **latitude**                 |                                  `float`                                  | The latitude of the person                  |
| **longitude**                |                                  `float`                                  | The longitude of the person                 |
| **jobTitle**                 |                                 `string`                                  | The job title of the person                 |
| **enabled**                  |                                 `boolean`                                 | The status of the person ( true of false)   |
| **legalNotice**              |          [AcceptLegalNoticeInputDto](#acceptlegalnoticeinputdto)          | The legal notice status of the person       |
| **privacyNotive**            |        [AcceptPrivacyNoticeInputDto](#acceptprivacynoticeinputdto)        | The privacy notice status of the person     |
| **createdAt**                |                                 `string`                                  | The creation date of the person             |
| **updatedAt**                |                                 `string`                                  | The update of the person                    |
| **picture**                  |                     [ImageObjectDto](#imageobjectdto)                     | The picture of the person                   |
| **settings**                 |                  [SettingsOutputDto](#settingsoutputdto)                  | The settings of the person                  |
| **organizationFavorites**    |                                `string[]`                                 | The favorites organizations of the person   |
| **mangopayUserId**           |                                 `string`                                  | The MangoPay id of the person               |
| **mangopayWalletId**         |                                 `string`                                  | The MangoPay wallet id of the person        |
| **mangopayCards**            |            [MangopayCardOutputDto](#mangopaycardoutputdto)`[]`            | The MangoPay cards of the person            |
| **stripe**                   |                    [StripeOutputDto](#stripeoutputdto)                    | The stripe account of the person            |
| **lemonway**                 |                  [LemonwayOutputDto](#lemonwayoutputdto)                  | The lemonway account of the person          |
| **type**                     |                         [PersonType](#persontype)                         | The type of the person                      |
| **frequentedEstablishments** | [FrequentedEstablishmentOutputDto](#frequentedestablishmentoutputdto)`[]` | The frequented establishments by the person |
| **metadatas**                |                                 `string`                                  | The metadatas of the person                 |
| **statistics**               |                 [StatisticOutputDto](#statisticoutputdto)                 | The statistics of the person                |

</details>

<details>
 <summary>PersonUpdateInputDto</summary>

| Fields                |                                 Type                                  | Description                           |
| :-------------------- | :-------------------------------------------------------------------: | :------------------------------------ |
| **firstName**         |                               `string`                                | The first name of the person          |
| **lastName**          |                               `string`                                | The last name of the person           |
| **address**           |                  [AddressInputDto](#addressinputdto)                  | The address of the person             |
| **type**              |                       [PersonType](#persontype)                       | The type of the person                |
| **phoneNumber**       |                               `string`                                | The phone number of the person        |
| **mobilePhoneNumber** |                               `string`                                | The mobile phone number of the person |
| **faxNumber**         |                               `string`                                | The fax phone number of the person    |
| **nationality**       |                               `string`                                | The nationality of the person         |
| **affiliation**       | [PersonOrganizationCreateInputDto](#personorganizationcreateinputdto) | The mobile phone number of the person |
| **latitude**          |                                `float`                                | The latitude of the person            |
| **longitude**         |                                `float`                                | The latitude of the person            |
| **birthDate**         |                               `string`                                | The birth date of the person          |
| **email**             |                               `string`                                | The email of the person               |
| **gender**            |                           [Gender](#gender)                           | The gender of the person              |
| **jobTitle**          |                               `string`                                | The job title of the person           |
| **metadatas**         |                               `string`                                | The metadatas of the person           |
| **userProfileUri**    |                               `string`                                | The user profile uri of the person    |

</details>

<details>
 <summary>AcceptLegalNoticeInputDto</summary>

| Fields      |   Type   | Description                               |
| :---------- | :------: | :---------------------------------------- |
| **version** | `string` | The version of the legal notice to accept |

</details>

<details>
 <summary>LegalNoticeAcceptanceOutputDto</summary>

| Fields               |   Type   | Description                              |
| :------------------- | :------: | :--------------------------------------- |
| **version**          | `string` | The version of the accepted legal notice |
| **dateOfAcceptance** | `string` | The date of acceptance legal notice      |

</details>

<details>
 <summary>AcceptPrivacyNoticeInputDto</summary>

| Fields      |   Type   | Description                                 |
| :---------- | :------: | :------------------------------------------ |
| **version** | `string` | The version of the privacy notice to accept |

</details>

<details>
 <summary>AddressInputDto</summary>

| Fields                         |   Type   | Description                             |
| :----------------------------- | :------: | :-------------------------------------- |
| **id**                         | `string` | The id of the address                   |
| **country**                    | `string` | The country of the address              |
| **locality**                   | `string` | The locality of the address             |
| **region**                     | `string` | The region of the address               |
| **postalCode**                 | `string` | The postal code of the address          |
| **streetAddress**              | `string` | The street of the address               |
| **uri**                        | `string` | The uri of the address                  |
| **createdAt**                  | `string` | The creation date of the address        |
| **department**                 | `string` | The department of the address           |
| **complementaryStreetAddress** | `string` | The complementary street of the address |
| **name**                       | `string` | The name of the address                 |
| **originId**                   | `string` | The origin id of the address            |
| **latitude**                   | `float`  | The latitude of the address             |
| **longitude**                  | `float`  | The id of the address                   |

</details>

<details>
 <summary>ExperienceFormResponseInputDto</summary>

| Fields             |               Type                | Description                                              |
| :----------------- | :-------------------------------: | :------------------------------------------------------- |
| **startDate**      |             `string`              | The start date of the experience form response           |
| **endDate**        |             `string`              | The end date of the experience form response             |
| **travelingGroup** | [TravelingGroup](#travelinggroup) | The traveling group type of the experience form response |
| **activities**     |            `string[]`             | The activities linked on the experience form response    |

</details>

<details>
 <summary>FrequentedEstablishmentOutputDto</summary>

| Fields               |   Type   | Description                                           |
| :------------------- | :------: | :---------------------------------------------------- |
| **organizationId**   | `string` | The organization id of the frequented establishment   |
| **organizationName** | `string` | The organization name of the frequented establishment |
| **firstVisit**       | `string` | The first visit date of the frequented establishment  |
| **lastVisit**        | `string` | The last visit date of the frequented establishment   |
| **isCustomer**       | `string` | The customer status of the frequented establishment   |

</details>

<details>
 <summary>LemonwayCardOutputDto</summary>

| Fields                  |   Type    | Description                                   |
| :---------------------- | :-------: | :-------------------------------------------- |
| **id**                  | `string`  | The id of the Lemonway card                   |
| **transactionId**       | `string`  | The transaction id of the Lemonway card       |
| **is3DS**               | `boolean` | The 3DS status of the Lemonway card           |
| **country**             | `string`  | The registered country of the Lemonway card   |
| **authorizationNumber** | `string`  | The authorization number of the Lemonway card |
| **maskedNumber**        | `string`  | The masked number of the Lemonway card        |
| **type**                | `string`  | The type of the Lemonway card                 |
| **default**             | `boolean` | The default status of the Lemonway card       |

</details>

<details>
 <summary>LemonwayOutputDto</summary>

| Fields         |                        Type                         | Description                                  |
| :------------- | :-------------------------------------------------: | :------------------------------------------- |
| **customerId** |                      `string`                       | The customer id of the Lemonway account      |
| **cards**      | [LemonwayCardOutputDto](#lemonwaycardoutputdto)`[]` | The associated cards of the Lemonway account |

</details>

<details>
 <summary>MangopayCardOutputDto</summary>

| Fields             |   Type    | Description                                 |
| :----------------- | :-------: | :------------------------------------------ |
| **ExpirationDate** | `string`  | The expiration date of the Mangopay card    |
| **Alias**          | `string`  | The Alias of the Mangopay card              |
| **CardType**       | `string`  | The type of the Mangopay card               |
| **CardProvider**   | `string`  | The provider of the Mangopay card           |
| **Country**        | `string`  | The registered country of the Mangopay card |
| **Product**        | `string`  | The product of the Mangopay card            |
| **BankCode**       | `string`  | The bank code of the Mangopay card          |
| **Active**         | `boolean` | The active status of the Mangopay card      |
| **Currency**       | `string`  | The currency of the Mangopay card           |
| **Validity**       | `string`  | The validity of the Mangopay card           |
| **Id**             | `string`  | The id of the Mangopay card                 |
| **Tag**            | `string`  | The tag of the Mangopay card                |
| **CreationDate**   | `string`  | The creation date of the Mangopay card      |
| **FingerPrint**    | `string`  | The finger print of the Mangopay card       |
| **default**        | `boolean` | The default status of the Mangopay card     |

</details>

<details>
 <summary>PersonAddAddressInputDto</summary>

| Fields                         |            Type             | Description                                    |
| :----------------------------- | :-------------------------: | :--------------------------------------------- |
| **id**                         |          `string`           | The id of the address to add                   |
| **uri**                        |          `string`           | The uri of the address to add                  |
| **country**                    |          `string`           | The country of the address to add              |
| **locality**                   |          `string`           | The locality of the address to add             |
| **region**                     |          `string`           | The region of the address to add               |
| **department**                 |          `string`           | The department of the address to add           |
| **types**                      |         `string[]`          | The types of the address to add                |
| **postalCode**                 |          `string`           | The postal code of the address to add          |
| **streetAddress**              |          `string`           | The street of the address to add               |
| **complementaryStreetAddress** |          `string`           | The complementary street of the address to add |
| **name**                       |          `string`           | The name of the address to add                 |
| **originId**                   |          `string`           | The origin id of the address to add            |
| **latitude**                   |           `float`           | The latitude of the address to add             |
| **longitude**                  |           `float`           | The longitude of the address to add            |
| **consumerId**                 |          `string`           | The consumer id of the address to add          |
| **createdAt**                  |          `string`           | The creation date of the address to add        |
| **updatedAt**                  |          `string`           | The update date of the address to add          |
| **type**                       | [AccountType](#accounttype) | The type of the address to add                 |
| **isDefault**                  |          `boolean`          | The default status of the address to add       |

</details>

<details>
 <summary>PersonConfigInputDto</summary>

| Fields      |    Type    | Description               |
| :---------- | :--------: | :------------------------ |
| **configs** | `string[]` | The configs of the person |

</details>

<details>
 <summary>PersonCreateInputDto</summary>

| Fields                |                                 Type                                  | Description                                     |
| :-------------------- | :-------------------------------------------------------------------: | :---------------------------------------------- |
| **id**                |                               `string`                                | The id of the person to create                  |
| **firstName**         |                               `string`                                | The first name of the person to create          |
| **lastName**          |                               `string`                                | The id of the person to create                  |
| **address**           |                  [AddressInputDto](#addressinputdto)                  | The address of the person to create             |
| **phoneNumber**       |                               `string`                                | The phone number of the person to create        |
| **mobilePhoneNumber** |                               `string`                                | The mobile phone number of the person to create |
| **faxNumber**         |                               `string`                                | The fax number of the person to create          |
| **nationality**       |                               `string`                                | The nationality of the person to create         |
| **affiliation**       | [PersonOrganizationCreateInputDto](#personorganizationcreateinputdto) | The affiliation of the person to create         |
| **birthDate**         |                               `string`                                | The birth date of the person to create          |
| **email**             |                               `string`                                | The email of the person to create               |
| **gender**            |                           [Gender](#gender)                           | The gender of the person to create              |
| **jobTitle**          |                               `string`                                | The job title of the person to create           |

</details>

<details>
 <summary>PersonCreateSuperAdministratorInputDto</summary>

| Fields        |   Type   | Description                                         |
| :------------ | :------: | :-------------------------------------------------- |
| **id**        | `string` | The id of the super administrator to create         |
| **firstName** | `string` | The first name of the super administrator to create |
| **lastName**  | `string` | The last name of the super administrator to create  |
| **email**     | `string` | The email of the super administrator to create      |

</details>

<details>
 <summary>PersonFiltersDto</summary>

| Fields                        |                    Type                     | Description                                        |
| :---------------------------- | :-----------------------------------------: | :------------------------------------------------- |
| **id**                        |                  `string`                   | The person id to filter                            |
| **userId**                    |                  `string`                   | The person user id to filter                       |
| **q**                         |                  `string`                   | The person query to filter                         |
| **firstName**                 |                  `string`                   | The person first name to filter                    |
| **lastName**                  |                  `string`                   | The person last name to filter                     |
| **phoneNumber**               |                  `string`                   | The person phone number to filter                  |
| **mobilePhoneNumber**         |                  `string`                   | The person mobile phone number to filter           |
| **faxNumber**                 |                  `string`                   | The person fax number to filter                    |
| **nationality**               |                  `string`                   | The person nationality to filter                   |
| **uri**                       |                  `string`                   | The person uri to filter                           |
| **legalName**                 |                  `string`                   | The person legal name to filter                    |
| **location**                  |                   `mixed`                   | The person location to filter                      |
| **subOrganizations**          |                   `mixed`                   | The person sub organizations to filter             |
| **birthDate**                 |                  `string`                   | The person birth date to filter                    |
| **email**                     |                  `string`                   | The person email to filter                         |
| **gender**                    |              [Gender](#gender)              | The person gender to filter                        |
| **jobTitle**                  |                  `string`                   | The person job title to filter                     |
| **enabled**                   |                  `boolean`                  | The person account status to filter                |
| **createdAt**                 |                  `string`                   | The person creation date to filter                 |
| **updatedAt**                 |                  `string`                   | The person update date to filter                   |
| **analytics**                 |                  `string`                   | The person analytics to filter                     |
| **noFrequentedEstablishment** |                  `string`                   | The person not frequenting establishment to filter |
| **type**                      |          [PersonType](#persontype)          | The person type to filter                          |
| **sort**                      | `Sort<`[PersonInputDto](#personinputdto)`>` | The person sorting status                          |

</details>

<details>
 <summary>PersonOrganizationCreateInputDto</summary>

| Fields               |                Type                 | Description                                                |
| :------------------- | :---------------------------------: | :--------------------------------------------------------- |
| **id**               |              `string`               | The id of the person organization to create                |
| **uri**              |              `string`               | The uri of the person organization to create               |
| **legalName**        |              `string`               | The legal name of the person organization to create        |
| **location**         | [AddressInputDto](#addressinputdto) | The address of the person organization to create           |
| **subOrganizations** |             `string[]`              | The sub organizations of the person organization to create |

</details>

<details>
 <summary>PersonOutputDto</summary>

| Fields                       |                                   Type                                    | Description                                          |
| :--------------------------- | :-----------------------------------------------------------------------: | :--------------------------------------------------- |
| **id**                       |                                 `string`                                  | The id of the outputed person                        |
| **uri**                      |                                 `string`                                  | The uri of the outputed person                       |
| **consumerId**               |                                 `string`                                  | The consumer id of the outputed person               |
| **userId**                   |                                 `string`                                  | The user id of the outputed person                   |
| **firstName**                |                                 `string`                                  | The first name of the outputed person                |
| **lastName**                 |                                 `string`                                  | The last name of the outputed person                 |
| **address**                  |                     [PlaceOutputDto](#placeoutputdto)                     | The address of the outputed person                   |
| **myAddresses**              |                   [PlaceOutputDto](#placeoutputdto)`[]`                   | The addresses of the outputed person                 |
| **subscriptionLocation**     |                   [AddressOutputDto](#addressoutputdto)                   | The subcription location of the outputed person      |
| **phoneNumber**              |                                 `string`                                  | The phone number of the outputed person              |
| **mobilePhoneNumber**        |                                 `string`                                  | The mobile phone number of the outputed person       |
| **faxNumber**                |                                 `string`                                  | The fax number of the outputed person                |
| **nationality**              |                                 `string`                                  | The nationality of the outputed person               |
| **birthDate**                |                                 `string`                                  | The birth date of the outputed person                |
| **email**                    |                                 `string`                                  | The email of the outputed person                     |
| **gender**                   |                             [Gender](#gender)                             | The gender of the outputed person                    |
| **latitude**                 |                                  `float`                                  | The latitude of the outputed person                  |
| **longitude**                |                                  `float`                                  | The longitude of the outputed person                 |
| **jobTitle**                 |                                 `string`                                  | The job title of the outputed person                 |
| **enabled**                  |                                 `boolean`                                 | The status of the outputed person                    |
| **legalNotice**              |     [LegalNoticeAcceptanceOutputDto](#legalnoticeacceptanceoutputdto)     | The legal notice of the outputed person              |
| **privacyNotice**            |     [LegalNoticeAcceptanceOutputDto](#legalnoticeacceptanceoutputdto)     | The privacy notice of the outputed person            |
| **createdAt**                |                                 `string`                                  | The creation date of the outputed person             |
| **updatedAt**                |                                 `string`                                  | The update date of the outputed person               |
| **settings**                 |                  [SettingsOutputDto](#settingsoutputdto)                  | The settings of the outputed person                  |
| **organizationFavorites**    |                                `string[]`                                 | The favorites organizations of the outputed person   |
| **mangopayUserId**           |                                 `string`                                  | The MangoPay id of the outputed person               |
| **mangopayWalletId**         |                                 `string`                                  | The MangoPay wallet id of the outputed person        |
| **mangopayCards**            |            [MangopayCardOutputDto](#mangopaycardoutputdto)`[]`            | The MangoPay cards of the outputed person            |
| **stripe**                   |                    [StripeOutputDto](#stripeoutputdto)                    | The stripe account of the outputed person            |
| **lemonway**                 |                  [LemonwayOutputDto](#lemonwayoutputdto)                  | The lemonway account of the outputed person          |
| **type**                     |                         [PersonType](#persontype)                         | The type of the outputed person                      |
| **frequentedEstablishments** | [FrequentedEstablishmentOutputDto](#frequentedestablishmentoutputdto)`[]` | The frequented establishments of the outputed person |
| **metadatas**                |                                 `string`                                  | The metadatas of the outputed person                 |
| **statistics**               |                 [StatisticOutputDto](#statisticoutputdto)                 | The statistics of the outputed person                |

</details>

<details>
 <summary>PersonPanelCreateInputDto</summary>

| Fields      |                           Type                            | Description                               |
| :---------- | :-------------------------------------------------------: | :---------------------------------------- |
| **id**      |                         `string`                          | The id of the person panel to create      |
| **name**    |                         `string`                          | The name of the person panel to create    |
| **filters** | [PersonPanelCreateFilterDto](#personpanelcreatefilterdto) | The filters of the person panel to create |

</details>

<details>
 <summary>PersonPanelCreateFilterDto</summary>

| Fields    |   Type   | Description                          |
| :-------- | :------: | :----------------------------------- |
| **name**  | `string` | The name of the person panel filter  |
| **value** | `string` | The value of the person panel filter |

</details>

<details>
 <summary>PersonPanelUpdateInputDto</summary>

| Fields      |                                  Type                                   | Description                               |
| :---------- | :---------------------------------------------------------------------: | :---------------------------------------- |
| **name**    |                                `string`                                 | The name of the person panel to update    |
| **filters** | [PersonPanelUpdateFilterInputDto](#personpanelupdatefilterinputdto)`[]` | The filters of the person panel to update |

</details>

<details>
 <summary>PersonPanelUpdateFilterInputDto</summary>

| Fields    |   Type   | Description                                  |
| :-------- | :------: | :------------------------------------------- |
| **name**  | `string` | The name of the person panel filter updated  |
| **value** | `string` | The value of the person panel filter updated |

</details>

<details>
 <summary>PersonRegisterWithEmailAndPasswordInputDto</summary>

| Fields              |                Type                 | Description                                                                 |
| :------------------ | :---------------------------------: | :-------------------------------------------------------------------------- |
| **id**              |              `string`               | The id of the person to register with email and password                    |
| **firstName**       |              `string`               | The first name of the person to register with email and password            |
| **lastName**        |              `string`               | The last name of the person to register with email and password             |
| **address**         | [AddressInputDto](#addressinputdto) | The address of the person to register with email and password               |
| **phoneNumber**     |              `string`               | The phone number of the person to register with email and password          |
| **birthDate**       |              `string`               | The birth date of the person to register with email and password            |
| **email**           |              `string`               | The email of the person to register with email and password                 |
| **password**        |              `string`               | The password of the person to register with email and password              |
| **confirmPassword** |              `string`               | The password confirmation of the person to register with email and password |

</details>

<details>
 <summary>PersonUpdateAddressInputDto</summary>

| Fields                         |            Type             | Description                                                      |
| :----------------------------- | :-------------------------: | :--------------------------------------------------------------- |
| **id**                         |          `string`           | The id of the person address to update                           |
| **uri**                        |          `string`           | The uri of the person address to update                          |
| **country**                    |          `string`           | The country of the person address to update                      |
| **locality**                   |          `string`           | The locality of the person address to update                     |
| **region**                     |          `string`           | The region of the person address to update                       |
| **department**                 |          `string`           | The department of the person address to update                   |
| **types**                      |         `string[]`          | The types of the person address to update                        |
| **postalCode**                 |          `string`           | The postal code of the person address to update                  |
| **streetAddress**              |          `string`           | The street address of the person address to update               |
| **complementaryStreetAddress** |          `string`           | The complementary street address of the person address to update |
| **name**                       |          `string`           | The address name of the person address to update                 |
| **originId**                   |          `string`           | The origin id of the person address to update                    |
| **latitude**                   |           `float`           | The latitude of the person address to update                     |
| **longitude**                  |           `float`           | The longitude of the person address to update                    |
| **consumerId**                 |          `string`           | The consumer id of the person address to update                  |
| **createdAt**                  |          `string`           | The creation date of the person address to update                |
| **updatedAt**                  |          `string`           | The update date of the person address to update                  |
| **type**                       | [AccountType](#accounttype) | The account type of the person address to update                 |
| **isDefault**                  |          `boolean`          | The default status of the person address to update               |
| **googleToken**                |          `string`           | The google token of the person address to update                 |

</details>

<details>
 <summary>PersonUpdateInputDto</summary>

| Fields                |                                 Type                                  | Description                                     |
| :-------------------- | :-------------------------------------------------------------------: | :---------------------------------------------- |
| **fistName**          |                               `string`                                | The first name of the person to update          |
| **lastName**          |                               `string`                                | The last name of the person to update           |
| **address**           |                  [AddressInputDto](#addressinputdto)                  | The address of the person to update             |
| **type**              |                       [PersonType](#persontype)                       | The type of the person to update                |
| **phoneNumber**       |                               `string`                                | The phone number of the person to update        |
| **mobilePhoneNumber** |                               `string`                                | The mobile phoen number of the person to update |
| **faxNumber**         |                               `string`                                | The fax number of the person to update          |
| **nationality**       |                               `string`                                | The nationality of the person to update         |
| **affiliation**       | [PersonOrganizationCreateInputDto](#personorganizationcreateinputdto) | The affiliation of the person to update         |
| **latitude**          |                                `float`                                | The latitude of the person to update            |
| **longitude**         |                                `float`                                | The longitude of the person to update           |
| **birthDate**         |                               `string`                                | The birth date of the person to update          |
| **email**             |                               `string`                                | The email of the person to update               |
| **gender**            |                           [Gender](#gender)                           | The gender of the person to update              |
| **jobTitle**          |                               `string`                                | The job title of the person to update           |
| **metadatas**         |                               `string`                                | The metadatas of the person to update           |
| **userProfileUri**    |                               `string`                                | The user profile uri of the person to update    |

</details>

<details>
 <summary>SessionCreationInputDto</summary>

| Fields                     |    Type    | Description                                            |
| :------------------------- | :--------: | :----------------------------------------------------- |
| **ipAddress**              |  `string`  | The ip address of the session to create                |
| **favoritesSites**         | `string[]` | The favorites sites of the session to create           |
| **exprienceFormResponses** |  `string`  | The experience form responses of the session to create |
| **mapFilters**             | `string[]` | The map filters of the session to create               |
| **disabilityConditions**   | `string[]` | The disability conditions of the session to create     |
| **favoriteTransportModes** | `string[]` | The favorite transport modes of the session to create  |
| **alertsDiscarded**        | `string[]` | The alerts discarded of the session to create          |
| **location**               | `string[]` | The location of the session to create                  |

</details>

<details>
 <summary>SessionUpdateInputDto</summary>

| Fields                     |    Type    | Description                                            |
| :------------------------- | :--------: | :----------------------------------------------------- |
| **favoritesSites**         | `string[]` | The favorites sites of the session to update           |
| **ipAddress**              |  `string`  | The ip address of the session to update                |
| **exprienceFormResponses** |  `string`  | The experience form responses of the session to update |
| **mapFilters**             | `string[]` | The map filters of the session to update               |
| **disabilityConditions**   | `string[]` | The disability conditions of the session to update     |
| **favoriteTransportModes** | `string[]` | The favorite transport modes of the session to update  |
| **alertsDiscarded**        | `string[]` | The alerts discarded of the session to update          |
| **location**               | `string[]` | The location of the session to update                  |
| **keywords**               | `string[]` | The keywords of the session to update                  |

</details>

<details>
 <summary>SettingsDetailOutputDto</summary>

| Fields          |   Type    | Description                                          |
| :-------------- | :-------: | :--------------------------------------------------- |
| **emailEnable** | `boolean` | The email notification status of the settings detail |
| **smsEnable**   | `boolean` | The sms notification status of the settings detail   |
| **pushEnable**  | `boolean` | The push notification status of the settings detail  |

</details>

<details>
 <summary>SettingsOutputDto</summary>

| Fields            |                        Type                         | Description                                |
| :---------------- | :-------------------------------------------------: | :----------------------------------------- |
| **notifications** | [SettingsDetailOutputDto](#settingsdetailoutputdto) | The notifications status from the settings |

</details>

<details>
 <summary>StatisticsOuputDto</summary>

| Fields                       |                                   Type                                    | Description                                          |
| :--------------------------- | :-----------------------------------------------------------------------: | :--------------------------------------------------- |
| **lastVisit**                |                                 `string`                                  | The last visit of the user statistics                |
| **firstVisit**               |                                 `string`                                  | The first visit of the user statistics               |
| **totalVisit**               |                                  `float`                                  | The total visit of the user statistics               |
| **amountLastOrder**          |                                  `float`                                  | The last order amount of the user statistics         |
| **amountTotalOrder**         |                                  `float`                                  | The total order amount of the user statistics        |
| **frequentedEstablishments** | [FrequentedEstablishmentOutputDto](#frequentedestablishmentoutputdto)`[]` | The frequented establishments of the user statistics |
| **loyalCustomer**            |                                 `boolean`                                 | The loyal customer status of the user statistics     |

</details>

<details>
 <summary>StripeCardOutputDto</summary>

| Fields                  |   Type    | Description                                |
| :---------------------- | :-------: | :----------------------------------------- |
| **id**                  | `string`  | The id of the stripe card                  |
| **object**              | `string`  | The object of the stripe card              |
| **address_city**        | `string`  | The address city of the stripe card        |
| **address_country**     | `string`  | The address country of the stripe card     |
| **address_line1**       | `string`  | The address line1 of the stripe card       |
| **address_line2**       | `string`  | The address line2 of the stripe card       |
| **address_state**       | `string`  | The address state of the stripe card       |
| **address_zip**         | `string`  | The address zip of the stripe card         |
| **address_zip_check**   | `string`  | The address zip check of the stripe card   |
| **brand**               | `string`  | The brand of the stripe card               |
| **country**             | `string`  | The country of the stripe card             |
| **customer**            | `string`  | The customer of the stripe card            |
| **cvc_check**           | `string`  | The cvc check of the stripe card           |
| **dynamic_last4**       | `string`  | The dynamic last4 of the stripe card       |
| **exp_month**           | `string`  | The exp month of the stripe card           |
| **exp_year**            | `string`  | The exp year of the stripe card            |
| **fingerprint**         | `string`  | The fingerprint of the stripe card         |
| **funding**             | `string`  | The funding of the stripe card             |
| **last4**               | `string`  | The last4 of the stripe card               |
| **metadata**            |  `array`  | The metadata of the stripe card            |
| **name**                | `string`  | The name of the stripe card                |
| **tokenization_method** | `string`  | The tokenization method of the stripe card |
| **default**             | `boolean` | The default status of the stripe card      |

</details>

<details>
 <summary>StripeOutputDto</summary>

| Fields         |                      Type                       | Description                     |
| :------------- | :---------------------------------------------: | :------------------------------ |
| **customerId** |                    `string`                     | The id of the stripe account    |
| **cards**      | [StripeCardOutputDto](#stripecardoutputdto)`[]` | The cards of the stripe account |

</details>

<details>
 <summary>Gender</summary>

| Value     |   Type   |
| :-------- | :------: |
| **MAN**   | `string` |
| **WOMAN** | `string` |
| **OTHER** | `string` |
| **NSP**   | `string` |

</details>

<details>
 <summary>PersonType</summary>

| Value        |   Type   |
| :----------- | :------: |
| **DEFAULT**  | `string` |
| **EMPLOYEE** | `string` |
| **FOUNDER**  | `string` |
| **ADMIN**    | `string` |

</details>
