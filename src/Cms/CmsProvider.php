<?php

namespace Sherl\Sdk\Cms;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;
use Sherl\Sdk\Common\Error\SherlException;
use Sherl\Sdk\Cms\Dto\ArticleDto;
use Sherl\Sdk\Cms\Dto\CMSArticleFaqCreateInputDto;
use Sherl\Sdk\Cms\Dto\CMSArticleCreateInputDto;
use Sherl\Sdk\Cms\Dto\CMSArticleStaticPageCreateInputDto;
use Sherl\Sdk\Cms\Dto\CMSArticleStoryCreateInputDto;
use Sherl\Sdk\Cms\Dto\CMSArticleTrainingCreateInputDto;
use Sherl\Sdk\Cms\Dto\CMSArticleAddMediaDto;
use Sherl\Sdk\Cms\Dto\FindPostsFiltersDto;
use Sherl\Sdk\Cms\Dto\CMSArticleUpdateInputDto;
use Exception;
use Sherl\Sdk\Common\Error\ErrorFactory;
use Sherl\Sdk\Common\Error\ErrorHelper;
use Sherl\Sdk\Common\SerializerFactory;
use Sherl\Sdk\Cms\Errors\CmsErr;

class CmsProvider
{
    public const DOMAIN = "CMS";

    private Client $client;
    private ErrorFactory $errorFactory;

    /**
     * CmsProvider constructor.
     * @param Client $client The HTTP client used to make requests.
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->errorFactory = new ErrorFactory(self::DOMAIN, CmsErr::$errors);
    }

    /**
     * Adds a media page.
     * @param string $id The identifier for the media.
     * @param CMSArticleAddMediaDto $data The data to create the media page.
     * @return ArticleDto|null The content of the body of the response.
     * @throws SherlException If the response status code indicates an error.
     */
    public function addMediaPage(string $id, CMSArticleAddMediaDto $data): ?ArticleDto
    {
        try {
            $response = $this->client->post("/api/cms/articles/posts/$id/media", [
                "headers" => ["Content-Type" => "application/json"],
                RequestOptions::JSON => [
                    "data" => $data
                ]
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ArticleDto::class,
                'json'
            );
        } catch (\Exception $err) {

            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(CmsErr::CMS_EVENT_CREATION_FAILED_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(CmsErr::ARTICLE_NOT_FOUND);

                }
            }
            throw $this->errorFactory->create(CmsErr::CMS_ADD_MEDIA_FAILED);
        }
    }

