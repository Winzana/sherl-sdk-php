---
id: etl-types
title: ETL types
---

## ExtractTransformLoadResponseDto

| Fields |  Type   | Description             |
| :----- | :-----: | :---------------------- |
| status | boolean | The ETL response status |

## ConfigModelDto

| Fields      |                         Type                         | Description                                    |
| :---------- | :--------------------------------------------------: | :--------------------------------------------- |
| id          |                        string                        | ID of the configuration.                       |
| uri         |                        string                        | URI of the configuration.                      |
| consumerId  |                        string                        | Consumer ID of the configuration.              |
| source      |      [SourceModelDto](etl-types#SourceModelDto)      | Source information.                            |
| destination | [DestinationModelDto](etl-types#DestinationModelDto) | Destination information.                       |
| schemas     |     [SchemaModelDto] (etl-types#SchemaModelDto)      | Array of schemas.                              |
| filters     |     [FilterModelDto] (etl-types#FilterModelDto)      | Array of filters.                              |
| createdAt   |                       DateTime                       | Creation date of the configuration (optional). |

## EtlSaveConfigInputDto

| Fields      |                         Type                         | Description              |
| :---------- | :--------------------------------------------------: | :----------------------- |
| source      |      [SourceModelDto](etl-types#SourceModelDto)      | Source information.      |
| destination | [DestinationModelDto](etl-types#DestinationModelDto) | Destination information. |
| schemas     |     [SchemaModelDto] (etl-types#SchemaModelDto)      | Schema information.      |
| filters     |     [FilterModelDto] (etl-types#FilterModelDto)      | Filter information.      |

## SourceModelDto

| Fields  |                             Type                             | Description               |
| :------ | :----------------------------------------------------------: | :------------------------ |
| method  | [ExtractSourceMethodEnum](etl-types#ExtractSourceMethodEnum) | Source extraction method. |
| options |         [OptionsModelDto](etl-types#OptionsModelDto)         | Source options.           |
| name    |                            string                            | Name of the source.       |

## DestinationModelDto

| Fields       |                            Type                            | Description                               |
| :----------- | :--------------------------------------------------------: | :---------------------------------------- |
| loaderType   |         [LoaderTypeEnum](etl-types#LoaderTypeEnum)         | Destination loader type.                  |
| database     |                           string                           | Database name (optional).                 |
| collection   |                           string                           | Collection name (optional).               |
| entity       |                           string                           | Entity name (optional).                   |
| indexed      |                          boolean                           | Indexed status (optional).                |
| user         |                           string                           | User for access (optional).               |
| password     |                           string                           | Password for access (optional).           |
| host         |                           string                           | Host for access (optional).               |
| port         |                           string                           | Port for access (optional).               |
| databaseType | [DatabaseLoaderTypeEnum](etl-types#DatabaseLoaderTypeEnum) | Destination database type (optional).     |
| uniqueFields |                    string[] (optional)                     | Unique fields for destination (optional). |

## SchemaModelDto

| Fields       |                               Type                               | Description                   |
| :----------- | :--------------------------------------------------------------: | :---------------------------- |
| name         |                              string                              | Name of the schema.           |
| sources      |      [SchemaSourceModelDto](etl-types#SchemaSourceModelDto)      | Array of schema sources.      |
| destinations | [SchemaDestinationModelDto](etl-types#SchemaDestinationModelDto) | Array of schema destinations. |

## FilterModelDto

| Fields  |                           Type                           | Description             |
| :------ | :------------------------------------------------------: | :---------------------- |
| name    |                          string                          | Name of the filter.     |
| type    |   [FieldValueTypesEnum](etl-types#FieldValueTypesEnum)   | Filter value type.      |
| options | [FilterOptionsModelDto](etl-types#FilterOptionsModelDto) | Filter options.         |
| fields  |   [FilterFieldModelDto](etl-types#FilterFieldModelDto)   | Array of filter fields. |

## OptionsModelDto

| Fields                  |                         Type                         | Description                              |
| :---------------------- | :--------------------------------------------------: | :--------------------------------------- |
| endpoint                |                        string                        | API endpoint URL.                        |
| header                  |                        array                         | Request headers.                         |
| query                   |                   array (optional)                   | Query parameters (optional).             |
| dataAttribute           |                  string (optional)                   | Data attribute (optional).               |
| pageAttribute           |                        string                        | Page attribute.                          |
| itemPerPageAttribute    |                        string                        | Items per page attribute.                |
| itemsPerPageValue       |                       integer                        | Items per page value.                    |
| type                    | [HttpRequestTypeEnum](etl-types#HttpRequestTypeEnum) | HTTP request type.                       |
| mimeType                |        [MimeTypeEnum](etl-types#MimeTypeEnum)        | MIME type of the response.               |
| totalItemsHeader        |                  string (optional)                   | Total items header (optional).           |
| totalItemsAttribute     |                  string (optional)                   | Total items attribute (optional).        |
| isPaginationZeroBased   |                  boolean (optional)                  | Zero-based pagination flag (optional).   |
| isPaginationOffsetBased |                  boolean (optional)                  | Offset-based pagination flag (optional). |

## SchemaSourceModelDto

| Fields       |                              Type                               | Description                   |
| :----------- | :-------------------------------------------------------------: | :---------------------------- |
| type         |      [FieldValueTypesEnum](etl-types#FieldValueTypesEnum)       | Source value type.            |
| outputType   | [FieldValueTypesEnum](etl-types#FieldValueTypesEnum) (optional) | Output value type (optional). |
| wrappers     |     [WrapperModelDto](etl-types#WrapperModelDto) (optional)     | Array of wrappers (optional). |
| defaultValue |                        mixed (optional)                         | Default value (optional).     |
| ignoreEmpty  |                       boolean (optional)                        | Ignore empty (optional).      |

## SchemaDestinationModelDto

| Fields     |                              Type                               | Description                   |
| :--------- | :-------------------------------------------------------------: | :---------------------------- |
| name       |                             string                              | Name of the destination.      |
| outputType | [FieldValueTypesEnum](etl-types#FieldValueTypesEnum) (optional) | Output value type (optional). |
| type       |      [FieldValueTypesEnum](etl-types#FieldValueTypesEnum)       | Destination value type.       |
| pattern    |                        string (optional)                        | Pattern (optional).           |
| indexed    |                             boolean                             | Indexed status (optional).    |
| wrappers   |     [WrapperModelDto](etl-types#WrapperModelDto) (optional)     | Array of wrappers (optional). |

## FilterFieldModelDto

| Fields |       Type       | Description       |
| :----- | :--------------: | :---------------- |
| field  |      string      | Field             |
| boost  | float (optional) | Boost (optional). |

## WrapperModelDto

| Fields     |                           Type                           | Description |
| :--------- | :------------------------------------------------------: | :---------- |
| identifier | [WrapperIdentifierEnum](etl-types#WrapperIdentifierEnum) | identifier  |
| options    |                          mixed                           | options     |

## FilterOptionsModelDto

| Fields        |       Type       | Description               |
| :------------ | :--------------: | :------------------------ |
| fuzziness     | float (optional) | Fuzziness (optional).     |
| prefix_length | float (optional) | Prefix length (optional). |
| boost         | float (optional) | Boost (optional).         |

## DatabaseLoaderTypeEnum

| Fields             |   Type   |
| :----------------- | :------: |
| **MONGODB**        | `string` |
| **ELASTIC_SEARCH** | `string` |

## ExtractSourceMethodEnum

| Fields            |   Type   |
| :---------------- | :------: |
| **HTTP_REQUEST**  | `string` |
| **HTTP_PARSE**    | `string` |
| **DB_CONNECTION** | `string` |
| **FILE_READING**  | `string` |

## FieldValueTypesEnum

| Fields      |   Type   |
| :---------- | :------: |
| **NUMBER**  | `string` |
| **STRING**  | `string` |
| **BOOLEAN** | `string` |
| **OBJECT**  | `string` |
| **ARRAY**   | `string` |
| **ANY**     | `string` |

## HttpRequestTypeEnum

| Fields         |   Type   |
| :------------- | :------: |
| **REST_API**   | `string` |
| **SOAP_API**   | `string` |
| **HTML_PARSE** | `string` |

## LoaderTypeEnum

| Fields       |   Type   |
| :----------- | :------: |
| **DATABASE** | `string` |
| **REST_API** | `string` |
| **EVENT**    | `string` |

## MimeTypeEnum

| Fields               |   Type   |
| :------------------- | :------: |
| **TEXT_JSON**        | `string` |
| **APPLICATION_JSON** | `string` |
| **TEXT_HTML**        | `string` |

## WrapperIdentifierEnum

| Fields            |   Type   |
| :---------------- | :------: |
| **UPPERCASE**     | `string` |
| **LOWERCASE**     | `string` |
| **PARSE_INT**     | `string` |
| **BIRTHDATE_AGE** | `string` |
| **LEADING_ZEROS** | `string` |
| **NOT_OPERATOR**  | `string` |
| **ARRAY_FIND**    | `string` |
| **ARRAY_MAP**     | `string` |
| **PROPERTY**      | `string` |
| **TO_BOOLEAN**    | `string` |
| **NORMALIZER**    | `string` |
| **MATCH**         | `string` |
