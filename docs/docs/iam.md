---
id: iam
title: IAM
---

## Get all IAM profiles

<span class="badge badge--warning">Require authentication</span>

```php
$profiles = $sherlClient->iam->getAllIamProfiles(IamProfilesFilterDto $filter);
```

<details>
 <summary><b>ProfileDto</b></summary>

| Fields         | Type                         |      Required      | Description                             |
| -------------- | ---------------------------- | :----------------: | --------------------------------------- |
| **id**         | string                       | :white_check_mark: | Unique identifier for the profile       |
| **uri**        | string                       | :white_check_mark: | Uri for the profile                     |
| **name**       | string                       | :white_check_mark: | Name of the profile                     |
| **consumerId** | string                       |        :x:         | Consumer ID associated with the profile |
| **roles**      | [RoleDto](iam-types#RoleDto) | :white_check_mark: | Array of associated roles               |
| **createdAt**  | datetime                     |        :x:         | Date and time of profile creation       |
| **updatedAt**  | datetime                     |        :x:         | Date and time of last update            |

</details>

This call returns an array of [ProfileDto](Iam-types#ProfileDto).

## Get IAM profile by ID

<span class="badge badge--warning">Require authentication</span>

```php
$profile = $sherlClient->iam->getIamProfileById(string $id);
```

<details>
 <summary><b>ProfileDto</b></summary>

| Fields         | Type                   |      Required      | Description                             |
| -------------- | ---------------------- | :----------------: | --------------------------------------- |
| **id**         | string                 | :white_check_mark: | Unique identifier for the profile       |
| **uri**        | string                 | :white_check_mark: | Uri for the profile                     |
| **name**       | string                 | :white_check_mark: | Name of the profile                     |
| **consumerId** | string                 |        :x:         | Consumer ID associated with the profile |
| **roles**      | [RoleDto](iam#RoleDto) | :white_check_mark: | Array of associated roles               |
| **createdAt**  | datetime               |        :x:         | Date and time of profile creation       |
| **updatedAt**  | datetime               |        :x:         | Date and time of last update            |

</details>

This call returns an ProfileDto object.

## Get IAM role by ID

<span class="badge badge--warning">Require authentication</span>

```php
$role = $sherlClient->iam->getIamRoleById(string $id);
```

<details>
 <summary><b>RoleDto</b></summary>

| Fields          | Type                                   |      Required      | Description                    |
| --------------- | -------------------------------------- | :----------------: | ------------------------------ |
| **id**          | string                                 | :white_check_mark: | Unique identifier for the role |
| **uri**         | string                                 | :white_check_mark: | Uri for the role               |
| **name**        | string                                 | :white_check_mark: | Name of the role               |
| **description** | string                                 | :white_check_mark: | Description of the role        |
| **statement**   | [StatementDto](iam-types#StatementDto) |        :x:         | Array of associated statements |
| **createdAt**   | datetime                               |        :x:         | Date and time of role creation |
| **updatedAt**   | datetime                               |        :x:         | Date and time of last update   |

</details>

This call returns an RoleDto object.
