---
id: etl
title: ETL
---

Extract, Transform and Load from pre-saved configuration or by using customized model.
A model is represented by a JSON file containing all the configurations linked to the 3 actions (extract, transform, load).

The ETL domain provides 3 functions to interact with the ETL.

## Save config

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->etl->saveConfig(IEtlSaveConfigInputDto $config);
```

## EtlSaveConfigInputDto

<details>
 <summary><b>EtlSaveConfigInputDto</b></summary>

| Fields          |                      Type                      | Description              |
| :-------------- | :--------------------------------------------: | :----------------------- |
| **source**      |      [SourceModel](etl-types#SourceModel)      | Source information.      |
| **destination** | [DestinationModel](etl-types#DestinationModel) | Destination information. |
| **schemas**     |     [SchemaModel] (etl-types#SchemaModel)      | Schema information.      |
| **filters**     |     [FilterModel] (etl-types#FilterModel)      | Filter information.      |

This call returns an [ConfigModel](etl-types#ConfigModel) object.

## Extract transform load

<span class="badge badge--warning">Require authentication</span>

This action launches an asynchronous ETL task using a specific configuration.

:warning: The configuration will not be saved.

```php
$sherlClient->etl->extractTransformLoad(IExtractTransformLoadInputDto $config);
```

## ExtractTransformLoadInputDto

| Fields     |                 Type                 | Description                 |
| :--------- | :----------------------------------: | :-------------------------- |
| **config** | [ConfigModel](etl-types#ConfigModel) | Configuration for ETL task. |

This call returns an [EtlResponse](etl-types#EtlResponse) object.

## Extract transform load by config id

<span class="badge badge--warning">Require authentication</span>

This action launches an asynchronous ETL task with a particular ID.

:warning: This configuration should be saved before.

```php
$sherlClient->etl->extractTransformLoadById(string $id);
```

This call returns an [EtlResponse](etl-types#EtlResponse) object.
