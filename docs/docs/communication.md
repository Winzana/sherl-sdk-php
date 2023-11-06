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

| Champs          |            Type            | Requis | Description                         |
| :-------------- | :------------------------: | :----: | ----------------------------------- |
| **id**          |          `string`          |  :x:   | L'identifiant de la communication.  |
| **uri**         |          `string`          |  :x:   | L'URI de la communication.          |
| **consumerId**  |          `string`          |  :x:   | L'identifiant du consommateur.      |
| **senderId**    |          `string`          |  :x:   | L'identifiant de l'expéditeur.      |
| **receiverUri** |          `string`          |  :x:   | L'URI du destinataire.              |
| **aboutUri**    |          `string`          |  :x:   | L'URI du sujet de la communication. |
| **channel**     | `CommunicationChannelEnum` |  :x:   | Le canal de communication (enum).   |
| **type**        |  `CommunicationTypeEnum`   |  :x:   | Le type de communication (enum).    |

</details>

This call returns a [CommunicationOutputDto](communication-types#communicationoutputdto) class.
