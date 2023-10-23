---
id: auth
title: Authentication
---

import Tabs from '@theme/Tabs';
import TabItem from '@theme/TabItem';

## Sign in with username and password

<span class="badge badge--success">Public</span>

This call allows the user to connect using it's username and password.

```php
$sherlClient->auth->signInWithEmailAndPassword(string $username, string $password)
```

This call returns [LoginOutputDto](auth-types#loginoutputdto) class.

## Refresh token

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->auth->refreshToken();
```

This call returns a new token as [LoginOutputDto](auth-types#loginoutputdto) class.

## Log out

<span class="badge badge--success">Public</span>

This call allows the user to disconnect.

```php
$sherlClient->auth->logout();
```

This call returns an empty string.

## Request SMS Code

<span class="badge badge--success">Public</span>

```php
$sherlClient->auth->requestSMSCode(string $mobilePhoneNumber);
```

This call returns a boolean according to successfully of code sending;

## Resend SMS Code

<span class="badge badge--success">Public</span>

```php
$sherlClient->auth->resendSMSCode(string $mobilePhoneNumber);
```

This call returns a boolean according to successfully of code sending;

## Login with code

<span class="badge badge--success">Public</span>

```php
$sherlClient->auth->loginWithCode(string $userId, string $code);
```

This call returns a [LoginOutputDto](auth-types#loginoutputdto) class.

## Login with different providers

<span class="badge badge--success">Public</span>

<Tabs
defaultValue="google"
values={[
{label: 'Google', value: 'google'},
{label: 'Facebook', value: 'facebook'},
{label: 'Apple', value: 'apple'},
]}>

<TabItem value="google">

```php
$sherlClient->auth->loginWithGoogle(ExternalLoginInputDto $googleInput);
```

</TabItem>
<TabItem value="facebook">

```php
$sherlClient->auth->loginWithFacebook(ExternalLoginInputDto $facebookInput);
```

</TabItem>
<TabItem value="apple">

```php
$sherlClient->auth->loginWithApple(ExternalLoginInputDto $appleInput);
```

</TabItem>

</Tabs>

<details>
<summary><b>ExternalLoginInputDto</b></summary>

| Fields          |                      Type                       |      Required      | Description                 |
| :-------------- | :---------------------------------------------: | :----------------: | :-------------------------- |
| **displayName** |                     string                      | :white_check_mark: | User display name           |
| **emails**      | [ExternalEmailInputDto](#externalemailinputdto) | :white_check_mark: | User's email information    |
| **id**          |                     string                      | :white_check_mark: | External provider user's id |
| **locale**      |                     string                      | :white_check_mark: | User's locale               |
| **name**        |  [ExternalNameInputDto](#externalnameinputdto)  | :white_check_mark: | User's name information     |
| **photos**      | [ExternalPhotoInputDto](#externalphotoinputdto) | :white_check_mark: | User's photos information   |

### ExternalEmailInputDto

| Fields       |  Type   |      Required      | Description |
| :----------- | :-----: | :----------------: | :---------- |
| **value**    | string  | :white_check_mark: | TODO        |
| **verified** | boolean | :white_check_mark: | TODO        |

### ExternalNameInputDto

| Fields         |  Type  |      Required      | Description      |
| :------------- | :----: | :----------------: | :--------------- |
| **familyName** | string | :white_check_mark: | User family name |
| **givenName**  | string | :white_check_mark: | User given name  |

### ExternalPhotoInputDto

| Fields       |  Type   |      Required      | Description |
| :----------- | :-----: | :----------------: | :---------- |
| **value**    | string  | :white_check_mark: | TODO        |

</details>

These calls return a [LoginOutputDto](auth-types#loginoutputdto) class.
