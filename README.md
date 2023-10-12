# sherl/sdk

[![Release](https://github.com/Winzana/sherl-sdk-php/workflows/Release/badge.svg?branch=master&event=push)](https://github.com/Winzana/sherl-sdk-php/actions?query=workflow%3ARelease)
[![semantic-release](https://img.shields.io/badge/%20%20%F0%9F%93%A6%F0%9F%9A%80-semantic--release-e10079.svg)](https://github.com/semantic-release/semantic-release)

Sherl SDK for PHP.

## Sherl

Sherl is a low-code platform created by [Winzana](https://winzana.com).

## Getting started

### Installation

#### Install as Composer package

```
composer require sherl/sdk
```

### Configuration

Before calling any other methods, you need to initialize the SDK using SherlClient class:

```php
// Import SherlClient
use Sherl\Sdk\Common\SherlClient;

$sherlClient = new SherlClient(
  apiKey,
  apiSecret,
  referer,
  apiUrl,
);
```