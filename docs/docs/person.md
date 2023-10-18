---
id: person
title: Person
---

<!-- <details>
 <summary>PersonDto</summary>
</details> -->

## Get me

<span class="badge badge--warning">Require authentication</span>

Get the current logged in user

```php
$sherlClient->person->getMe();
```

This call return a [PersonOutputDto](./person-types#personoutputdto) object.

## Get config

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->person->getConfig();
```

This call return a [ConfigDto](./common-types#configdto) object.

## Get current address

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->person->getCurrentAddress(GeoCoordinatesDto $position);
```

<details>
 <summary>GeoCoordinatesDto</summary>

| Fields        |  Type   |      Required      | Description                     |
| :------------ | :-----: | :----------------: | :------------------------------ |
| **latitude**  | `float` | :white_check_mark: | Latitude of the current address |
| **longitude** | `float` | :white_check_mark: | Latitude of the current address |

</details>

This call return a [Pagination](./common-types#pagination) of [LocationDto](./common-types#locationdto) objects.

## Get persons

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->person->getPersons(PersonFiltersDto $filters);
```

<details>
 <summary>PersonFiltersDto</summary>

| Fields                        |       Type        | Required | Description                                        |
| :---------------------------- | :---------------: | :------- | -------------------------------------------------- |
| **id**                        |     `string`      | :x:      | The person id to filter                            |
| **userId**                    |     `string`      | :x:      | The person user id to filter                       |
| **q**                         |     `string`      | :x:      | The person query to filter                         |
| **firstName**                 |     `string`      | :x:      | The person first name to filter                    |
| **lastName**                  |     `string`      | :x:      | The person last name to filter                     |
| **phoneNumber**               |     `string`      | :x:      | The person phone number to filter                  |
| **mobilePhoneNumber**         |     `string`      | :x:      | The person mobile phone number to filter           |
| **faxNumber**                 |     `string`      | :x:      | The person fax number to filter                    |
| **nationality**               |     `string`      | :x:      | The person nationality to filter                   |
| **uri**                       |     `string`      | :x:      | The person uri to filter                           |
| **legalName**                 |     `string`      | :x:      | The person legal name to filter                    |
| **location**                  |      `mixed`      | :x:      | The person location to filter                      |
| **subOrganizations**          |      `mixed`      | :x:      | The person sub organizations to filter             |
| **birthDate**                 |     `string`      | :x:      | The person birth date to filter                    |
| **email**                     |     `string`      | :x:      | The person email to filter                         |
| **gender**                    |     `string`      | :x:      | The person gender to filter                        |
| **jobTitle**                  |     `string`      | :x:      | The person job title to filter                     |
| **enabled**                   |     `boolean`     | :x:      | The person account status to filter                |
| **createdAt**                 |     `string`      | :x:      | The person creation date to filter                 |
| **updatedAt**                 |     `string`      | :x:      | The person update date to filter                   |
| **analytics**                 |     `string`      | :x:      | The person analytics to filter                     |
| **noFrequentedEstablishment** |     `string`      | :x:      | The person not frequenting establishment to filter |
| **type**                      |   `PersonType`    | :x:      | The person type to filter                          |
| **sort**                      | `Sort<PersonDto>` | :x:      | The person sorting status                          |

</details>

This call return a [Pagination](./common-types#pagination) of [LocationDto](./common-types#locationdto) objects.

## Get person by id

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->person->getPersonById(string $id);
```

This call return a [PersonDto](./person-types#persondto) object.

## Create address

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->person->createAddress(AddressDto $address);
```

<details>
 <summary>AddressDto</summary>

| Fields                         |   Type   | Required           | Description                               |
| :----------------------------- | :------: | :----------------- | ----------------------------------------- |
| **id**                         | `string` | :white_check_mark: | L'identifiant de la personne pour filtrer |
| **country**                    | `string` | :white_check_mark: | Le pays de l'adresse                      |
| **locality**                   | `string` | :white_check_mark: | La localité de l'adresse                  |
| **region**                     | `string` | :white_check_mark: | La région de l'adresse                    |
| **postalCode**                 | `string` | :white_check_mark: | Le code postal de l'adresse               |
| **streetAddress**              | `string` | :white_check_mark: | L'adresse de la rue                       |
| **uri**                        | `string` | :white_check_mark: | L'URI de l'adresse                        |
| **createdAt**                  | `string` | :white_check_mark: | La date de création                       |
| **department**                 | `string` | :white_check_mark: | Le département de l'adresse               |
| **complementaryStreetAddress** | `string` | :white_check_mark: | L'adresse complémentaire                  |
| **name**                       | `string` | :white_check_mark: | Le nom de l'adresse                       |
| **originId**                   | `string` | :white_check_mark: | L'identifiant d'origine                   |
| **latitude**                   | `float`  | :white_check_mark: | La latitude de l'adresse                  |
| **longitude**                  | `float`  | :white_check_mark: | La longitude de l'adresse                 |

</details>

This call return a [PersonOutputDto](./person-types#personoutputdto) object.

## Delete address

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->person->deleteAddress(string $id);
```

This call return a [PersonOutputDto](./person-types#personoutputdto) object.

## Create person

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->person->createPerson(PersonCreateDto $person);
```

<details>
 <summary>PersonCreateDto</summary>

| Fields                |                         Type                          | Required           | Description                         |
| :-------------------- | :---------------------------------------------------: | :----------------- | ----------------------------------- |
| **id**                |                       `string`                        | :white_check_mark: | L'identifiant de la personne        |
| **firstName**         |                       `string`                        | :x:                | Le prénom de la personne            |
| **lastName**          |                       `string`                        | :x:                | Le nom de famille de la personne    |
| **address**           |                     `AddressDto`                      | :x:                | L'adresse de la personne            |
| **phoneNumber**       |                       `string`                        | :x:                | Le numéro de téléphone              |
| **mobilePhoneNumber** |                       `string`                        | :x:                | Le numéro de téléphone mobile       |
| **faxNumber**         |                       `string`                        | :x:                | Le numéro de télécopie              |
| **nationality**       |                       `string`                        | :x:                | La nationalité de la personne       |
| **affiliation**       |             `PersonOrganizationCreateDto`             | :x:                | L'affiliation de la personne        |
| **birthDate**         |                       `string`                        | :x:                | La date de naissance de la personne |
| **email**             |                       `string`                        | :white_check_mark: | L'adresse e-mail de la personne     |
| **gender**            | `Gender` (Énumération `Sherl\Sdk\Person\Enum\Gender`) | :white_check_mark: | Le genre de la personne             |
| **jobTitle**          |                       `string`                        | :x:                | Le titre de poste de la personne    |

</details>

This call return a [PersonOutputDto](./person-types#personoutputdto) object.
