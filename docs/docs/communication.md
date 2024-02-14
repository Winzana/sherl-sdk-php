---
id: communication
title: Communication
---

## Get communication

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->communication->getCommunication(CommunicationFindByInputDto $filters);
```

<details>
 <summary><b>CommunicationFindByInputDto</b></summary>

| Fields          |                                   Type                                   | Required | Description                         |
| :-------------- | :----------------------------------------------------------------------: | :------: | ----------------------------------- |
| **id**          |                                 `string`                                 |   :x:    | The communication unique identifier |
| **uri**         |                                 `string`                                 |   :x:    | The communication URI               |
| **senderId**    |                                 `string`                                 |   :x:    | The sender unique identifier        |
| **receiverUri** |                                 `string`                                 |   :x:    | The receiver URI                    |
| **aboutUri**    |                                 `string`                                 |   :x:    | The communication about URI         |
| **channel**     | [CommunicationChannelEnum](communication-types#communicationchannelenum) |   :x:    | The communication channel           |
| **type**        |    [CommunicationTypeEnum](communication-types#communicationtypeenum)    |   :x:    | The communication type              |

</details>

This call returns a [CommunicationOutputDto](communication-types#communicationoutputdto) class.