---
id: etl
title: ETL
---

## Save config

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->etl->saveConfig(EtlSaveConfigInputDto $config);
```

### EtlSaveConfigInputDto

<details>
 <summary><b>EtlSaveConfigInputDto</b></summary>

| Fields          | Type                                                 |      Required      | Description              |
| --------------- | ---------------------------------------------------- | :----------------: | ------------------------ |
| **source**      | [SourceModelDto](etl-types#SourceModelDto)           | :white_check_mark: | Source information.      |
| **destination** | [DestinationModelDto](etl-types#DestinationModelDto) | :white_check_mark: | Destination information. |
| **schemas**     | [SchemaModelDto] (etl-types#SchemaModelDto)          | :white_check_mark: | Schema information.      |
| **filters**     | [FilterModelDto] (etl-types#FilterModelDto)          | :white_check_mark: | Filter information.      |

</details>

This call returns an [ConfigModelDto](etl-types#ConfigModelDto) object.

## Extract transform load

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->etl->extractTransformLoad(ExtractTransformLoadInputDto $config);
```

## ExtractTransformLoadInputDto

| Fields     | Type                                       |      Required      | Description                 |
| ---------- | ------------------------------------------ | :----------------: | --------------------------- |
| **config** | [ConfigModelDto](etl-types#ConfigModelDto) | :white_check_mark: | Configuration for ETL task. |

This call returns an [ExtractTransformLoadResponseDto](etl-types#ExtractTransformLoadResponseDto) object.

## Extract transform load by config id

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->etl->extractTransformLoadById(string $id);
```

This call returns an [ExtractTransformLoadResponseDto](etl-types#ExtractTransformLoadResponseDto) object.
