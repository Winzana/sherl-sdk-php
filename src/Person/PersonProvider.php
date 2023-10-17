<?php

namespace Sherl\Sdk\Person;

use Exception;
use GuzzleHttp\Client;
use Sherl\Sdk\Common\SerializerFactory;

use Sherl\Sdk\Person\Dto\PersonOutputDto;
use Sherl\Sdk\Common\Dto\LocationDto;

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

  /**
  * @return Pagination<LocationDto>|null
  */
  public function getCurrentAddress()
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

  public function getPersons(
    $page = 1,
    $itemsPerPage = 10,
    PersonFiltersDto $filters
  ) 
  {

  }

//   public function function getPersons(
//     Fetcher $fetcher,
//     $page = 1,
//     $itemsPerPage = 10,
//     IPersonFilters $filters
// ): Pagination<IPerson> {
//     $response = $fetcher->get(
//         endpoints::GET_PERSONS,
//         [
//             'page' => $page,
//             'itemsPerPage' => $itemsPerPage,
//             ...$filters,
//         ]
//     );

//     if ($response->getStatusCode() !== 200) {
//         throw new Exception(
//             "Failed to fetch products API (status: " . $response->getStatusCode() . ")"
//         );
//     }

//     return $response->getData();
// }

}
