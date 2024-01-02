<?php

namespace Sherl\Sdk\Cms;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;
use Sherl\Sdk\Common\Error\SherlException;
use Sherl\Sdk\Cms\Dto\ArticleDto;
use Sherl\Sdk\e\Cms\Dto\FaqInputDto;
use Exception;
use Sherl\Sdk\Common\Error\ErrorFactory;
use Sherl\Sdk\Common\Error\ErrorHelper;
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
        $this->errorFactory = new ErrorFactory('Cms', CmsErr::$errors);
    }


    /**
     * Throws a CMS exception.
     * @param ResponseInterface $response The response object to evaluate.
     * @throws SherlException If the response status code indicates an error.
     */

    /**
     * Adds a media page.
     * @param string $id The identifier for the media.
     * @param array $data The data to create the media page.
     * @return string The content of the body of the response.
     * @throws SherlException If the response status code indicates an error.
     */
    public function addMediaPage(string $id, array $data)
    {
        try {
            $response = $this->client->post("/api/media/$id", [
                "headers" => ["Content-Type" => "application/json"],
                RequestOptions::JSON => $data
            ]);

            switch ($response->getStatusCode()) {
                case 201:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        ArticleDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(CmsErr::CREATE_CMS_EVENT_FAILED_CMS_FORBIDDEN);
                case 404:
                    throw $this->errorFactory->create(CmsErr::ARTICLE_NOT_FOUND);
                default:
                    throw $this->errorFactory->create(CmsErr::CMS_ADD_MEDIA_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(CmsErr::CMS_ADD_MEDIA_FAILED));
        }
    }

    /**
     * Creates an article with the given ID and article input data.
     * @param string $id The ID associated with the article.
     * @param ArticleInputDto $articleInput Data transfer object for the article input.
     * @return string The body content of the HTTP response.
     * @throws SherlException If the response status code is not successful.
     */
    public function UpdateArticleById(string $id, ArticleInputDto $articleInput)
    {
        try {
            $response = $this->client->post("/api/article/$id", [
                "headers" => ["Content-Type" => "application/json"],
                RequestOptions::JSON => [
                    "title" => $articleInput->title,
                    "content" => $articleInput->content

                ]
            ]);
            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        ArticleDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(CmsErr::CREATE_CMS_EVENT_FAILED_CMS_FORBIDDEN);
                case 404:
                    throw $this->errorFactory->create(CmsErr::ARTICLE_NOT_FOUND);
                default:
                    throw $this->errorFactory->create(CmsErr::CMS_UPDATE_ARTICLE_BY_ID_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(CmsErr::CMS_UPDATE_ARTICLE_BY_ID_FAILED));
        }
    }
    /**
     * Creates a FAQs page using the given FAQ input data.
     * @param FaqInputDto $faqInput Data transfer object for the FAQ input.
     * @return string The body content of the HTTP response.
     * @throws SherlException If the response status code is not successful.
     */
    public function createFaqsPage(FaqInputDto $faqInput)
    {
        try {
            $response = $this->client->post("/api/faqs", [
                "headers" => ["Content-Type" => "application/json"],
                RequestOptions::JSON => [
                    "question" => $faqInput->question,
                    "answer" => $faqInput->answer
                ]
            ]);
            switch ($response->getStatusCode()) {
                case 201:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        ArticleDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(CmsErr::CREATE_CMS_FAQS_FAILED_CMS_FORBIDDEN);
                default:
                    throw $this->errorFactory->create(CmsErr::CMS_CREATE_FAQS_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(CmsErr::CMS_CREATE_FAQS_FAILED));
        }
    }
    /**
     * Creates a posts page with the provided data.
     * @param array $data Data for creating the posts page.
     * @return string The body content of the HTTP response.
     * @throws SherlException If the response status code is not 201.
     */
    public function createPostsPage(array $data): string
    {
        try {
            $response = $this->client->post("/api/manage_articles", [
                "headers" => ["Content-Type" => "application/json"],
                RequestOptions::JSON => $data
            ]);

            switch ($response->getStatusCode()) {
                case 201:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        ArticleDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(CmsErr::CREATE_CMS_POSTS_FAILED_CMS_FORBIDDEN);
                default:
                    throw $this->errorFactory->create(CmsErr::CMS_CREATE_POSTS_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(CmsErr::CMS_CREATE_POSTS_FAILED));
        }
    }
    /**
     * Deletes an article by its identifier.
     * @param string $id The identifier for the article to delete.
     * @return string The body content of the HTTP response.
     * @throws SherlException If the response status code is not successful.
     */
    public function createStaticPage(array $data): string
    {
        try {
            $response = $this->client->post("/api/create_static", [
                "headers" => ["Content-Type" => "application/json"],
                RequestOptions::JSON => $data
            ]);


            switch ($response->getStatusCode()) {
                case 201:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        ArticleDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(CmsErr::CREATE_CMS_STATIC_PAGES_FAILED_FORBIDDEN);
                default:
                    throw $this->errorFactory->create(CmsErr::CMS_CREATE_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(CmsErr::CMS_CREATE_FAILED));
        }
    }
    /**
    * Creates a stories page with the provided data.
    * @param array $data Data for creating the stories page.
    * @return string The body content of the HTTP response.
    * @throws SherlException If the response status code is not 201.
    */
    public function createStoriesPage(array $data): string
    {
        try {
            $response = $this->client->post("/api/create_stories", [
                "headers" => ["Content-Type" => "application/json"],
                RequestOptions::JSON => $data
            ]);
            switch ($response->getStatusCode()) {
                case 201:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        ArticleDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(CmsErr::CREATE_CMS_STORIES_FAILED_CMS_FORBIDDEN);
                default:
                    throw $this->errorFactory->create(CmsErr::CMS_CREATE_STORIES_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(CmsErr::CMS_CREATE_STORIES_FAILED));
        }
    }
    /**
    * Creates a trainings page with the provided data.
    * @param array $data Data for creating the training page.
    * @return string The body content of the HTTP response.
    * @throws SherlException If the response status code is not 201.
    */
    public function createTrainingsPage(array $data): string
    {
        try {
            $response = $this->client->post("/api/create_training", [
                "headers" => ["Content-Type" => "application/json"],
                RequestOptions::JSON => $data
            ]);
            switch ($response->getStatusCode()) {
                case 201:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        ArticleDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(CmsErr::CREATE_CMS_TRAINING_FAILED_FORBIDDEN);
                default:
                    throw $this->errorFactory->create(CmsErr::CMS_CREATE_TRAININGS_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(CmsErr::CMS_CREATE_TRAININGS_FAILED));
        }
    }
    /**
    * Deletes a media page by its identifier.
    * @param string $id The identifier for the media page to delete.
    * @return string The body content of the HTTP response.
    */
    public function deleteArticleById(string $id): string
    {
        try {
            $endpoint = str_replace("{id}", $id, "/api/manage_posts/{id}");
            $response = $this->client->delete($endpoint);

            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        ArticleDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(CmsErr::CMS_DELETE_BY_ID_FAILED_CMS_FORBIDDEN);
                case 404:
                    throw $this->errorFactory->create(CmsErr::ARTICLE_NOT_FOUND);
                default:
                    throw $this->errorFactory->create(CmsErr::CMS_DELETE_BY_ID_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(CmsErr::CMS_DELETE_BY_ID_FAILED));
        }
    }
    /**
    * Retrieves an article by its identifier.
    * @param string $id The identifier for the article.
    * @return string The body content of the HTTP response.
    * @throws SherlException If the response status code is not 200.
    */
    public function deleteMediaPage(string $id): string
    {
        try {
            $endpoint = str_replace("{id}", $id, "/api/manage_media/{id}");
            $response = $this->client->delete($endpoint);

            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        ArticleDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(CmsErr::CREATE_CMS_MEDIA_FAILED_CMS_FORBIDDEN);
                case 404:
                    throw $this->errorFactory->create(CmsErr::ARTICLE_NOT_FOUND);
                default:
                    throw $this->errorFactory->create(CmsErr::CMS_DELETE_MEDIA_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(CmsErr::CMS_DELETE_MEDIA_FAILED));
        }
    }
    /**
    * Retrieves an article by its slug.
    * @param string $slug The slug for the article.
    * @return string The body content of the HTTP response.
    * @throws SherlException If the response status code is not 200.
    */
    public function getArticleById(string $id): string
    {
        try {
            $endpoint = str_replace("{id}", $id, "/api/manage_posts/{id}");
            $response = $this->client->get($endpoint);


            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        ArticleDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(CmsErr::CMS_GET_BY_ID_FAILED_POST_FORBIDDEN);
                case 404:
                    throw $this->errorFactory->create(CmsErr::ARTICLE_NOT_FOUND);
                default:
                    throw $this->errorFactory->create(CmsErr::CMS_GET_BY_ID_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(CmsErr::CMS_GET_BY_ID_FAILED));
        }
    }
    /**
    * Retrieves a list of posts filtered by the provided criteria.
    * @param array $filters Filters to apply to the posts retrieval.
    * @return string The body content of the HTTP response.
    * @throws SherlException If the response status code is not 200.
    */
    public function getArticleBySlug(string $slug): string
    {
        try {
            $endpoint = str_replace("{slug}", $slug, "/api/get_slug/{slug}");
            $response = $this->client->get($endpoint);
            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        ArticleDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(CmsErr::CMS_GET_SLUG_FAILED_ARTICLE_FORBIDDEN);
                case 404:
                    throw $this->errorFactory->create(CmsErr::ARTICLE_NOT_FOUND);
                default:
                    throw $this->errorFactory->create(CmsErr::CMS_GET_SLUG_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(CmsErr::CMS_GET_SLUG_FAILED));
        }
    }
    /**
    * Retrieves a public article by its identifier.
    * @param string $id The public identifier for the article.
    * @return string The body content of the HTTP response.
    * @throws SherlException If the response status code is not 200.
    */
    public function getPosts(array $filters): string
    {
        try {
            $response = $this->client->get("/api/manage_articles", [
                "query" => $filters
            ]);
            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        ArticleDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(CmsErr::CMS_GET_POSTS_FAILED_POSTS_FORBIDDEN);
                default:
                    throw $this->errorFactory->create(CmsErr::CMS_GET_POSTS_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(CmsErr::CMS_GET_POSTS_FAILED));
        }
    }
    /**
    * Retrieves a public article by its slug.
    * @param string $slug The slug for the public article.
    * @return string The body content of the HTTP response.
    * @throws SherlException If the response status code is not 200.
    */
    public function getPublicArticleById(string $id): string
    {
        try {
            $endpoint = str_replace("{id}", $id, "/api/manage_posts/{id}");
            $response = $this->client->get($endpoint);

            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        ArticleDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(CmsErr::CMS_GET_PUBLIC_FIND_ID_FAILED_POST_FORBIDDEN);
                case 404:
                    throw $this->errorFactory->create(CmsErr::ARTICLE_NOT_FOUND);
                default:
                    throw $this->errorFactory->create(CmsErr::CMS_GET_PUBLIC_FIND_ID_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(CmsErr::CMS_GET_PUBLIC_FIND_ID_FAILED));
        }
    }
    /**
    * Retrieves a list of public articles filtered by the provided criteria.
    * @param array $filters Filters to apply to the public articles retrieval.
    * @return string The body content of the HTTP response.
    * @throws SherlException If the response status code is not 200.
    */
    public function getPublicArticleBySlug(string $slug): string
    {
        try {
            $endpoint = str_replace("{slug}", $slug, "/api/get_article_by_slug/{slug}");
            $response = $this->client->get($endpoint);

            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        ArticleDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(CmsErr::CMS_GET_SLUG_FAILED_ARTICLE_FORBIDDEN);
                case 404:
                    throw $this->errorFactory->create(CmsErr::ARTICLE_NOT_FOUND);
                default:
                    throw $this->errorFactory->create(CmsErr::CMS_GET_SLUG_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(CmsErr::CMS_GET_SLUG_FAILED));
        }
    }

    /**
    * Retrieves a list of public articles filtered by the provided criteria.
    * @param array $filters Filters to apply for retrieving the public articles.
    * @return string The response content from the CMS containing the list of public articles.
    * @throws SherlException If the response status code is not 200.
    */
    public function getPublicArticles(array $filters): string
    {
        try {
            $response = $this->client->get("/api/get_public_articles", [
                "query" => $filters
            ]);
            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        ArticleDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(CmsErr::CMS_GET_PUBLIC_ARTICLES_FAILED_POSTS_FORBIDDEN);
                default:
                    throw $this->errorFactory->create(CmsErr::CMS_GET_PUBLIC_ARTICLES_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(CmsErr::CMS_GET_PUBLIC_ARTICLES_FAILED));
        }
    }
}
