---
id: search
title: Search
---

## Get public search autocomplete

<span class="badge badge--success">Public</span>

```php
$sherlClient->search->getPublicSearchAutocomplete(SearchFiltersInputDto $filters);
```

<details>
<summary><b>SearchFiltersInputDto</b></summary>

| Fields      |    Type    | Required | Description                          |
| :---------- | :--------: | :------: | ------------------------------------ |
| **q**       |  `string`  |   :x:    | Search term (query).                 |
| **indexes** | `string[]` |   :x:    | Array of indexes to limit the search |

This call returns a [SearchResultOutputDto](search-types#searchresultoutputdto) class object.

</details>
