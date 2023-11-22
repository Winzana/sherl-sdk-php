---
id: place-types
title: Place types
---

## AddressInfoDto

| Fields                         |   Type   | Description                             |
| :----------------------------- | :------: | :-------------------------------------- |
| **country**                    |  string  | Country                                 |
| **region**                     |  string  | Region in country                       |
| **department**                 |  string  | Department in region                    |
| **locality**                   |  string  | Locality in department                  |
| **postalCode**                 |  string  | Locality postal code                    |
| **streetAddress**              |  string  | Street address                          |
| **complementaryStreetAddress** |  string  | Street address complement               |
| **types**                      | string[] | TODO                                    |
| **name**                       |  string  | Address name given to identity          |
| **type**                       |  string  | TODO                                    |
| **isDefault**                  | boolean  | Set the address to user default address |
| **googleToken**                |  string  | TODO                                    |
| **uri**                        |  string  | Place uri (/api/places/...)             |
| **originId**                   |  string  | TODO                                    |
| **latitude**                   |  float   | Geographic coordinate                   |
| **longitude**                  |  float   | Geographic coordinate                   |

## AddressOutputDto

extends [AddressInfoDto](#AddressInfoDto)
| Fields | Type | Description |
|-----------|:------:|------------------------|
| id | string | The address identifier |
| createdAt | string | The creation date |
| updatedAt | string | The last update date |
