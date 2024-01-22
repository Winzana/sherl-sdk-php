---
id: etl-types
title: ETL types
---

## ExtractTransformLoadResponseDto

| Fields |  Type   | Description             |
| :----- | :-----: | :---------------------- |
| status | boolean | The ETL response status |

## ConfigModelDto

| Fields      |        Type         | Description                                    |
| :---------- | :-----------------: | :--------------------------------------------- |
| id          |       string        | ID of the configuration.                       |
| uri         |       string        | URI of the configuration.                      |
| consumerId  |       string        | Consumer ID of the configuration.              |
| source      |   SourceModelDto    | Source information.                            |
| destination | DestinationModelDto | Destination information.                       |
| schemas     |  SchemaModelDto[]   | Array of schemas.                              |
| filters     |  FilterModelDto[]   | Array of filters.                              |
| createdAt   |      DateTime       | Creation date of the configuration (optional). |

## EtlSaveConfigInputDto

| Fields      |        Type         | Description              |
| :---------- | :-----------------: | :----------------------- |
| source      |   SourceModelDto    | Source information.      |
| destination | DestinationModelDto | Destination information. |
| schemas     |   SchemaModelDto    | Schema information.      |
| filters     |   FilterModelDto    | Filter information.      |

## SourceModelDto

| Fields  |          Type           | Description               |
| :------ | :---------------------: | :------------------------ |
| method  | ExtractSourceMethodEnum | Source extraction method. |
| options |     OptionsModelDto     | Source options.           |
| name    |         string          | Name of the source.       |

## DestinationModelDto

| Fields       |          Type          | Description                               |
| :----------- | :--------------------: | :---------------------------------------- |
| loaderType   |     LoaderTypeEnum     | Destination loader type.                  |
| database     |         string         | Database name (optional).                 |
| collection   |         string         | Collection name (optional).               |
| entity       |         string         | Entity name (optional).                   |
| indexed      |        boolean         | Indexed status (optional).                |
| user         |         string         | User for access (optional).               |
| password     |         string         | Password for access (optional).           |
| host         |         string         | Host for access (optional).               |
| port         |         string         | Port for access (optional).               |
| databaseType | DatabaseLoaderTypeEnum | Destination database type (optional).     |
| uniqueFields |  string[] (optional)   | Unique fields for destination (optional). |

## SchemaModelDto

| Fields       |            Type             | Description                   |
| :----------- | :-------------------------: | :---------------------------- |
| name         |           string            | Name of the schema.           |
| sources      |   SchemaSourceModelDto[]    | Array of schema sources.      |
| destinations | SchemaDestinationModelDto[] | Array of schema destinations. |

## FilterModelDto

| Fields  |         Type          | Description             |
| :------ | :-------------------: | :---------------------- |
| name    |        string         | Name of the filter.     |
| type    |  FieldValueTypesEnum  | Filter value type.      |
| options | FilterOptionsModelDto | Filter options.         |
| fields  | FilterFieldModelDto[] | Array of filter fields. |

## OptionsModelDto

| Fields                  |        Type         | Description                              |
| :---------------------- | :-----------------: | :--------------------------------------- |
| endpoint                |       string        | API endpoint URL.                        |
| header                  |        array        | Request headers.                         |
| query                   |  array (optional)   | Query parameters (optional).             |
| dataAttribute           |  string (optional)  | Data attribute (optional).               |
| pageAttribute           |       string        | Page attribute.                          |
| itemPerPageAttribute    |       string        | Items per page attribute.                |
| itemsPerPageValue       |       integer       | Items per page value.                    |
| type                    | HttpRequestTypeEnum | HTTP request type.                       |
| mimeType                |    MimeTypeEnum     | MIME type of the response.               |
| totalItemsHeader        |  string (optional)  | Total items header (optional).           |
| totalItemsAttribute     |  string (optional)  | Total items attribute (optional).        |
| isPaginationZeroBased   | boolean (optional)  | Zero-based pagination flag (optional).   |
| isPaginationOffsetBased | boolean (optional)  | Offset-based pagination flag (optional). |

## SchemaSourceModelDto

| Fields       |              Type              | Description                   |
| :----------- | :----------------------------: | :---------------------------- |
| type         |      FieldValueTypesEnum       | Source value type.            |
| outputType   | FieldValueTypesEnum (optional) | Output value type (optional). |
| wrappers     |  WrapperModelDto[] (optional)  | Array of wrappers (optional). |
| defaultValue |        mixed (optional)        | Default value (optional).     |
| ignoreEmpty  |       boolean (optional)       | Ignore empty (optional).      |

## SchemaDestinationModelDto

| Fields     |              Type              | Description                   |
| :--------- | :----------------------------: | :---------------------------- |
| name       |             string             | Name of the destination.      |
| outputType | FieldValueTypesEnum (optional) | Output value type (optional). |
| type       |      FieldValueTypesEnum       | Destination value type.       |
| pattern    |       string (optional)        | Pattern (optional).           |
| indexed    |            boolean             | Indexed status (optional).    |
| wrappers   |  WrapperModelDto[] (optional)  | Array of wrappers (optional). |

## FilterFieldModelDto

| Fields |       Type       | Description       |
| :----- | :--------------: | :---------------- |
| field  |      string      | Field             |
| boost  | float (optional) | Boost (optional). |

## FilterOptionsModelDto

| Fields        |       Type       | Description               |
| :------------ | :--------------: | :------------------------ |
| fuzziness     | float (optional) | Fuzziness (optional).     |
| prefix_length | float (optional) | Prefix length (optional). |
| boost         | float (optional) | Boost (optional).         |
