---
id: opinion
title: Opinion
---

## Get opinions list

<span class="badge badge--warning">Required authentication</span>

```php
$opinions = $sherlClient->opinion->getOpinionsList(OpinionFilterDto $filtersInput);
```

<details>
<summary><b>OpinionFilterDto</b></summary>

| Fields           |  Type   |      Required      |             Description              |
| :--------------- | :-----: | :----------------: | :----------------------------------: |
| **opinionToUri** | string  | :white_check_mark: | URI to which the opinion is directed |
| **page**         | integer |        :x:         |     Page number for pagination.      |
| **itemsPerPage** | integer |        :x:         | Number of items to display per page. |

</details>

This call returns an [OpinionDto](opinion-types#OpinionDto) object.

<span class="badge badge--success">Public</span>

```php
$publicOpinions = $sherlClient->opinion->getPublicOpinions(OpinionFilterDto $filtersInput);
```

<details>
<summary><b>OpinionFilterDto</b></summary>

| Fields           |  Type   |      Required      |             Description              |
| :--------------- | :-----: | :----------------: | :----------------------------------: |
| **opinionToUri** | string  | :white_check_mark: | URI to which the opinion is directed |
| **page**         | integer |        :x:         |     Page number for pagination.      |
| **itemsPerPage** | integer |        :x:         | Number of items to display per page. |

</details>

This call returns a collection of opinions, filtered based on the provided criteria in [OpinionFiltersDto](opinion#OpinionFiltersDto) and [OpinionDto](opinion-types#OpinionDto).

## Create opinion

<span class="badge badge--warning">Required authentication</span>

```php
$newOpinion = $sherlClient->opinion->createOpinion(string $id, OpinionDto $opinionDto);
```

This call returns an [OpinionDto](opinion-types#OpinionDto) object.

## Update opinion status

<span class="badge badge--warning">Required authentication</span>

```php
$opinionUpdated = $sherlClient->opinion->updateOpinion(string $id, OpinionDto $updatedOpinion);
```

This call returns an [OpinionDto](opinion-types#OpinionDto) object.

## Create opinion claim

<span class="badge badge--warning">Required authentication</span>

```php
$claim = $sherlClient->opinion->createOpinionClaim(string $id, CreateOpinionInputDto $opinionData);
```

<details>
<summary><b>CreateOpinionInputDto</b></summary>

| Fields           |  Type   |      Required      |                   Description                    |
| :--------------- | :-----: | :----------------: | :----------------------------------------------: |
| **comment**      | string  | :white_check_mark: |     The comment associated with the opinion.     |
| **id**           | string  | :white_check_mark: |      The unique identifier of the opinion.       |
| **opinionToUri** | string  | :white_check_mark: |    The URI to which the opinion is directed.     |
| **score**        | integer | :white_check_mark: | The score or rating associated with the opinion. |

</details>
This call returns an [OpinionDto](opinion-types#OpinionDto) object.

## Get opinion average score

<span class="badge badge--warning">Required authentication</span>

```php
$averageScore = $sherlClient->opinion->getOpinionsAverage(string $opinionToUri);
```

This call returns an [OpinionAverageDto](opinion-types#OpinionAverageDto) object.

## Get the opinions given by connected user

<span class="badge badge--warning">Required authentication</span>

```php
$givenOpinions = $sherlClient->opinion->getOpinionsIGive(OpinionFilterDto $filtersInput);
```

<details>
<summary><b>OpinionFilterDto</b></summary>

| Fields           |  Type  |      Required      |                Description                |
| :--------------- | :----: | :----------------: | :---------------------------------------: |
| **opinionToUri** | string | :white_check_mark: | The URI to which the opinion is directed. |

</details>

This call returns a paginated array of [OpinionAverageDto](opinion-types#OpinionAverageDto) objects.
