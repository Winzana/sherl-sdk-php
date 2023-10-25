---
id: analytics
title: Analytics
---

## Get analytics

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->analytics->getAnalytics(AnalyticsInputDto $filters);
```

<details>
 <summary><b>AnalyticsInputDto</b></summary>

| Fields             |   Type   | Requis | Description                                                |
| :----------------- | :------: | :----: | ---------------------------------------------------------- |
| **organizationId** | `string` |  :x:   | L'identifiant de l'organisation liée à l'analytique.       |
| **userId**         | `string` |  :x:   | L'identifiant de l'utilisateur lié à l'analytique.         |
| **sort**           | `string` |  :x:   | Le tri à appliquer (s'il y en a) aux données d'analytique. |

</details>

This call returns a [AnalyticsOutputDto](analytics-types#analyticsoutputdto) class object.

## Get audiences analytics

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->analytics->getAudiencesAnalytics(AnalyticsInputBaseDto $filters);
```

<details>
 <summary><b>AnalyticsInputBaseDto</b></summary>

| Fields        |   Type   | Requis | Description                                        |
| :------------ | :------: | :----: | -------------------------------------------------- |
| **beginDate** | `string` |  :x:   | La date de début de la période d'analyse.          |
| **endDate**   | `string` |  :x:   | La date de fin de la période d'analyse.            |
| **userId**    | `string` |  :x:   | L'identifiant de l'utilisateur lié à l'analytique. |
| **limit**     |  `int`   |  :x:   | La limite du nombre de résultats d'analytique.     |

</details>

This call returns a [AnalyticsOutputDto](analytics-types#analyticsoutputdto) class object.

## Get BI analytics

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->analytics->getBIAnalytics(AnalyticsFindBIInputDto $filters);
```

<details>
 <summary><b>AnalyticsFindBIInputDto</b></summary>

| Fields      |   Type   |       Requis       | Description                               |
| :---------- | :------: | :----------------: | ----------------------------------------- |
| **index**   | `string` |        :x:         | L'index de recherche pour l'analyse.      |
| **filters** | `mixed`  | :white_check_mark: | Les filtres à appliquer pour la recherche |

</details>

This call returns a [AnalyticsOutputDto](analytics-types#analyticsoutputdto) class object.

## Get CA analytics

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->analytics->getBIAnalytics(CAAnalyticsInputDto $filters);
```

<details>
 <summary><b>CAAnalyticsInputDto</b> extends <b>AnalyticsInputBaseDto</b></summary>

| Fields             |   Type    |       Requis       | Description                                                  |
| :----------------- | :-------: | :----------------: | ------------------------------------------------------------ |
| **beginDate**      | `string`  |        :x:         | La date de début de la période d'analyse.                    |
| **endDate**        | `string`  |        :x:         | La date de fin de la période d'analyse.                      |
| **userId**         | `string`  |        :x:         | L'identifiant de l'utilisateur lié à l'analytique.           |
| **limit**          |   `int`   |        :x:         | La limite du nombre de résultats d'analytique.               |
| **organizationId** | `string`  |        :x:         | L'index de l'organisation pour la recherche de l'analyse CA. |
| **average**        | `boolean` | :white_check_mark: | Indique si la valeur moyenne doit être calculée.             |

</details>

This call returns a [AnalyticsOutputDto](analytics-types#analyticsoutputdto) class object.

## Get notifications analytics

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->analytics->getNotificationsAnalytics(NotificationsAnalyticsInputDto $filters);
```

<details>
 <summary><b>NotificationsAnalyticsInputDto</b></summary>

| Fields             |   Type   | Requis | Description                                          |
| :----------------- | :------: | :----: | ---------------------------------------------------- | --- |
| **beginDate**      | `string` |  :x:   | La date de début de la période d'analyse.            |
| **endDate**        | `string` |  :x:   | La date de fin de la période d'analyse.              |
| **organizationId** | `string` |  :x:   | L'identifiant de l'organisation liée à l'analytique. |     |

</details>

This call returns a [AnalyticsOutputDto](analytics-types#analyticsoutputdto) class object.

## Get products analytics

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->analytics->getProductsAnalytics(ProductAnalyticsInputDto $filters);
```

<details>
 <summary><b>ProductAnalyticsInputDto</b></summary>

| Fields        |   Type   | Requis | Description                    |
| :------------ | :------: | :----: | ------------------------------ |
| **productId** | `string` |  :x:   | Id du produit cible d'analyse. |

</details>

This call returns a [AnalyticsOutputDto](analytics-types#analyticsoutputdto) class object.

## Get tracking analytics

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->analytics->getTrackingAnalytics(AnalyticsFindByInputDto $filters);
```

<details>
 <summary><b>AnalyticsFindByInputDto</b> extends <b>PaginationFilterInputDto</b></summary>

| Fields               |    Type     | Requis | Description                                                                  |
| :------------------- | :---------: | :----: | ---------------------------------------------------------------------------- |
| **itemsPerPage**     |  `integer`  |  :x:   | Le nombre d'éléments par page pour la pagination. (PaginationFilterInputDto) |
| **page**             |  `integer`  |  :x:   | Le numéro de la page à afficher. (PaginationFilterInputDto)                  |
| **id**               |  `string`   |  :x:   | L'identifiant de la recherche d'analytique.                                  |
| **action**           | `TraceEnum` |  :x:   | L'action liée à la recherche d'analytique.                                   |
| **objectUri**        |  `string`   |  :x:   | L'URI de l'objet associé à la recherche.                                     |
| **value**            |   `mixed`   |  :x:   | La valeur associée à la recherche.                                           |
| **sortBy**           |  `string`   |  :x:   | Le critère de tri pour les résultats.                                        |
| **sortOrder**        |  `string`   |  :x:   | L'ordre de tri des résultats.                                                |
| **aggregateGroupBy** |  `string`   |  :x:   | La clé de regroupement pour l'agrégation.                                    |
| **aggregateSum**     |  `string`   |  :x:   | La somme à effectuer pour l'agrégation.                                      |

</details>

This call returns a [AnalyticsOutputDto](analytics-types#analyticsoutputdto) class object.
