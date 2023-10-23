---
id: account
title: Account
---

## Create an account

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->account->createAccount(CreateAccountInputDto $createAccount);
```

<details>
<summary><b>CreateAccountInputDto</b></summary>

| Fields                |   Type   |      Required      | Description                                                     |
| :-------------------- | :------: | :----------------: | :-------------------------------------------------------------- |
| **email**             |  string  | :white_check_mark: | Email of the user.                                              |
| **password**          |  string  | :white_check_mark: | Password of the user.                                           |
| **repeatPassword**    |  string  | :white_check_mark: | Repeat password                                                 |
| **firstName**         |  string  | :white_check_mark: | First name of the user                                          |
| **lastName**          |  string  | :white_check_mark: | Last name of the user                                           |
| **mobilePhoneNumber** |  string  | :white_check_mark: | Phone number of the user                                        |
| **gender**            |  string  | :white_check_mark: | Gender of the user                                              |
| **birthDate**         |  string  | :white_check_mark: | Birth date of the user                                          |
| **hosts**             | string[] | :white_check_mark: | Hosts authorised to use the api keys supplied with this account |
| **ips**               | string[] |        :x:         | IPs authorised to use the api keys supplied with this account   |

</details>

This call returns an [AccountOutputDto](account-types#accountoutputdto).