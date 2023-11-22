<?php

namespace Sherl\Sdk\Person;

use Exception;
use GuzzleHttp\Client;
use Sherl\Sdk\Common\SerializerFactory;
use Sherl\Sdk\Person\Dto\PersonOutputDto;

use Sherl\Sdk\Common\Error\SherlException;

class PersonProvider
{
    public const DOMAIN = 'Person';

    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    private function throwSherlPersonException(ResponseInterface $response)
    {
        throw new SherlException(PersonProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
    }

    public function getMe(): ?PersonOutputDto
    {
        $response = $this->client->get('/api/persons/me', [
            "headers" => [
              "Content-Type" => "application/json",
            ]
          ]);

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlPersonException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            PersonOutputDto::class,
            'json'
        );
    }
}
