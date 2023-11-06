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