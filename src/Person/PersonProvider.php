<?php

namespace Sherl\Sdk\Person;

use GuzzleHttp\Client;
use Sherl\Sdk\Common\SerializerFactory;
use Sherl\Sdk\Person\Dto\PersonOutputDto;

class PersonProvider
{

  private Client $client;

  public function __construct(Client $client)
  {
    $this->client = $client;
  }

  public function getMe(): PersonOutputDto
  {
    $response = $this->client->get('/api/persons/me');
    return SerializerFactory::getInstance()->deserialize(
      $response->getBody()->getContents(),
      PersonOutputDto::class,
      'json'
    );
  }
}
