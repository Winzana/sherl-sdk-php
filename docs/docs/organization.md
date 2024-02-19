---
id: organization
title: Organization
---

## Get organization

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->organization->getOrganization(string $organizationId);
```

This call returns a [OrganizationOuputDto](organization-types#organizationouputdto) class object.

## Get organizations

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->organization->getOrganizations(OrganizationFiltersDto $filters);
```

<details>
<summary><b>OrganizationFiltersDto</b></summary>

| Field               | Type             | Required | Description                        |
| :------------------ | :--------------- | :------: | ---------------------------------- |
| **id**              | `string`         |   :x:    | Unique identifier filter           |
| **slug**            | `string`         |   :x:    | Slug to identify the entity filter |
| **sponsorshipCode** | `string`         |   :x:    | Sponsorship code filter            |
| **ids**             | `array`          |   :x:    | Array of identifiers filter        |
| **q**               | `string`         |   :x:    | Search term filter                 |
| **legalName**       | `string`         |   :x:    | Legal name filter                  |
| **location**        | `PlaceOutputDto` |   :x:    | Location filter                    |
| **latitude**        | `number`         |   :x:    | Geographic latitude filer          |
| **longitude**       | `number`         |   :x:    | Geographic longitude filter        |
| **uri**             | `string`         |   :x:    | URI filter                         |
| **distance**        | `string`         |   :x:    | Distance filter                    |
| **types**           | `string[]`       |   :x:    | Types filter                       |
| **serviceTypes**    | `string[]`       |   :x:    | Service types filter               |
| **enabled**         | `string`         |   :x:    | Enabled filter                     |
| **isPublic**        | `boolean`        |   :x:    | Is public filter                   |
| **categoryUri**     | `string`         |   :x:    | Category URI filter                |
| **productUri**      | `string`         |   :x:    | Product URI filter                 |
| **productName**     | `string`         |   :x:    | Product name filter                |
| **deliveryQuery**   | `string`         |   :x:    | Delivery query filter              |
| **day**             | `string`         |   :x:    | Day filter                         |
| **hour**            | `string`         |   :x:    | Hour filter                        |
| **isRoaming**       | `string`         |   :x:    | Is roaming filter                  |
| **facetted**        | `string`         |   :x:    | Facetted filter                    |
| **analytics**       | `string`         |   :x:    | Analytics filer                    |
| **opinion**         | `string[]`       |   :x:    | Opinion filter                     |
| **price**           | `string[]`       |   :x:    | Price filter                       |
| **category**        | `string[]`       |   :x:    | Category filter                    |
| **subCategory**     | `string[]`       |   :x:    | Sub-category filter                |
| **noBind**          | `boolean`        |   :x:    | No binding filter                  |
| **sort**            | `array`          |   :x:    | Sorting filter                     |

</details>

This call returns a [OrganizationOuputDto](organization-types#organizationoutputdto) class.