    /**
 * Creates an article with the given ID and article input data.
 * @param string $id The ID associated with the article.
 * @param CMSArticleUpdateInputDto $articleInput Data transfer object for the article input.
 * @return ArticleDto|null The body content of the HTTP response.
 * @throws SherlException If the response status code is not successful.
 */
    public function updateArticleById(string $id, CMSArticleUpdateInputDto $articleInput): ?ArticleDto
    {
        try {
            $response = $this->client->put("/api/cms/articles/posts/$id", [
                "headers" => ["Content-Type" => "application/json"],
                RequestOptions::JSON => [
                    "title" => $articleInput->title,
                    "content" => $articleInput->content,

                ]
            ]);
            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ArticleDto::class,
                'json'
            );
        } catch (\Exception $err) {

            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(CmsErr::CMS_EVENT_CREATION_FAILED_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(CmsErr::ARTICLE_NOT_FOUND);
                }
            }
            throw $this->errorFactory->create(CmsErr::CMS_UPDATE_ARTICLE_BY_ID_FAILED);
        }
    }
    /**
     * Creates a FAQs page using the given FAQ input data.
     * @param CMSArticleFaqCreateInputDto $faqInput Data transfer object for the FAQ input.
     * @return ArticleDto|null The body content of the HTTP response.
     * @throws SherlException If the response status code is not successful.
     */
    public function createFaqsPage(CMSArticleFaqCreateInputDto $faqInput): ?ArticleDto
    {
        try {
            $response = $this->client->post("/api/cms/articles/faqs", [
                "headers" => ["Content-Type" => "application/json"],
                RequestOptions::JSON => [
                    "faqInput" => $faqInput,
                ]
            ]);
            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ArticleDto::class,
                'json'
            );

        } catch (\Exception $err) {


            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {

                    case 403:
                        throw $this->errorFactory->create(CmsErr::CMS_FAQS_CREATION_FAILED_FORBIDDEN);

                }
            }
            throw $this->errorFactory->create(CmsErr::CMS_CREATE_FAQS_FAILED);
        }
    }
    /**
     * Creates a posts page with the provided data.
     * @param CMSArticleCreateInputDto $data Data for creating the posts page.
     * @return ArticleDto|null The body content of the HTTP response.
     * @throws SherlException If the response status code is not 201.
     */
    public function createPostsPage(CMSArticleCreateInputDto $data): ?ArticleDto
    {
        try {
            $response = $this->client->post("/api/cms/articles/posts", [
                "headers" => ["Content-Type" => "application/json"],
                RequestOptions::JSON => [
                    "posts" => $data,
                    ]
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ArticleDto::class,
                'json'
            );

        } catch (\Exception $err) {

            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($response->getStatusCode()) {
                    case 403:
                        throw $this->errorFactory->create(CmsErr::CMS_POSTS_CREATION_FAILED_FORBIDDEN);
                }
            }
            throw $this->errorFactory->create(CmsErr::CMS_CREATE_POSTS_FAILED);
        }
    }
    /**
     * Creates a static page using the provided data.
     *
     * @param CMSArticleStaticPageCreateInputDto $data The data to create the static page.
     * @return ArticleDto|null The content of the HTTP response body.
     * @throws SherlException If the response status code is not successful.
     */
    public function createStaticPage(CMSArticleStaticPageCreateInputDto $data): ?ArticleDto
    {
        try {
            $response = $this->client->post("/api/cms/articles/static-page", [
                "headers" => ["Content-Type" => "application/json"],
                RequestOptions::JSON => $data
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ArticleDto::class,
                'json'
            );

        } catch (\Exception $err) {

            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(CmsErr::CMS_STATIC_PAGES_CREATION_FAILED_FORBIDDEN);
                }
            }
            throw $this->errorFactory->create(CmsErr::CMS_CREATE_FAILED);
        }
    }
    /**
    * Creates a stories page with the provided data.
    *
    * @param CMSArticleStoryCreateInputDto $data Data for creating the stories page.
    * @return ArticleDto|null The body content of the HTTP response.
    * @throws SherlException If the response status code is not 201.
    */
    public function createStoriesPage(CMSArticleStoryCreateInputDto $data): ?ArticleDto
    {
        try {
            $response = $this->client->post("/api/cms/articles/stories", [
                "headers" => ["Content-Type" => "application/json"],
                RequestOptions::JSON => $data
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ArticleDto::class,
                'json'
            );
        } catch (\Exception $err) {

            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(CmsErr::CMS_STORIES_CREATION_FAILED_FORBIDDEN);

                }
            }
            throw $this->errorFactory->create(CmsErr::CMS_CREATE_STORIES_FAILED);
        }
    }
    /**
    * Creates a trainings page with the provided data.
    *
    * @param CMSArticleTrainingCreateInputDto $data Data for creating the training page.
    * @return ArticleDto|null The body content of the HTTP response.
    * @throws SherlException If the response status code is not 201.
    */
    public function createTrainingsPage(CMSArticleTrainingCreateInputDto $data): ?ArticleDto
    {
        try {
            $response = $this->client->post("/api/cms/articles/trainings", [
                "headers" => ["Content-Type" => "application/json"],
                RequestOptions::JSON => $data
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ArticleDto::class,
                'json'
            );

        } catch (\Exception $err) {

            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(CmsErr::CMS_TRAINING_CREATION_FAILED_FORBIDDEN);
                }
            }
            throw $this->errorFactory->create(CmsErr::CMS_CREATE_TRAININGS_FAILED);
        }
    }
    /**
    * Deletes a media page by its identifier.
    *
    * @param string $id The identifier for the media page to delete.
    * @return ArticleDto|null The body content of the HTTP response.
    */
    public function deleteArticleById(string $id): ?ArticleDto
    {
        try {
            $response = $this->client->delete("/api/cms/articles/posts/$id", [
                "headers" => ["Content-Type" => "application/json"],
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ArticleDto::class,
                'json'
            );
        } catch (\Exception $err) {

            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(CmsErr::CMS_DELETE_BY_ID_FAILED_CMS_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(CmsErr::ARTICLE_NOT_FOUND);
                }
            }
            throw $this->errorFactory->create(CmsErr::CMS_DELETE_BY_ID_FAILED);
        }
    }
    /**
    * Retrieves an article by its identifier.
    *
    * @param string $id The identifier for the article.
    * @return ArticleDto|null The body content of the HTTP response.
    * @throws SherlException If the response status code is not 200.
    */
    public function deleteMediaPage(string $id): ?ArticleDto
    {
        try {
            $response = $this->client->delete("/api/cms/articles/posts/$id/media", [
                "headers" => ["Content-Type" => "application/json"],
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ArticleDto::class,
                'json'
            );

        } catch (\Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(CmsErr::CREATE_CMS_MEDIA_FAILED_CMS_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(CmsErr::ARTICLE_NOT_FOUND);
                }
            }
            throw $this->errorFactory->create(CmsErr::CMS_DELETE_MEDIA_FAILED);
        }
    }
    /**
    * Retrieves an article by its id.
    *
    * @param string $id The id for the article.
    * @return ArticleDto|null The body content of the HTTP response.
    * @throws SherlException If the response status code is not 200.
    */
    public function getArticleById(string $id): ?ArticleDto
    {
        try {
            $response = $this->client->get("/api/cms/articles/posts/$id", [
                "headers" => ["Content-Type" => "application/json"],
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ArticleDto::class,
                'json'
            );

        } catch (\Exception $err) {

            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(CmsErr::CMS_GET_BY_ID_FAILED_POST_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(CmsErr::ARTICLE_NOT_FOUND);
                }
            }
            throw $this->errorFactory->create(CmsErr::CMS_GET_BY_ID_FAILED);
        }
    }
    /**
     * Retrieves an article using its slug.
     *
     * @param string $slug The slug of the article.
     * @return ArticleDto|null The body content of the HTTP response.
     * @throws SherlException If the response status code is not 200 or if there is an error.
     */
    public function getArticleBySlug(string $slug): ?ArticleDto
    {
        try {
            $response = $this->client->get("/api/cms/articles/posts/find-one-by-slug/$slug", [
                "headers" => ["Content-Type" => "application/json"],
            ]);
            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ArticleDto::class,
                'json'
            );

        } catch (\Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(CmsErr::CMS_GET_SLUG_FAILED_ARTICLE_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(CmsErr::ARTICLE_NOT_FOUND);

                }
            }
            throw $this->errorFactory->create(CmsErr::CMS_GET_SLUG_FAILED);
        }
    }
    /**
     * Retrieves posts based on specified filters.
     *
     * @param FindPostsFiltersDto $filters The filters to apply when retrieving posts.
     * @return ArticleDto|null The body content of the HTTP response.
     * @throws SherlException If the response status code is not 200 or if there is an error.
     */
    public function getPosts(FindPostsFiltersDto $filters): ?ArticleDto
    {
        try {
            $response = $this->client->get("/api/cms/articles/posts", [
                RequestOptions::JSON => $filters
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ArticleDto::class,
                'json'
            );

        } catch (\Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(CmsErr::CMS_GET_BY_ID_FAILED_POST_FORBIDDEN);
                }
            }
            throw $this->errorFactory->create(CmsErr::CMS_GET_POSTS_FAILED);
        }
    }
    /**
     * Retrieves a public article by its identifier.
     *
     * @param string $id The identifier of the public article.
     * @return ArticleDto|null The body content of the HTTP response.
     * @throws SherlException If the response status code is not 200 or if there is an error.
     */
    public function getPublicArticleById(string $id): ?ArticleDto
    {
        try {
            $response = $this->client->get("/api/cms/articles/posts/$id", [
                "headers" => ["Content-Type" => "application/json"],

            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ArticleDto::class,
                'json'
            );
        } catch (\Exception $err) {

            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(CmsErr::CMS_GET_PUBLIC_FIND_ID_FAILED_POST_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(CmsErr::ARTICLE_NOT_FOUND);
                }
            }
            throw $this->errorFactory->create(CmsErr::CMS_GET_PUBLIC_FIND_ID_FAILED);
        }
    }
    /**
     * Retrieves a public article using its slug.
     *
     * @param string $slug The slug of the public article.
     * @return ArticleDto|null The body content of the HTTP response.
     * @throws SherlException If the response status code is not 200 or if there is an error.
     */
    public function getPublicArticleBySlug(string $slug): ?ArticleDto
    {
        try {
            $response = $this->client->get("/api/public/cms/articles/posts/find-one-by-slug/$slug", [
                "headers" => ["Content-Type" => "application/json"],
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ArticleDto::class,
                'json'
            );
        } catch (\Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(CmsErr::CMS_GET_SLUG_FAILED_ARTICLE_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(CmsErr::ARTICLE_NOT_FOUND);
                }
            }
            throw $this->errorFactory->create(CmsErr::CMS_GET_SLUG_FAILED);
        }
    }

    /**
    * Retrieves a list of public articles filtered by the provided criteria.
    *
    * @param FindPostsFiltersDto $filters Filters to apply for retrieving the public articles.
    * @return ArticleDto|null The response content from the CMS containing the list of public articles.
    * @throws SherlException If the response status code is not 200.
    */
    public function getPublicArticles(FindPostsFiltersDto $filters): ?ArticleDto
    {
        try {
            $response = $this->client->get("/api/public/cms/articles/posts", [
                RequestOptions::JSON => $filters
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ArticleDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(CmsErr::CMS_GET_PUBLIC_ARTICLES_FAILED_POSTS_FORBIDDEN);
                }
            }
            throw $this->errorFactory->create(CmsErr::CMS_GET_PUBLIC_ARTICLES_FAILED);
        }
    }
}
