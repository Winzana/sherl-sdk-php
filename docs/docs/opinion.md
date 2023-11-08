---
id: opinion
title: Opinion
---

## Get opinions list

<span class="badge badge--warning">Required authentication</span>

```php
$opinions = $opinionClient->getOpinions(array $filters);
```

<span class="badge badge--success">Public</span>

```php
$publicOpinions = $opinionClient->getPublicOpinions(array $filters);
```

filters is an associative array that should include pagination and other filter criteria.

This call returns a paginated array of [OpinionDto](opinion-types#OpinionDto) objects.

## Create opinion

<span class="badge badge--warning">Required authentication</span>

```php
$newOpinion = $opinionClient->createOpinion(array $data);
```

data is an associative array with the following keys:

```php
data = [
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
$opinionUpdated = $opinionClient->updateOpinion(string $opinionId, array $status);
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
$claim = $opinionClient->createOpinionClaim(string $opinionId, array $data);
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
$averageScore = $opinionClient->getOpinionsAverage(string $opinionToUri);
```

This call returns an [averageScore](notification-types#averageScore) object.

## Get the opinions given by connected user

<span class="badge badge--warning">Required authentication</span>

```php
$givenOpinions = $opinionClient->getOpinionsIGive(array $filters);
```

This call returns a paginated array of [OpinionDto](opinion-types#OpinionDto) objects.
