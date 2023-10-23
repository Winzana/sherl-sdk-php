---
id: contact
title: Contact
---

## Send contact

<span class="badge badge--success">Public</span>

```php
$sherlClient->contact->sendContact(ContactInputDto $contactInput);
```

<details>
<summary><b>ContactInputDto</b></summary>

| Fields      |  Type  | Description                         |
| :---------- | :----: | :---------------------------------- |
| **name**    | string | Name of person want send a message  |
| **email**   | string | Email of person want send a message |
| **message** | string | Message to send                     |

</details>

This call return an 'Ok' string.

## Contact a person

<span class="badge badge--success">Public</span>

```php
$sherlClient->contact->contactPerson(string $userId, ContactInputDto $contactInput);
```

<details>
<summary><b>ContactInputDto</b></summary>

| Fields      |  Type  | Description                         |
| :---------- | :----: | :---------------------------------- |
| **name**    | string | Name of person want send a message  |
| **email**   | string | Email of person want send a message |
| **message** | string | Message to send                     |

</details>

This call return an 'Ok' string.
