<?php

namespace Sherl\Sdk\Notification;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

use Psr\Http\Message\ResponseInterface;

use Sherl\Sdk\Common\Error\SherlException;
use Sherl\Sdk\Common\Error\ErrorFactory;
use Sherl\Sdk\Common\Error\ErrorHelper;
use Sherl\Sdk\Search\Errors\SearchErr;
use Exception;

use Sherl\Sdk\Common\SerializerFactory;

use Sherl\Sdk\Search\Dto\SearchResultOutputDto;
use Sherl\Sdk\Search\Dto\SearchFiltersInputDto;

class SearchProvider
{
    public const DOMAIN = "Search";

    private Client $client;

    private ErrorFactory $errorFactory;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->errorFactory = new ErrorFactory(self::DOMAIN, SearchErr::$errors);
    }

    /**
     * Retrieves autocomplete search results for a public search based on the provided filters.
     *
     * @param SearchFiltersInputDto $filters The filters to apply to the search autocomplete query.
     * @return SearchResultOutputDto|null A list of search result output data objects or null on failure.
     * @throws SherlException If there is an error during the search autocomplete retrieval process.
     */
    public function getPublicSearchAutocomplete(SearchFiltersInputDto $filters): ?SearchResultOutputDto
    {
        try {
            $response = $this->client->get('/api/public/search/autocomplete', [
                "headers" => [
                  "Content-Type" => "application/json",
                ],
                RequestOptions::QUERY => $filters,
              ]);

            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        SearchResultOutputDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(SearchErr::SEARCH_FORBIDDEN);
                default:
                    throw $this->errorFactory->create(SearchErr::SEARCH_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(SearchErr::SEARCH_FAILED));
        }
    }
}
