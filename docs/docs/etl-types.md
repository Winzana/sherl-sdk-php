---
id: etl-types
title: ETL types
---

## EtlResponse

| Fields |  Type   | Description             |
| :----- | :-----: | :---------------------- |
| status | boolean | The ETL response status |

## ConfigModel

| Fields      |       Type        | Description                                    |
| :---------- | :---------------: | :--------------------------------------------- |
| id          |      string       | ID of the configuration.                       |
| uri         |      string       | URI of the configuration.                      |
| consumerId  |      string       | Consumer ID of the configuration.              |
| source      |   ISourceModel    | Source information.                            |
| destination | IDestinationModel | Destination information.                       |
| schemas     |  ISchemaModel[]   | Array of schemas.                              |
| filters     |  IFilterModel[]   | Array of filters.                              |
| createdAt   |     DateTime      | Creation date of the configuration (optional). |

## EtlSaveConfigInputDto

| Fields      |       Type        | Description              |
| :---------- | :---------------: | :----------------------- |
| source      |   ISourceModel    | Source information.      |
| destination | IDestinationModel | Destination information. |
| schemas     |   ISchemaModel    | Schema information.      |
| filters     |   IFilterModel    | Filter information.      |

## SourceModel

| Fields  |          Type           | Description               |
| :------ | :---------------------: | :------------------------ |
| method  | ExtractSourceMethodEnum | Source extraction method. |
| options |      IOptionsModel      | Source options.           |
| name    |         string          | Name of the source.       |

## DestinationModel

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

## SchemaModel

| Fields       |           Type            | Description                   |
| :----------- | :-----------------------: | :---------------------------- |
| name         |          string           | Name of the schema.           |
| sources      |   ISchemaSourceModel[]    | Array of schema sources.      |
| destinations | ISchemaDestinationModel[] | Array of schema destinations. |

## FilterModel

| Fields  |        Type         | Description             |
| :------ | :-----------------: | :---------------------- |
| name    |       string        | Name of the filter.     |
| type    | FieldValueTypesEnum | Filter value type.      |
| options | IFilterOptionsModel | Filter options.         |
| fields  | IFilterFieldModel[] | Array of filter fields. |

## OptionsModel

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

## SchemaSourceModel

| Fields       |              Type              | Description                   |
| :----------- | :----------------------------: | :---------------------------- |
| type         |      FieldValueTypesEnum       | Source value type.            |
| outputType   | FieldValueTypesEnum (optional) | Output value type (optional). |
| wrappers     |   IWrapperModel[] (optional)   | Array of wrappers (optional). |
| defaultValue |        mixed (optional)        | Default value (optional).     |
| ignoreEmpty  |       boolean (optional)       | Ignore empty (optional).      |

## SchemaDestinationModel

| Fields     |              Type              | Description                   |
| :--------- | :----------------------------: | :---------------------------- |
| name       |             string             | Name of the destination.      |
| outputType | FieldValueTypesEnum (optional) | Output value type (optional). |
| type       |      FieldValueTypesEnum       | Destination value type.       |
| pattern    |       string (optional)        | Pattern (optional).           |
| indexed    |            boolean             | Indexed status (optional).    |
| wrappers   |   IWrapperModel[] (optional)   | Array of wrappers (optional). |

## FilterFieldModel

| Fields |       Type       | Description       |
| :----- | :--------------: | :---------------- |
| field  |      string      | Field             |
| boost  | float (optional) | Boost (optional). |

## FilterOptionsModel

| Fields        |       Type       | Description               |
| :------------ | :--------------: | :------------------------ |
| fuzziness     | float (optional) | Fuzziness (optional).     |
| prefix_length | float (optional) | Prefix length (optional). |
| boost         | float (optional) | Boost (optional).         |
