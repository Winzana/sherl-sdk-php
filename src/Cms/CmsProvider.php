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

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    private function throwCmsException(ResponseInterface $response)
    {
        throw new SherlException(CmsProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
    }

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

    public function createArticleById(string $id, ArticleInputDto $articleInput)
    {
        $response = $this->client->post("/api/article/$id", [
            "headers" => ["Content-Type" => "application/json"],
            RequestOptions::JSON => [
                "title" => $articleInput->title,
                "content" => $articleInput->content
                // Ajoutez d'autres champs si nécessaire
            ]
        ]);

        if ($response->getStatusCode() >= 300) {
            $this->throwCmsException($response);
        }

        return $response->getBody()->getContents();
    }

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
public function deleteArticleById(string $id): string
{
    $endpoint = str_replace("{id}", $id, "/api/manage_posts/{id}");
    $response = $this->client->delete($endpoint);

    return $response->getBody()->getContents();
}

public function deleteMediaPage(string $id): string
{
    $endpoint = str_replace("{id}", $id, "/api/manage_media/{id}");
    $response = $this->client->delete($endpoint);

    return $response->getBody()->getContents();
}

public function getArticleById(string $id): string
{
    $endpoint = str_replace("{id}", $id, "/api/manage_posts/{id}");
    $response = $this->client->get($endpoint);

    if ($response->getStatusCode() !== 200) {
        $this->throwCmsException($response);
    }

    return $response->getBody()->getContents();
}

public function getArticleBySlug(string $slug): string
{
    $endpoint = str_replace("{slug}", $slug, "/api/get_slug/{slug}");
    $response = $this->client->get($endpoint);

    if ($response->getStatusCode() !== 200) {
        $this->throwCmsException($response);
    }

    return $response->getBody()->getContents();
}

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

public function getPublicArticleById(string $id): string
{
    $endpoint = str_replace("{id}", $id, "/api/manage_posts/{id}");
    $response = $this->client->get($endpoint);

    if ($response->getStatusCode() !== 200) {
        $this->throwCmsException($response);
    }

    return $response->getBody()->getContents();
}

public function getPublicArticleBySlug(string $slug): string
{
    $endpoint = str_replace("{slug}", $slug, "/api/get_article_by_slug/{slug}");
    $response = $this->client->get($endpoint);

    if ($response->getStatusCode() !== 200) {
        $this->throwCmsException($response);
    }

    return $response->getBody()->getContents();
}

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
