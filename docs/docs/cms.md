---
id: cms
title: Cms
---

## Create static page

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->cms->createStaticPage(CMSArticleStaticPageCreateInputDto $data);
```

<details>
<summary><b>CMSArticleStaticPageCreateInputDto</b></summary>

| Fields      | Type   |      Required      | Description                |
| ----------- | ------ | :----------------: | -------------------------- |
| **id**      | string | :white_check_mark: | ID of the static page      |
| **title**   | string | :white_check_mark: | Title of the static page   |
| **content** | string | :white_check_mark: | Content of the static page |

</details>

This call returns a [ArticleDto](cms-types#ArticleDto) object.

## Add media

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->cms->addMediaPage(CMSArticleAddMediaDto $data);
```

<details>
<summary><b>CMSArticleAddMediaDto</b></summary>

| Fields        | Type                                                           |      Required      | Description            |
| ------------- | -------------------------------------------------------------- | :----------------: | ---------------------- |
| **id**        | string                                                         | :white_check_mark: | ID of the media        |
| **uri**       | string                                                         | :white_check_mark: | URI of the media       |
| **width**     | number                                                         | :white_check_mark: | Width of the media     |
| **height**    | number                                                         | :white_check_mark: | Height of the media    |
| **caption**   | [CreateCaptionOutputDto](cms-types#CreateCaptionOutputDto)     | :white_check_mark: | Caption of the media   |
| **thumbnail** | [CreateThumbnailOutputDto](cms-types#CreateThumbnailOutputDto) | :white_check_mark: | Thumbnail of the media |

</details>

This call returns a [ArticleDto](cms-types#ArticleDto) object.

## Delete media

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->cms->deleteMediaPage(string $id);
```

This call returns the deleted [ArticleDto](cms-types#ArticleDto) object.

## Get article by slug

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->cms->getArticleBySlug(string $slug);
```

This call returns a [ArticleDto](cms-types#ArticleDto) object.

## Get article by id

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->cms->getArticleById(string $id);
```

This call returns a [ArticleDto](cms-types#ArticleDto) object.

## Delete article

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->cms->deleteArticleById(string $id);
```

This call returns a [ArticleDto](cms-types#ArticleDto) object.

## Update article

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->cms->updateArticleById(string $id,CMSArticleUpdateInputDto $data);
```

<details>
<summary><b>CMSArticleUpdateInputDto</b></summary>

| Fields        | Type   |      Required      | Description               |
| ------------- | ------ | :----------------: | ------------------------- |
| **title**     | string | :white_check_mark: | Title of the article      |
| **content**   | string | :white_check_mark: | Content of the article    |
| **beginDate** | Date   | :white_check_mark: | Begin date of the article |
| **endDate**   | Date   | :white_check_mark: | End date of the article   |
| **status**    | string | :white_check_mark: | Status of the article     |

</details>

This call returns a [ArticleDto](cms-types#ArticleDto) object.

## Create trainings pages

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->cms->createTrainingsPage(CMSArticleTrainingCreateInputDto $data);
```

<details>
<summary><b>CMSArticleTrainingCreateInputDto</b></summary>

| Fields    | Type   |      Required      | Description           |
| --------- | ------ | :----------------: | --------------------- |
| **id**    | string | :white_check_mark: | ID of the training    |
| **title** | string | :white_check_mark: | Title of the training |
| **tags**  | array  | :white_check_mark: | Tags of the training  |

</details>

This call returns a [ArticleDto](cms-types#ArticleDto) object.

## Create stories pages

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->cms->createStoriesPage(CMSArticleStoryCreateInputDto $data);
```

<details>
<summary><b>CMSArticleStoryCreateInputDto</b></summary>

| Fields    | Type   |      Required      | Description        |
| --------- | ------ | :----------------: | ------------------ |
| **id**    | string | :white_check_mark: | ID of the story    |
| **title** | string | :white_check_mark: | Title of the story |

</details>

This call returns a [ArticleDto](cms-types#ArticleDto) object.

## Create FAQS pages

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->cms->createFaqsPage(CMSArticleFaqCreateInputDto $data);
```

<details>
<summary><b>CMSArticleFaqCreateInputDto</b></summary>

| Fields      | Type   |      Required      | Description        |
| ----------- | ------ | :----------------: | ------------------ |
| **id**      | string | :white_check_mark: | ID of the FAQ      |
| **title**   | string | :white_check_mark: | Title of the FAQ   |
| **content** | array  | :white_check_mark: | Content of the FAQ |

</details>

This call returns a [ArticleDto](cms-types#ArticleDto) object.

## Create posts pages

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->cms->createPostsPage(CMSArticleCreateInputDto $data);
```

<details>
<summary><b>CMSArticleCreateInputDto</b></summary>

| Fields        | Type   |      Required      | Description            |
| ------------- | ------ | :----------------: | ---------------------- |
| **id**        | string | :white_check_mark: | ID of the post         |
| **title**     | string | :white_check_mark: | Title of the post      |
| **content**   | string | :white_check_mark: | Content of the post    |
| **beginDate** | Date   | :white_check_mark: | Begin date of the post |
| **endDate**   | Date   | :white_check_mark: | End date of the post   |

</details>

This call returns a [ArticleDto](cms-types#ArticleDto) object.

## Find posts

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->cms->getPosts(FindPostsFiltersDto $filters);
```

<details>
<summary><b>FindPostsFiltersDto</b></summary>

| Fields              | Type   | Required | Description             |
| ------------------- | ------ | :------: | ----------------------- |
| **authorUri**       | string |   :x:    | URI of the post author  |
| **slug**            | string |   :x:    | Slug of the post        |
| **organizationUri** | string |   :x:    | URI of the organization |
| **type**            | string |   :x:    | Type of the post        |
| **beginDate**       | Date   |   :x:    | Begin date of the post  |
| **endDate**         | Date   |   :x:    | End date of the post    |
| **status**          | string |   :x:    | Status of the post      |
| **id**              | string |   :x:    | ID of the post          |

</details>

This interface extends [PaginationFiltersInputDto](pagination#PaginationFiltersInputDto).

This call returns an [SearchResultDto](pagination#SearchResultDto) of [ArticleDto](cms-types#ArticleDto) objects.

## Find article by slug

<span class="badge badge--success">Public</span>

```php
$sherlClient->cms->getPublicArticleBySlug(string $slug);
```

This call returns a [ArticleDto](cms-types#ArticleDto) object.

## Find article by id

<span class="badge badge--success">Public</span>

```php
$sherlClient->cms->getPublicArticleById(string $id);
```

This call returns a [ArticleDto](cms-types#ArticleDto) object.

## Find article

<span class="badge badge--success">Public</span>

```php
$sherlClient->cms->getPublicArticles(FindPostsFiltersDto $data);
```

<details>
<summary><b>FindPostsFiltersDto</b></summary>

| Fields              | Type   | Required | Description             |
| ------------------- | ------ | :------: | ----------------------- |
| **authorUri**       | string |   :x:    | URI of the post author  |
| **slug**            | string |   :x:    | Slug of the post        |
| **organizationUri** | string |   :x:    | URI of the organization |
| **type**            | string |   :x:    | Type of the post        |
| **beginDate**       | Date   |   :x:    | Begin date of the post  |
| **endDate**         | Date   |   :x:    | End date of the post    |
| **status**          | string |   :x:    | Status of the post      |
| **id**              | string |   :x:    | ID of the post          |

</details>

This call returns an [SearchResultDto](pagination#SearchResultDto) of [ArticleDto](cms-types#ArticleDto) objects.
