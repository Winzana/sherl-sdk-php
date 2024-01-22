---
id: cms-types
title: Cms types
---

## CreateCaptionOutputDto

|       Fields       |  Type  |   Description   |
| :----------------: | :----: | :-------------: |
|   **contentUrl**   | string |   Content URL   |
|  **description**   | string |   Description   |
|    **duration**    | string |    Duration     |
| **encodingFormat** | string | Encoding format |
|      **size**      | number |      Size       |
|      **name**      | string |      Name       |
|       **id**       | string |       ID        |

## ICreateThumbnailOutputDto

|   Fields    |                       Type                        |   Description   |
| :---------: | :-----------------------------------------------: | :-------------: |
|   **id**    |                      string                       |       ID        |
|   **uri**   |                      string                       |       URI       |
|  **width**  |                      number                       |      Width      |
| **height**  |                      number                       |     Height      |
| **caption** | [CreateCaptionOutputDto](#createcaptionoutputdto) | Caption details |

## ArticleTypeEnum

|   Key    |   Value    |        Description        |
| :------: | :--------: | :-----------------------: |
|   BLOG   |   "blog"   |  Article type for a blog  |
|  STORY   |  "story"   | Article type for a story  |
| TRAINING | "training" | Article type for training |
|   PAGE   |   "page"   |  Article type for a page  |
|   FAQ    |   "faq"    |  Article type for a FAQ   |

## ArticleTypeEnum

|    Key    |    Value    |         Description         |
| :-------: | :---------: | :-------------------------: |
|   DRAFT   |   "draft"   |   Article status as draft   |
| PUBLISHED | "published" | Article status as published |
| ARCHIVED  |  archived"  | Article status as archived  |

## IArticle

|       Fields        |                  Type                   |            Description            |
| :-----------------: | :-------------------------------------: | :-------------------------------: |
|       **id**        |                 string                  |                ID                 |
|       **uri**       |                 string                  |                URI                |
|      **title**      |                 string                  |               Title               |
|      **slug**       |                 string                  |               Slug                |
|     **resume**      |                 string                  |              Resume               |
|     **content**     |                 string                  |              Content              |
|   **consumerId**    |            string (optional)            |            Consumer ID            |
| **organizationUri** |            string (optional)            |         Organization URI          |
|      **type**       |   [ArticleTypeEnum](#ArticleTypeEnum)   |           Article type            |
|    **authorUri**    |                 string                  |            Author URI             |
|     **author**      |        PersonInputDto(optional)         |              Author               |
|    **beginDate**    |                  Date                   |            Begin date             |
|     **endDate**     |             Date (optional)             |             End date              |
|     **tokens**      |                 Object                  |      Tokens (e.g. Facebook)       |
|     **status**      | [ArticleStatusEnum](#ArticleStatusEnum) |          Article status           |
|      **media**      |         ImageObject (optional)          | Media associated with the article |
|    **metadatas**    |      Associative Array (optional)       |             Metadatas             |
|    **createdAt**    |             Date (optional)             |            Created at             |
|    **updatedAt**    |             Date (optional)             |            Updated at             |
