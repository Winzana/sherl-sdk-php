---
id: quotas
title: Quotas
---

## Find Quota with filter

<span class="badge badge--warning">Required authentication</span>

Retrieve quota information by using a filter or not.

```php
$quota = $sherlClient->quotas->getQuotaFindByOne(?QuotaFilterDto $filter);
```

<details>
 <summary><b>QuotaFilterDto</b></summary>
|      Fields      |  Type   |      Required      |            Description            |
| :--------------: | :-----: | :----------------: | :-------------------------------: |
|     **page**     | integer |        :x:         |            Page number            |
| **itemsPerPage** | integer |        :x:         |     Number of items per page      |
|      **id**      | string  | :white_check_mark: |  Unique identifier for the quota  |
|     **uri**      | string  | :white_check_mark: |         Uri for the quota         |
|  **consumerId**  | string  | :white_check_mark: | Consumer ID associated with quota |
|   **ownerUri**   | string  | :white_check_mark: |      Owner Uri for the quota      |
</details>

This call returns a [QuotaOutputDto](quotas-types#QuotaOutputDto) object.
