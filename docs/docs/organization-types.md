---
id: organization-types
title: Organization types
---

## OrganizationOutputDto

| Field                     | Type                                 | Description                                                          |
| :------------------------ | :----------------------------------- | -------------------------------------------------------------------- |
| id                        | string                               | Unique identifier of the organization.                               |
| uri                       | string                               | The URI of the organization.                                         |
| sponsorshipCode           | string                               | The sponsorship code of the organization.                            |
| sponsoredByCode           | string                               | The code of the organization that sponsors this organization.        |
| sponsoredByUri            | string                               | The URI of the organization that sponsors this organization.         |
| slug                      | string                               | The slug of the organization.                                        |
| consumerId                | string                               | The consumer ID associated with the organization.                    |
| legalName                 | string                               | The legal name of the organization.                                  |
| location                  | PlaceOutputDto                       | The location details of the organization.                            |
| myAddresses               | AddressOutputDto[]                   | List of addresses associated with the organization.                  |
| aggregateRating           | integer                              | Aggregate rating of the organization.                                |
| subOrganizations          | OrganizationOutputDto[]              | List of sub-organizations within this organization.                  |
| email                     | string                               | The email address of the organization.                               |
| employees                 | EmployeeOutputDto[]                  | List of employees associated with the organization.                  |
| wallet                    | WalletOutputDto                      | The wallet details associated with the organization.                 |
| isPaymentAllowed          | boolean                              | Indicates whether payment is allowed for the organization.           |
| enabled                   | boolean                              | Indicates whether the organization is enabled.                       |
| faxNumber                 | string                               | The fax number of the organization.                                  |
| phoneNumber               | string                               | The phone number of the organization.                                |
| website                   | string                               | The website URL of the organization.                                 |
| founders                  | FounderOutputDto[]                   | List of founders associated with the organization.                   |
| foundingDate              | string                               | The founding date of the organization.                               |
| knowsLanguage             | TaxonomyOutputDto[]                  | List of language taxonomies known by the organization.               |
| logo                      | ImageObjectOutputDto                 | The logo image of the organization.                                  |
| backgroundImage           | ImageObjectOutputDto                 | The background image of the organization.                            |
| numberOfEmployees         | integer                              | The number of employees in the organization.                         |
| parentOrganization        | OrganizationOutputDto                | The parent organization of this organization.                        |
| slogan                    | string                               | The slogan of the organization.                                      |
| siret                     | integer                              | The SIRET number of the organization.                                |
| smokingAllowed            | boolean                              | Indicates whether smoking is allowed in the organization.            |
| openNow                   | boolean                              | Indicates whether the organization is currently open.                |
| openingHoursSpecification | OpeningHoursSpecificationOutputDto[] | List of opening hours specifications for the organization.           |
| isAccessibleForFree       | boolean                              | Indicates whether the organization is accessible for free.           |
| isComingSoon              | boolean                              | Indicates whether the organization is coming soon.                   |
| photos                    | ImageObjectOutputDto[]               | List of photos associated with the organization.                     |
| serviceType               | TaxonomyOutputDto[]                  | List of service types associated with the organization.              |
| types                     | string[]                             | List of types associated with the organization.                      |
| advertisingText           | string                               | The advertising text associated with the organization.               |
| communication             | OrganizationCommunicationOutputDto   | The communication details associated with the organization.          |
| geopoint                  | string                               | The geopoint coordinates of the organization.                        |
| createdAt                 | string                               | The date and time when the organization was created.                 |
| updatedAt                 | string                               | The date and time when the organization was last updated.            |
| metadatas                 | array\<string, mixed>                | Additional metadata associated with the organization.                |
| categories                | CategoryOutputDto[]                  | List of categories associated with the organization.                 |
| products                  | ProductOutputDto[]                   | List of products associated with the organization.                   |
| events                    | CalendarEventOutputDto[]             | List of calendar events associated with the organization.            |
| isRoaming                 | boolean                              | Indicates whether roaming is allowed for the organization.           |
| is                        | boolean                              | Indicates if the organization is something.                          |
| calendarId                | string                               | The calendar ID associated with the organization.                    |
| opinion                   | integer                              | The opinion of the organization.                                     |
| opinionCount              | integer                              | The count of opinions about the organization.                        |
| blackListPersons          | string[]                             | List of persons blacklisted by the organization.                     |
| thirdParty                | ThirdPartyOutputDto                  | Details about third-party services associated with the organization. |
| statistics                | SubscriptionOutputDto                | Subscription statistics associated with the organization.            |
| quotas                    | array<string,QuotaOutputDto>         | Quotas associated with the organization.                             |
| configs                   | PersonConfigValueOutputDto[]         | Configuration values for persons associated with the organization.   |
| displayed                 | OrganizationDisplayedOutputDto       | Displayed information about the organization.                        |

