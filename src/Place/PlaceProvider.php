<?php

namespace Sherl\Sdk\Place;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use Exception;
use Sherl\Sdk\Common\SerializerFactory;
use Sherl\Sdk\Common\Error\ErrorFactory;
use Sherl\Sdk\Place\Errors\PlaceErr;
use Sherl\Sdk\Place\Dto\PlaceOutputDto;
use Sherl\Sdk\Place\Dto\PlaceFindByInputDto;
use GuzzleHttp\RequestOptions;

class PlaceProvider
{
    private Client $client;
    private ErrorFactory $errorFactory;

    public const DOMAIN = "Place";
    /**
     * PlaceProvider constructor.
     * @param Client $client The HTTP client used to send requests to the API.
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->errorFactory = new ErrorFactory(self::DOMAIN, PlaceErr::$errors);
    }
    /**
     * Retrieves a list of places with pagination and optional filters.
     *
     * @param int $page The page number for pagination.
     * @param int $itemsPerPage The number of items to display per page.
     * @param PlaceFindByInputDto $filters Optional filters to apply to the place retrieval.
     * @return PlaceOutputDto|null An array of places matching the criteria.
     */
    public function getPlaces(PlaceFindByInputDto $filters, int $page = 1, int $itemsPerPage = 10): ?PlaceOutputDto
    {
        try {

            $additionalParams = [
                'page' => $page,
                'itemsPerPage' => $itemsPerPage,
            ];

            $queryParams = array_merge($additionalParams, [
                'id' => $filters->id,
                'uri' => $filters->uri,
                'language' => $filters->language,
                'consumerId' => $filters->consumerId,
                'query' => $filters->query,
                'city' => $filters->city,
            ]);
            $response = $this->client->get('/api/public/places', [

                RequestOptions::QUERY => $queryParams,
            ]);
            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                PlaceOutputDto::class,
                'json'
            );
        } catch (\Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(PlaceErr::FETCH_PLACES_FORBIDDEN);

                }
            }
            throw $this->errorFactory->create(PlaceErr::FETCH_PLACES_FAILED);
        }
    }
}
