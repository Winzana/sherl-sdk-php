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

### PlaceOutputDto

| Fields                     |   Type   | Description                                    |
| -------------------------- | :------: | ---------------------------------------------- |
| id                         |  string  | The id of the place                            |
| uri                        |  string  | the uri of the place                           |
| country                    |  string  | The place's country                            |
| locality                   |  string  | The place 's locality                          |
| region                     |  string  | The place region                               |
| department                 |  string  | The place's department                         |
| types                      | string[] | An array of type for the place                 |
| postalCode                 |  string  | The place's postal code                        |
| streetAddress              |  string  | The place's street address                     |
| complementaryStreetAddress |  string  | The complementary addres                       |
| name                       |  string  | The name of the place                          |
| originId                   |  string  | TODO                                           |
| latitude                   |  float   | The latitude of the place                      |
| longitude                  |  float   | The longitude of the place                     |
| createdAt                  |  string  | The date creation of the place                 |
| updatedAt                  |  string  | The last update of the place                   |
| type                       |  string  | The type of the place                          |
| isDefault                  | boolean  | Specify if the place is a default place or not |