## AddKYCDocumentInputDto

| Field | Type                 | Description                                         |
| :---- | :------------------- | --------------------------------------------------- |
| id    | string               | Unique identifier of the KYC document.              |
| type  | KYCDocumentTypeEnum  | The type of KYC document.                           |
| media | ImageObjectOutputDto | The media (image) associated with the KYC document. |

## AddressRequestInputDto

| Field          | Type    | Description                                      |
| :------------- | :------ | ------------------------------------------------ |
| originId       | string  | Unique identifier for the address request.       |
| latitude       | integer | The latitude coordinate of the address request.  |
| longitude      | integer | The longitude coordinate of the address request. |
| organizationId | string  | Unique identifier for the organization.          |

## AddRIBInputDto

| Field | Type   | Description                                   |
| :---- | :----- | --------------------------------------------- |
| iban  | string | The International Bank Account Number (IBAN). |
| bic   | string | The Bank Identifier Code (BIC) or SWIFT code. |

## CaptionInputDto

| Field          | Type    | Description                                    |
| :------------- | :------ | ---------------------------------------------- |
| id             | string  | The ID of the media.                           |
| size           | integer | The size of the media in bytes.                |
| contentUrl     | string  | The URL to access the media content.           |
| description    | string  | A description or caption for the media.        |
| name           | string  | The name or title of the media.                |
| encodingFormat | string  | The encoding format of the media (e.g., JPEG). |

## CommunicationInputDto

| Field   | Type   | Description                                 |
| :------ | :----- | ------------------------------------------- |
| title   | string | The title of the communication.             |
| message | string | The message content.                        |
| icon    | string | The icon associated with the communication. |

## CreateMediaInputDto

| Field     | Type    | Description                             |
| :-------- | :------ | --------------------------------------- |
| id        | string  | The ID of the media.                    |
| uri       | string  | The URI of the media.                   |
| width     | integer | The width of the media.                 |
| height    | integer | The height of the media.                |
| caption   | string  | The caption for the media.              |
| thumbnail | string  | The URI of the thumbnail for the media. |

## EmployeeOutputDto

| Field      | Type   | Description                        |
| :--------- | :----- | ---------------------------------- |
| id         | string | The ID of the employee.            |
| uri        | string | The URI of the employee.           |
| consumerId | string | The consumer ID of the employee.   |
| firstName  | string | The first name of the employee.    |
| lastName   | string | The last name of the employee.     |
| email      | string | The email address of the employee. |

## FacebookThirdPartOutputDto

| Field                    | Type     | Description                                    |
| :----------------------- | :------- | ---------------------------------------------- |
| accessToken              | string   | The access token for Facebook.                 |
| longLivedUserAccessToken | string   | The long-lived user access token for Facebook. |
| expirationDate           | DateTime | The expiration date of the access token.       |
| userID                   | string   | The user ID associated with the token.         |

## FounderInputDto

| Field     | Type   | Description                         |
| :-------- | :----- | ----------------------------------- |
| id        | string | The ID of the organization founder. |
| firstName | string | The first name of the founder.      |
| lastName  | string | The last name of the founder.       |
| birthDate | string | The birth date of the founder.      |
| email     | string | The email address of the founder.   |

## FounderOutputDto extends PersonOutDto

