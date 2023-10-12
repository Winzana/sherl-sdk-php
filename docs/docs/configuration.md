---
id: configuration
title: Configuration
---

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
