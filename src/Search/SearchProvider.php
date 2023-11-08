<?php

namespace Sherl\Sdk\Notification;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

use Psr\Http\Message\ResponseInterface;

use Sherl\Sdk\Common\Error\SherlException;
use Sherl\Sdk\Common\SerializerFactory;

use Sherl\Sdk\Notification\Dto\NotificationFiltersInputDto;

class SearchProvider
{
    public const DOMAIN = "Search";

    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    private function throwSherlSearchException(ResponseInterface $response)
    {
        throw new SherlException(SearchProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
    }

    public function getPublicSearchAutocomplete(SearchFiltersInputDto $filters): ?SearchResultOutputDto
    {
        $response = $this->client->get('/api/public/search/autocomplete', [
          "headers" => [
            "Content-Type" => "application/json",
          ],
          RequestOptions::QUERY => $filters,
        ]);

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlNotificationException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            SearchResultOutputDto::class,
            'json'
        );
    }
}