<!-- TODO: add link to PersonOutputDto when merged => [PersonOutputDto](person-types#personoutputdto)  -->

| Field      | Type   | Description                       |
| :--------- | :----- | --------------------------------- |
| id         | string | The ID of the founder.            |
| uri        | string | The URI of the founder.           |
| consumerId | string | The consumer ID of the founder.   |
| firstName  | string | The first name of the founder.    |
| lastName   | string | The last name of the founder.     |
| email      | string | The email address of the founder. |
| birthDate  | string | The birth date of the founder.    |

## KYCDocumentOutputDto

| Field                | Type                             | Description                                       |
| :------------------- | :------------------------------- | ------------------------------------------------- |
| id                   | string                           | The ID of the KYC document.                       |
| uri                  | string                           | The URI of the KYC document.                      |
| organizationId       | string                           | The ID of the organization.                       |
| consumerId           | string                           | The consumer ID associated with the KYC document. |
| type                 | KYCDocumentTypeEnum              | The type of KYC document.                         |
| tag                  | string                           | The tag associated with the KYC document.         |
| originId             | string                           | The origin ID of the KYC document.                |
| creationDate         | DateTime                         | The creation date of the KYC document.            |
| processedDate        | DateTime                         | The processed date of the KYC document.           |
| status               | KYCDocumentStatusEnum            | The status of the KYC document.                   |
| refusedReasonType    | KYCDocumentRefusedReasonTypeEnum | The type of reason for refusal, if applicable.    |
| refusedReasonMessage | string                           | The reason message for refusal, if applicable.    |
| media                | ImageObjectOutputDto             | The media associated with the KYC document.       |
| createdAt            | DateTime                         | The creation date of the KYC document.            |
| updatedAt            | DateTime                         | The last update date of the KYC document.         |

## MediaInputDto

| Field   | Type            | Description                             |
| :------ | :-------------- | --------------------------------------- |
| id      | string          | The ID of the media.                    |
| uri     | string          | The URI of the media.                   |
| caption | CaptionInputDto | The caption associated with the media.  |
| domain  | string          | The domain of the media, if applicable. |

## OpeningHoursSpecificationInputDto

| Field        | Type   | Description                                            |
| :----------- | :----- | ------------------------------------------------------ |
| id           | string | The ID of the opening hours specification.             |
| dayOfWeek    | string | The day of the week for which the opening hours apply. |
| closes       | string | The closing time for the specified day of the week.    |
| opens        | string | The opening time for the specified day of the week.    |
| validFrom    | string | The date from which these opening hours are valid.     |
| validThrough | string | The date until which these opening hours are valid.    |

## OrganizationCommunicationOutputDto

| Field   | Type   | Description                                                |
| :------ | :----- | ---------------------------------------------------------- |
| title   | string | The title of the organization's communication.             |
| message | string | The message content of the organization's communication.   |
| icon    | string | The icon associated with the organization's communication. |

## OrganizationDisplayedOutputDto

| Field            | Type                 | Description                                               |
| :--------------- | :------------------- | --------------------------------------------------------- |
| actualityContent | string               | The content of the organization's actuality.              |
| actualityTitle   | string               | The title of the organization's actuality.                |
| backgroundImg    | string               | The background image of the organization.                 |
| logoImg          | string               | The logo image of the organization.                       |
| highlightImg     | string               | The highlight image of the organization.                  |
| city             | string               | The city where the organization is located.               |
| id               | string               | The ID of the organization.                               |
| isBarService     | boolean              | Indicates if the organization offers bar service.         |
| isOpen           | boolean              | Indicates if the organization is currently open.          |
| latitude         | float                | The latitude coordinates of the organization's location.  |
| longitude        | float                | The longitude coordinates of the organization's location. |
| name             | string               | The name of the organization.                             |
| position         | string               | The position of the organization.                         |
| type             | string               | The type of the organization.                             |
| weekTime         | DaysOutputDto[]      | The week-time information for the organization.           |
| metadatas        | array<string, mixed> | Additional metadata associated with the organization.     |

## OrganizationDocumentsOutputDto

| Field  | Type   | Description                                                       |
| :----- | :----- | ----------------------------------------------------------------- |
| bic    | string | The Business Identifier Code (BIC) of the organization's bank.    |
| iban   | string | The International Bank Account Number (IBAN) of the organization. |
| id     | string | The ID of the organization.                                       |
| ibanId | string | The ID associated with the organization's IBAN.                   |
| status | string | The status of the organization.                                   |

## OrganizationFiltersDto

| Field           | Type           | Description                                                                |
| :-------------- | :------------- | -------------------------------------------------------------------------- |
| id              | string         | The ID of the organization document.                                       |
| slug            | string         | The slug of the organization document.                                     |
| sponsorshipCode | string         | The sponsorship code of the organization document.                         |
| ids             | string[]       | An array of IDs associated with the organization document.                 |
| q               | string         | The query associated with the organization document.                       |
| legalName       | string         | The legal name of the organization document.                               |
| location        | PlaceOutputDto | The location details of the organization document.                         |
| latitude        | float          | The latitude coordinate of the organization document.                      |
| longitude       | float          | The longitude coordinate of the organization document.                     |
| uri             | string         | The URI of the organization document.                                      |
| distance        | string         | The distance associated with the organization document.                    |
| types           | string[]       | An array of types associated with the organization document.               |
| serviceTypes    | string[]       | An array of service types associated with the organization document.       |
| enabled         | string         | The enabled status of the organization document.                           |
| isPublic        | bool           | Indicates if the organization document is public.                          |
| categoryUri     | string         | The category URI of the organization document.                             |
| productUri      | string         | The product URI of the organization document.                              |
| productName     | string         | The product name associated with the organization document.                |
| deliveryQuery   | string         | The delivery query of the organization document.                           |
| day             | string         | The day associated with the organization document.                         |
| hour            | string         | The hour associated with the organization document.                        |
| isRoaming       | string         | Indicates if the organization document is roaming.                         |
| facetted        | string         | The facetted information associated with the organization document.        |
| analytics       | string         | The analytics data associated with the organization document.              |
| opinion         | string[]       | An array of opinions associated with the organization document.            |
| price           | string[]       | An array of prices associated with the organization document.              |
| category        | string[]       | An array of categories associated with the organization document.          |
| subCategory     | string[]       | An array of subcategories associated with the organization document.       |
| noBind          | bool           | Indicates if the organization document is not bound.                       |
| sort            | string[]       | An array of sorting information associated with the organization document. |

## OrganizationInputDto

| Field     | Type           | Description                               |
| :-------- | :------------- | ----------------------------------------- |
| id        | string         | The ID of the organization.               |
| legalName | string         | The legal name of the organization.       |
| siret     | string         | The SIRET number of the organization.     |
| createdAt | DateTime       | The creation date of the organization.    |
| location  | PlaceOutputDto | The location details of the organization. |

## PersonConfigValueOuputDto

| Field | Type   | Description                     |
| :---- | :----- | ------------------------------- |
| code  | string | The code for the configuration. |
| value | mixed  | The value of the configuration. |

## RegisterOrganizationRequestInputDto

| Field           | Type                 | Description                         |
| :-------------- | :------------------- | ----------------------------------- |
| sponsoredByCode | string               | The code for sponsorship.           |
| organization    | OrganizationInputDto | Information about the organization. |
| person          | PersonOutputDto      | Information about the person.       |
| password        | string               | The password for registration.      |

## RIBOutputDto

| Field | Type   | Description                                   |
| :---- | :----- | --------------------------------------------- |
| iban  | string | The International Bank Account Number (IBAN). |
| bic   | string | The Bank Identifier Code (BIC).               |

## StatisticsOutputDto

| Field            | Type                  | Description                         |
| :--------------- | :-------------------- | ----------------------------------- |
| firstVisit       | string                | The date of the first visit.        |
| totalOrder       | integer               | The total number of orders.         |
| amountTotalOrder | float                 | The total amount of orders.         |
| subscription     | SubscriptionOutputDto | Information about the subscription. |
| opinion          | float                 | The opinion value.                  |

## SuggestOrganizationRequestInputDto

| Field       | Type                | Description                                                                  |
| :---------- | :------------------ | ---------------------------------------------------------------------------- |
| id          | string              | The ID of the organization.                                                  |
| legalName   | string              | The legal name of the organization.                                          |
| siret       | string              | The SIRET number of the organization.                                        |
| location    | PlaceOutputDto      | Information about the organization's location.                               |
| serviceType | TaxonomyOutputDto[] | An array of taxonomy information related to the organization's service type. |

## TaxonomyOutputDto

| Field     | Type                     | Description                                                |
| :-------- | :----------------------- | ---------------------------------------------------------- |
| id        | string                   | The ID of the taxonomy.                                    |
| uri       | string                   | The URI of the taxonomy.                                   |
| code      | string                   | The code associated with the taxonomy.                     |
| values    | TaxonomyValueOutputDto[] | An array of taxonomy values associated with this taxonomy. |
| parent    | TaxonomyOutputDto        | The parent taxonomy, if applicable.                        |
| childrens | TaxonomyOutputDto[]      | An array of child taxonomies, if applicable.               |
| createdAt | DateTime                 | The date and time when the taxonomy was created.           |
| updatedAt | DateTime                 | The date and time when the taxonomy was last updated.      |

## TaxonomyValueOutputDto

| Field     | Type     | Description                                                 |
| :-------- | :------- | ----------------------------------------------------------- |
| language  | string   | The language associated with the taxonomy value.            |
| value     | string   | The taxonomy value.                                         |
| createdAt | DateTime | The date and time when the taxonomy value was created.      |
| updatedAt | DateTime | The date and time when the taxonomy value was last updated. |

## ThirdPartyOutputDto

| Field    | Type                       | Description                          |
| :------- | :------------------------- | ------------------------------------ |
| facebook | FacebookThirdPartOutputDto | Third-party data related to Facebook |

## UpdateDocumentInputDto

| Field  | Type          | Description                                     |
| :----- | :------------ | ----------------------------------------------- |
| media  | MediaInputDto | The updated media information for the document. |
| domain | string        | The domain associated with the document.        |

## UpdateKYCDocumentInputDto

| Field                     | Type                                 | Description                                               |
| :------------------------ | :----------------------------------- | --------------------------------------------------------- |
| legalName                 | string                               | The legal name of the organization.                       |
| location                  | PlaceOutputDto                       | The location information of the organization.             |
| enabled                   | boolean                              | Whether the organization is enabled.                      |
| isPublic                  | boolean                              | Whether the organization is public.                       |
| isComingSoon              | boolean                              | Whether the organization is marked as coming soon.        |
| metadatas                 | array<string, mixed>                 | Additional metadata associated with the organization.     |
| openingHoursSpecification | OpeningHoursSpecificationOutputDto[] | Opening hours specification for the organization.         |
| thirdParty                | ThridPartyOutputDto                  | Third-party information associated with the organization. |
