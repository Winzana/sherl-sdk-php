<?php

namespace Sherl\Sdk\Place;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

use Sherl\Sdk\Common\Error\ErrorFactory;
use Sherl\Sdk\Common\Error\ErrorHelper;
use Sherl\Sdk\Place\Errors\PlaceErr;

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
        $this->errorFactory = new ErrorFactory('Quotas', QuotasErr::$errors);
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
            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        IPlace::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(PlaceErr::FETCH_PLACES_FORBIDDEN);
                default:
                    throw $this->errorFactory->create(PlaceErr::FETCH_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(PlaceErr::FETCH_FAILED));
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
