<?php

namespace Sherl\Sdk\Place;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class PlaceProvider
{
    private Client $client;

    /**
     * PlaceProvider constructor.
     * @param Client $client The HTTP client used to send requests to the API.
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }
    /**
     * Retrieves a list of places with pagination and optional filters.
     * @param int $page The page number for pagination.
     * @param int $itemsPerPage The number of items to display per page.
     * @param array $filters Optional filters to apply to the place retrieval.
     * @return array An array of places matching the criteria.
     * @throws SherlException If the fetching of places fails.
     */
    public function getPlaces(int $page = 1, int $itemsPerPage = 10, array $filters = []): array
    {
        try {
            $response = $this->client->get('/api/public/places', [
                'query' => array_merge(
                    [
                        'page' => $page,
                        'itemsPerPage' => $itemsPerPage
                    ],
                    $filters
                )
            ]);

            $this->handleResponse($response);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                LeTypeAttendu::class,
                'json'
            );

        } catch (\Exception $e) {
            throw new SherlException(PlaceErr::FETCH_FAILED, $e->getMessage());
        }
    }
    /**
     * Handles the response from the API call.
     * @param ResponseInterface $response The response from the API call.
     * @throws SherlException If the response status code is not 200.
     */
    private function handleResponse(ResponseInterface $response)
    {
        if ($response->getStatusCode() !== 200) {
            throw new SherlException(PlaceErr::FETCH_FAILED, $e->getMessage());
        }
    }
}
