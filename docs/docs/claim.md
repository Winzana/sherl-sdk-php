---
id: claim
title: Claim
---

## Create claim

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->claim->createClaim(CreateClaimInput $createClaim);
```

<details>
 <summary><b>CreateClaimInput</b></summary>

| Fields           |                        Type                        | Description                       |
| :--------------- | :------------------------------------------------: | :-------------------------------- |
| **id**           |                       string                       | The order id to claim             |
| **issueTitle**   |                       string                       | Claim's title                     |
| **issueMessage** |                       string                       | Claim's message                   |
| **personId**     |                       string                       | Id of the person making the claim |
| **schedules**    | [ClaimSchedulesDto](claim-types#claimschedulesdto) | Claim's schedules                 |

</details>

This call retuns a [ClaimOutputDto](claim-types#claimoutputdto) class.

## Update claim by id

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->claim->updateClaim(string $claimId, UpdateClaimInputDto $updateClaim);
```

<details>
 <summary><b>UpdateClaimInputDto</b></summary>

| Fields      |                  Type                  | Description                 |
| :---------- | :------------------------------------: | :-------------------------- |
| **$status** | [ClaimStatus](claim-types#claimstatus) | The new status of the claim |

</details>

This call retuns a [ClaimOutputDto](claim-types#claimoutputdto) class.

## Get claim by id

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->claim->getClaim(string $claimId);
```

This call retuns a [ClaimOutputDto](claim-types#claimoutputdto) class.

## Get all claims

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->claim->getClaims(FindClaimsInputDto $filters);
```

<details>
 <summary><b>FindClaimsInputDto</b></summary>

//TODO Demander les bon filtres

| Fields      | Type  | Description |
| :---------- | :---: | :---------- |
| **filters** | mixed | A changer   |

</details>

This call retuns a [ClaimsResultOutputDto](claim-types#claimsresultoutputdto) class.

## Find claim by

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->claim->findClaimBy(ClaimFindOneByInputDto $findClaimOneBy);
```

<details>
 <summary><b>ClaimFindOneByInputDto</b></summary>

| Fields         |  Type  | Description                            |
| :------------- | :----: | :------------------------------------- |
| **id**         | string | Claim's id                             |
| **personId**   | string | ID of person which associated to claim |
| **orderId**    | string | ID of order which associated to claim  |
| **consumerId** | string | TODO                                   |

</details>

This call retuns a [ClaimOutputDto](claim-types#claimoutputdto) class.

## Reply to claim

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->claim->replyToClaim(string $claimId, ReplyToClaimInputDto $replyToClaim);
```

<details>
 <summary><b>ReplyToClaimInputDto</b></summary>

| Fields      |  Type  | Description   |
| :---------- | :----: | :------------ |
| **content** | string | Reply content |

</details>

This call retuns a [ClaimOutputDto](claim-types#claimoutputdto) class.

## Refund claim

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->claim->refundClaim(string $claimId);
```

This call retuns a [ClaimOutputDto](claim-types#claimoutputdto) class.
