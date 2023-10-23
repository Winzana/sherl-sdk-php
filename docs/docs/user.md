---
id: user
title: User
---

## Update user password

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->user->updatePassword(string $password, string $passwordRepeat);
```

This call returns a boolean value depending on the success of the operation.

## Request forgot password

<span class="badge badge--success">Public</span>

```php
$sherlClient->user->forgotPasswordRequest(string $email);
```

This call returns a boolean value depending on the success of the operation.

## Validate forgot password

<span class="badge badge--success">Public</span>

```php
$sherlClient->user->forgotPasswordValidation(ValidateResetPasswordInputDto $validateResetPasswordInput);
```

<details>
<summary><b>ValidateResetPasswordInputDto</b></summary>

| Fields         |  Type  |      Required      | Description                      |
| :------------- | :----: | :----------------: | :------------------------------- |
| token          | string | :white_check_mark: | Used to authenticate the request |
| password       | string | :white_check_mark: | New password                     |
| passwordRepeat | string | :white_check_mark: | Repeat new password              |

</details>

This call returns a boolean value depending on the success of the operation.
