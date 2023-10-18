<?php

namespace Sherl\Sdk\Person;

use Exception;
use GuzzleHttp\Client;
use Sherl\Sdk\Common\SerializerFactory;

use Sherl\Sdk\Person\Dto\PersonOutputDto;
use Sherl\Sdk\Common\Dto\LocationDto;
use Sherl\Sdk\Common\Dto\ConfigDto;
use Sherl\Sdk\Place\Dto\GeoCoordinatesDto;

use Sherl\Sdk\Common\Error\SherlException;


class PersonProvider
{
  public const DOMAIN = 'Person';

  private Client $client;

  public function __construct(Client $client)
  {
    $this->client = $client;
  }

  public function getMe(): ?PersonOutputDto
  {
    $response = $this->client->get('/api/persons/me');

    if ($response->getStatusCode() >= 300) {
      throw new SherlException(PersonProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
    }

    return SerializerFactory::getInstance()->deserialize(
      $response->getBody()->getContents(),
      PersonOutputDto::class,
      'json'
    );
  }

  public function getConfig(): ?ConfigDto
  {
    $response = $this->client->get('/api/persons/config');

    if ($response->getStatusCode() >= 300) {
      throw new SherlException(PersonProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
    }

    return SerializerFactory::getInstance()->deserialize(
      $response->getBody()->getContents(),
      ConfigDto::class,
      'json'
    );
  }

  /**
  * @return Pagination<LocationDto>|null
  */
  public function getCurrentAddress(GeoCoordinatesDto $position)
  {
    $response = $this->client->get('/api/persons/me');

    if ($response->getStatusCode() >= 300) {
      throw new SherlException(PersonProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
    }

    return SerializerFactory::getInstance()->deserialize(
      $response->getBody()->getContents(),
      LocationDto::class,
      'json'
    );
  }

  /**
  * @return Pagination<PersonDto>|null
  */
  public function getPersons(
    $page = 1,
    $itemsPerPage = 10,
    PersonFiltersDto $filters
  ) 
  {
    $response = $fetcher->get(
      '/api/persons',
      [
          'page' => $page,
          'itemsPerPage' => $itemsPerPage,
          ...$filters,
      ]
    );

    if ($response->getStatusCode() >= 300) {
      throw new SherlException(PersonProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
    }

    return SerializerFactory::getInstance()->deserialize(
      $response->getBody()->getContents(),
      PersonOutputDto::class,
      'json'
    );
  }

  public function getPersonById(
    string $id,
  ): ?PersonDto
  {
    $response = $fetcher->get(
      '/api/persons/:id',
      [
          'id' => $id
      ]
    );

    if ($response->getStatusCode() >= 300) {
      throw new SherlException(PersonProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
    }

    return SerializerFactory::getInstance()->deserialize(
      $response->getBody()->getContents(),
      PersonOutputDto::class,
      'json'
    );
  }

  public function createAddress(AddressDto $address): ?PersonOutputDto
  {
    $response = $fetcher->post(
      '/api/persons/addresses',
      $address
    );

    if ($response->getStatusCode() >= 300) {
      throw new SherlException(
          PersonProvider::DOMAIN,
          $response->getBody()->getContents(),
          $response->getStatusCode()
      );
    }

    return SerializerFactory::getInstance()->deserialize(
      $response->getBody()->getContents(),
      PersonOutputDto::class,
      'json'
    );
  }

}
