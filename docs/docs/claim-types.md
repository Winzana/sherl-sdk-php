---
id: claim-types
title: Claim types
---

## ClaimOutputDto

| Fields           |                   Type                    | Description                           |
| :--------------- | :---------------------------------------: | :------------------------------------ |
| **id**           |                  string                   | Claim's id                            |
| **replies**      |  [ClaimReplyOutput](#claimreplyoutput)[]  | Array of claim's replies              |
| **schedules**    | [ClaimSchedulesDto](#claimschedulesdto)[] | Array of claim's schedules            |
| **issueMessage** |                  string                   | Claim's message content               |
| **issueTitle**   |                  string                   | Claim's title                         |
| **personId**     |                  string                   | Id of the person making the claim     |
| **orderId**      |                  string                   | Order ID associated with the claim    |
| **createdAt**    |                  string                   | Claim creation date                   |
| **updatedAt**    |                  string                   | Date of last claim update             |
| **uri**          |                  string                   | Claim uri (/api/claims/...)           |
| **consumerId**   |                  string                   | Internal API ID to identify a project |
| **status**       |        [ClaimStatus](#claimstatus)        | Claim's status                        |
| **person**       |         TODO LINK:PersonOutputDto         | Person associated with the claim      |
| **order**        |         TODO LINK:OrderOutputDto          | Order associated with the claim       |

## ClaimReplyOutput

| Fields        |  Type  | Description                               |
| :------------ | :----: | :---------------------------------------- |
| **content**   | string | Reply content                             |
| **createdAt** | string | Reply creation date                       |
| **personId**  | string | Id of the person which reply to the claim |

## ClaimSchedulesDto

| Fields               |  Type  | Description |
| :------------------- | :----: | :---------- |
| **allowedFromDate**  | string | TODO        |
| **allowedUntilDate** | string | TODO        |

## ClaimStatus

| Key    |  Value   | Description                       |
| :----- | :------: | :-------------------------------- |
| NEW    |  "NEW"   | Status of new claim               |
| READ   |  "READ"  | Status when claim has been read   |
| REFUND | "REFUND" | Status when claim has been refund |
| CLOSED | "CLOSED" | Status when claim is closed       |

## ClaimsResultOutputDto

| Fields      |                   Type                    | Description      |
| :---------- | :---------------------------------------: | :--------------- |
| **results** |    [ClaimOutputDto](#claimoutputdto)[]    | Array of claims  |
| **view**    | [ViewOutputDto](pagination#viewoutputdto) | View information |
