---
id: opinion
title: Opinion
---

## Get opinions list

<span class="badge badge--warning">Required authentication</span>

```php
$opinions = $sherlClient->opinion->getOpinionsList(OpinionDto $filters);
```

<span class="badge badge--success">Public</span>

```php
$publicOpinions = $sherlClient->opinion->getPublicOpinions(OpinionDto $filters);
```

This call returns a paginated array of [OpinionDto](opinion-types#OpinionDto) objects.

<details>
<summary><b>OpinionFilterDto</b></summary>

| Fields           |  Type  |      Required      | Description                          |
| :--------------- | :----: | :----------------: | :----------------------------------- |
| **opinionToUri** | string | :white_check_mark: | URI to which the opinion is directed |

</details>

This call returns a collection of opinions, filtered based on the provided criteria in [OpinionFiltersDto](opinion#OpinionFiltersDto) and [OpinionDto](opinion-types#OpinionDto).

## Create opinion

<span class="badge badge--warning">Required authentication</span>

```php
$newOpinion = $sherlClient->opinion->createOpinion(array $data);
```

data is an associative array with the following keys:

```php
$data = [
'comment' => 'string',
'id' => 'string',
'opinionToUri' => 'string',
'score' => 'int',
];
```

This call returns an [OpinionDto](opinion-types#OpinionDto) object.

## Update opinion status

<span class="badge badge--warning">Required authentication</span>

```php
$opinionUpdated = $sherlClient->opinion->updateOpinion(string $id, OpinionDto $status);
```

status is an associative array with the following keys:

```php
$status = [
    'status' => 'PUBLISHED | REFUSED | IS_CLAIMED',
    'refusedComment' => 'string',
];
```

This call returns an [OpinionDto](opinion-types#OpinionDto) object.

## Create opinion claim

<span class="badge badge--warning">Required authentication</span>

```php
$claim = $sherlClient->opinion->createOpinionClaim(string $opinionId, OpinionDto $data);
```

data is an associative array with the following key:

```php
$data = [
    'claimComment' => 'string',
];
```

This call returns an [OpinionDto](opinion-types#OpinionDto) object.

## Get opinion average score

<span class="badge badge--warning">Required authentication</span>

```php
$averageScore = $sherlClient->opinion->getOpinionsAverage(string $opinionToUri);
```

This call returns an [averageScore](notification-types#averageScore) object.

## Get the opinions given by connected user

<span class="badge badge--warning">Required authentication</span>

```php
$givenOpinions = $sherlClient->opinion->getOpinionsIGive(array $filters);
```

This call returns a paginated array of [OpinionDto](opinion-types#OpinionDto) objects.
