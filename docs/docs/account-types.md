---
id: account-types
title: Account Types
---

## AccountOutputDto

| Fields                |                     Type                     | Description                    |
| :-------------------- | :------------------------------------------: | :----------------------------- |
| **id**                |                    string                    | User id                        |
| **uri**               |                    string                    | User uri (/api/account/...)    |
| **projects**          |                   string[]                   | List of your projects ids      |
| **firstName**         |                    string                    | User first name                |
| **lastName**          |                    string                    | User last name                 |
| **email**             |                    string                    | User email address             |
| **mobilePhoneNumber** |                    string                    | User phone number              |
| **birthDate**         |                    string                    | User birthDate (ISO)           |
| **gender**            |                    string                    | User gender                    |
| **legalName**         |                    string                    | User legal name                |
| **location**          | [AddressInfoDto](place-types#addressinfodto) | User location                  |
| **createdAt**         |                    string                    | Account created date (ISO)     |
| **updatedAt**         |                    string                    | Last account update date (ISO) |
