<?php

namespace Sherl\Sdk\Cms;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;
use Sherl\Sdk\Common\Error\SherlException;
use Sherl\Sdk\Cms\Dto\ArticleInputDto;
use Sherl\Sdk\e\Cms\Dto\FaqInputDto;

class CmsProvider
{
    public const DOMAIN = "CMS";

    private Client $client;

    /**
     * CmsProvider constructor.
     * @param Client $client The HTTP client used to make requests.
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }


    /**
     * Throws a CMS exception.
     * @param ResponseInterface $response The response object to evaluate.
     * @throws SherlException If the response status code indicates an error.
     */

    private function throwCmsException(ResponseInterface $response)
    {
        throw new SherlException(CmsProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
    }
    /**
     * Adds a media page.
     * @param string $id The identifier for the media.
     * @param array $data The data to create the media page.
     * @return string The content of the body of the response.
     * @throws SherlException If the response status code indicates an error.
     */
    public function addMediaPage(string $id, array $data)
    {
        $response = $this->client->post("/api/media/$id", [
            "headers" => ["Content-Type" => "application/json"],
            RequestOptions::JSON => $data
        ]);

        if ($response->getStatusCode() >= 300) {
            $this->throwCmsException($response);
        }

        return $response->getBody()->getContents();
    }

    /**
     * Creates an article with the given ID and article input data.
     * @param string $id The ID associated with the article.
     * @param ArticleInputDto $articleInput Data transfer object for the article input.
     * @return string The body content of the HTTP response.
     * @throws SherlException If the response status code is not successful.
     */
    public function createArticleById(string $id, ArticleInputDto $articleInput)
    {
        $response = $this->client->post("/api/article/$id", [
            "headers" => ["Content-Type" => "application/json"],
            RequestOptions::JSON => [
                "title" => $articleInput->title,
                "content" => $articleInput->content

            ]
        ]);

        if ($response->getStatusCode() >= 300) {
            $this->throwCmsException($response);
        }

        return $response->getBody()->getContents();
    }
    /**
     * Creates a FAQs page using the given FAQ input data.
     * @param FaqInputDto $faqInput Data transfer object for the FAQ input.
     * @return string The body content of the HTTP response.
     * @throws SherlException If the response status code is not successful.
     */
    public function createFaqsPage(FaqInputDto $faqInput)
    {
        $response = $this->client->post("/api/faqs", [
            "headers" => ["Content-Type" => "application/json"],
            RequestOptions::JSON => [
                "question" => $faqInput->question,
                "answer" => $faqInput->answer
            ]
        ]);

        if ($response->getStatusCode() >= 300) {
            $this->throwCmsException($response);
        }

        return $response->getBody()->getContents();
    }
    /**
     * Creates a posts page with the provided data.
     * @param array $data Data for creating the posts page.
     * @return string The body content of the HTTP response.
     * @throws SherlException If the response status code is not 201.
     */
    public function createPostsPage(array $data): string
    {
        $response = $this->client->post("/api/manage_articles", [
            "headers" => ["Content-Type" => "application/json"],
            RequestOptions::JSON => $data
        ]);

        if ($response->getStatusCode() !== 201) {
            $this->throwCmsException($response);
        }

        return $response->getBody()->getContents();
    }
    /**
     * Deletes an article by its identifier.
     * @param string $id The identifier for the article to delete.
     * @return string The body content of the HTTP response.
     * @throws SherlException If the response status code is not successful.
     */
    public function createStaticPage(array $data): string
    {
        $response = $this->client->post("/api/create_static", [
            "headers" => ["Content-Type" => "application/json"],
            RequestOptions::JSON => $data
        ]);

        if ($response->getStatusCode() !== 201) {
            $this->throwCmsException($response);
        }

        return $response->getBody()->getContents();
    }
    /**
    * Creates a stories page with the provided data.
    * @param array $data Data for creating the stories page.
    * @return string The body content of the HTTP response.
    * @throws SherlException If the response status code is not 201.
    */
    public function createStoriesPage(array $data): string
    {
        $response = $this->client->post("/api/create_stories", [
            "headers" => ["Content-Type" => "application/json"],
            RequestOptions::JSON => $data
        ]);

        if ($response->getStatusCode() !== 201) {
            $this->throwCmsException($response);
        }

        return $response->getBody()->getContents();
    }
    /**
    * Creates a trainings page with the provided data.
    * @param array $data Data for creating the training page.
    * @return string The body content of the HTTP response.
    * @throws SherlException If the response status code is not 201.
    */
    public function createTrainingsPage(array $data): string
    {
        $response = $this->client->post("/api/create_training", [
            "headers" => ["Content-Type" => "application/json"],
            RequestOptions::JSON => $data
        ]);

        if ($response->getStatusCode() !== 201) {
            $this->throwCmsException($response);
        }

        return $response->getBody()->getContents();
    }
    /**
    * Deletes a media page by its identifier.
    * @param string $id The identifier for the media page to delete.
    * @return string The body content of the HTTP response.
    */
    public function deleteArticleById(string $id): string
    {
        $endpoint = str_replace("{id}", $id, "/api/manage_posts/{id}");
        $response = $this->client->delete($endpoint);

        return $response->getBody()->getContents();
    }
    /**
    * Retrieves an article by its identifier.
    * @param string $id The identifier for the article.
    * @return string The body content of the HTTP response.
    * @throws SherlException If the response status code is not 200.
    */
    public function deleteMediaPage(string $id): string
    {
        $endpoint = str_replace("{id}", $id, "/api/manage_media/{id}");
        $response = $this->client->delete($endpoint);

        return $response->getBody()->getContents();
    }
    /**
    * Retrieves an article by its slug.
    * @param string $slug The slug for the article.
    * @return string The body content of the HTTP response.
    * @throws SherlException If the response status code is not 200.
    */
    public function getArticleById(string $id): string
    {
        $endpoint = str_replace("{id}", $id, "/api/manage_posts/{id}");
        $response = $this->client->get($endpoint);

        if ($response->getStatusCode() !== 200) {
            $this->throwCmsException($response);
        }

        return $response->getBody()->getContents();
    }
    /**
    * Retrieves a list of posts filtered by the provided criteria.
    * @param array $filters Filters to apply to the posts retrieval.
    * @return string The body content of the HTTP response.
    * @throws SherlException If the response status code is not 200.
    */
    public function getArticleBySlug(string $slug): string
    {
        $endpoint = str_replace("{slug}", $slug, "/api/get_slug/{slug}");
        $response = $this->client->get($endpoint);

        if ($response->getStatusCode() !== 200) {
            $this->throwCmsException($response);
        }

        return $response->getBody()->getContents();
    }
    /**
    * Retrieves a public article by its identifier.
    * @param string $id The public identifier for the article.
    * @return string The body content of the HTTP response.
    * @throws SherlException If the response status code is not 200.
    */
    public function getPosts(array $filters): string
    {
        $response = $this->client->get("/api/manage_articles", [
            "query" => $filters
        ]);

        if ($response->getStatusCode() !== 200) {
            $this->throwCmsException($response);
        }

        return $response->getBody()->getContents();
    }
    /**
    * Retrieves a public article by its slug.
    * @param string $slug The slug for the public article.
    * @return string The body content of the HTTP response.
    * @throws SherlException If the response status code is not 200.
    */
    public function getPublicArticleById(string $id): string
    {
        $endpoint = str_replace("{id}", $id, "/api/manage_posts/{id}");
        $response = $this->client->get($endpoint);

        if ($response->getStatusCode() !== 200) {
            $this->throwCmsException($response);
        }

        return $response->getBody()->getContents();
    }
    /**
    * Retrieves a list of public articles filtered by the provided criteria.
    * @param array $filters Filters to apply to the public articles retrieval.
    * @return string The body content of the HTTP response.
    * @throws SherlException If the response status code is not 200.
    */
    public function getPublicArticleBySlug(string $slug): string
    {
        $endpoint = str_replace("{slug}", $slug, "/api/get_article_by_slug/{slug}");
        $response = $this->client->get($endpoint);

        if ($response->getStatusCode() !== 200) {
            $this->throwCmsException($response);
        }

        return $response->getBody()->getContents();
    }

    /**
    * Retrieves a list of public articles filtered by the provided criteria.
    * @param array $filters Filters to apply for retrieving the public articles.
    * @return string The response content from the CMS containing the list of public articles.
    * @throws SherlException If the response status code is not 200.
    */
    public function getPublicArticles(array $filters): string
    {
        $response = $this->client->get("/api/get_public_articles", [
            "query" => $filters
        ]);

        if ($response->getStatusCode() !== 200) {
            $this->throwCmsException($response);
        }

        return $response->getBody()->getContents();
    }
}
