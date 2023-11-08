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

| Champs      |    Type    | Requis | Description                                  |
| :---------- | :--------: | :----: | -------------------------------------------- |
| **q**       |  `string`  |  :x:   | Terme de recherche (query).                  |
| **indexes** | `string[]` |  :x:   | Tableau d'indexes pour limiter la recherche. |

This call returns a [SearchResultOutputDto](search-types#searchresultoutputdto) class object.

</details>
