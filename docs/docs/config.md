---
id: config
title: Config
---

## Get config

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->config->getPublicConfig(string $code);
```

This call return a [ConfigOuputDto](config-types#configoutputdto) object.

## Set Public Config

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->config->setPublicConfig(SetConfigInputDto $request);
```

<details>
<summary><b>SetConfigInputDto</b></summary>

| Fields        |  Type   |      Required      | Description             |
| :------------ | :-----: | :----------------: | ----------------------- |
| **isPublic**  | boolean | :white_check_mark: | Is public config status |
| **code**      | string  | :white_check_mark: | Config identifier code  |
| **value**     |  mixed  | :white_check_mark: | Config value            |
| **appliedTo** | string  |        :x:         | Target to apply config  |

</details>

This call return a [ConfigOuputDto](config-types#configoutputdto) object.
