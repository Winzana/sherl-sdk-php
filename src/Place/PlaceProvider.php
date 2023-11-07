<?php

namespace Sherl\Sdk\Place;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class PlaceProvider
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

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
            throw new SherlException(EtlErr::FETCH_FAILED, $e->getMessage());
        }
    }

    private function handleResponse(ResponseInterface $response)
    {
        if ($response->getStatusCode() !== 200) {
            throw new SherlException(EtlErr::FETCH_FAILED, $e->getMessage());
        }
    }
}
