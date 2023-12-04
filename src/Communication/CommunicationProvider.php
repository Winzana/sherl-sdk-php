<?php

namespace Sherl\Sdk\Notification;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

use Psr\Http\Message\ResponseInterface;

use Sherl\Sdk\Common\Error\SherlException;
use Sherl\Sdk\Common\SerializerFactory;

use Sherl\Sdk\Communication\Dto\CommunicationOutputDto;
use Sherl\Sdk\Communication\Dto\CommunicationFindByInputDto;

class CommunicationProvider
{
    public const DOMAIN = "Communication";

    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    private function throwSherlNotificationException(ResponseInterface $response)
    {
        throw new SherlException(NotificationProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
    }

    /**
     * Retrieves communication data based on the provided filters.
     *
     * @param CommunicationFindByInputDto $filters The filters to apply to the communication query.
     * @return CommunicationOutputDto|null The communication output data object or null on failure.
     * @throws SherlException If there is an error during the communication retrieval process.
     */
    public function getCommunication(CommunicationFindByInputDto $filters): ?CommunicationOutputDto
    {
        $response = $this->client->get('/api/communications', [
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
            CommunicationOutputDto::class,
            'json'
        );
    }
}
