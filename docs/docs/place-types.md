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

| Property      | Type   | Description                                          |
| ------------- | ------ | ---------------------------------------------------- |
| **id**        | string | A unique identifier for the address.                 |
| **createdAt** | string | The date and time when the address was created.      |
| **updatedAt** | string | The date and time when the address was last updated. |

## PlaceOutputDto

| Property                       | Type     | Description                                                 |
| ------------------------------ | -------- | ----------------------------------------------------------- |
| **id**                         | string   | A unique identifier for the place.                          |
| **uri**                        | string   | A URI to more information or actions related to the place.  |
| **country**                    | string   | The country part of the place address.                      |
| **locality**                   | string   | The locality or city part of the place address.             |
| **region**                     | string   | The region or state part of the place address.              |
| **department**                 | string   | The department or division part of the place address.       |
| **types**                      | string[] | An array of place types or classifications.                 |
| **postalCode**                 | string   | The postal code or ZIP code part of the place address.      |
| **streetAddress**              | string   | The street address of the place.                            |
| **complementaryStreetAddress** | string   | Complementary details of the place street address.          |
| **name**                       | string   | The name associated with the place, e.g., "Central Park".   |
| **originId**                   | string   | An original identifier for the place.                       |
| **latitude**                   | float    | The latitude coordinate of the place.                       |
| **longitude**                  | float    | The longitude coordinate of the place.                      |
| **consumerId**                 | string   | A unique identifier for the consumer related to this place. |
| **createdAt**                  | string   | The date and time when the place was created.               |
| **updatedAt**                  | string   | The date and time when the place was last updated.          |
| **type**                       | string   | The type of place.                                          |
| **isDefault**                  | boolean  | Indicates if this is the default place for something .      |
