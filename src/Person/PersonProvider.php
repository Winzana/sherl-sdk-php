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

    public function getConfig(): ?ConfigDto
    {
        try {
            $response = $this->client->get('/api/persons/config', [
                "headers" => [
                  "Content-Type" => "application/json",
                ]
          ]);

            if ($response->getStatusCode() >= 400) {
                throw new SherlException(PersonProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
            }

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ConfigDto::class,
                'json'
            );
        } catch (\Exception $e) {
            throw new SherlException(SherlException::FETCH_FAILED, $e->getMessage());
        }

    }

    /**
    * @return Pagination<LocationDto>|null
    */
    public function getCurrentAddress(GeoCoordinatesDto $position)
    {
        try {
            $response = $this->client->get('/api/persons/current-address', [
                "headers" => [
                  "Content-Type" => "application/json",
                ],
                RequestOptions::QUERY => $position
          ]);

            if ($response->getStatusCode() >= 400) {
                throw new SherlException(PersonProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
            }

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                LocationDto::class,
                'json'
            );
        } catch (\Exception $e) {
            throw new SherlException(SherlException::FETCH_FAILED, $e->getMessage());
        }

    }

    /**
    * @return Pagination<PersonOuputDto>|null
    */
    public function getPersons(
        $page = 1,
        $itemsPerPage = 10,
        PersonFiltersDto $filters
    ) {
        try {
            $response = $this->client->get(
                '/api/persons',
                [
                    RequestOptions::QUERY => [
                        'filters' => $filters,
                        'page' => $page,
                        'itemsPerPage' => $itemsPerPage,
                      ]
          ]
            );

            if ($response->getStatusCode() >= 400) {
                throw new SherlException(PersonProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
            }

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                PersonOutputDto::class,
                'json'
            );
        } catch (\Exception $e) {
            throw new SherlException(SherlException::FETCH_FAILED, $e->getMessage());
        }

    }

    public function getPersonById(
        string $id,
    ): ?PersonOuputDto {
        try {
            $response = $this->client->get(
                "/api/persons/$id"
            );

            if ($response->getStatusCode() >= 400) {
                throw new SherlException(PersonProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
            }

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                PersonOutputDto::class,
                'json'
            );
        } catch (\Exception $e) {
            throw new SherlException(SherlException::FETCH_FAILED, $e->getMessage());
        }

    }

    public function createAddress(AddressInputDto $address): ?PersonOutputDto
    {
        try {
            $response = $this->client->post(
                '/api/persons/addresses',
                [
                    "headers" => [
                      "Content-Type" => "application/json",
                    ],
                    RequestOptions::JSON => $address
                  ]
            );

            if ($response->getStatusCode() >= 400) {
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
        } catch (\Exception $e) {
            throw new SherlException(SherlException::FETCH_FAILED, $e->getMessage());
        }

    }

    public function deleteAddress(string $id): ?PersonOutputDto
    {
        try {
            $response = $this->client->delete(
                "/api/persons/addresses/$id",
                [
                    "headers" => [
                      "Content-Type" => "application/json",
                    ],
                  ]
            );

            if ($response->getStatusCode() >= 400) {
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
        } catch (\Exception $e) {
            throw new SherlException(SherlException::FETCH_FAILED, $e->getMessage());
        }
    }

    public function updateAddress(string $addressId, AddressInputDto $address): ?PersonOutputDto
    {
        try {
            $response = $this->client->put(
                "/api/persons/addresses/$addressId",
                [
                    "headers" => [
                      "Content-Type" => "application/json",
                    ],
                    RequestOptions::JSON => $address
                ]
            );

            if ($response->getStatusCode() >= 400) {
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
        } catch (\Exception $e) {
            throw new SherlException(SherlException::FETCH_FAILED, $e->getMessage());
        }
    }

    public function createPerson(PersonCreateInputDto $person): ?PersonOutputDto
    {
        try {
            $response = $this->client->post(
                '/api/persons',
                [
                    "headers" => [
                      "Content-Type" => "application/json",
                    ],
                    RequestOptions::JSON => $person
                ]
            );

            if ($response->getStatusCode() >= 400) {
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
        } catch (\Exception $e) {
            throw new SherlException(SherlException::FETCH_FAILED, $e->getMessage());
        }

    }

    public function registerWithEmailAndPassword(PersonCreateInputDto $person): ?PersonOutputDto
    {
        try {
            $response = $this->client->post(
                '/api/persons/register-with-email-and-password',
                [
                    "headers" => [
                      "Content-Type" => "application/json",
                    ],
                    RequestOptions::JSON => $person
                ]
            );

            if ($response->getStatusCode() >= 400) {
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
        } catch (\Exception $e) {
            throw new SherlException(SherlException::FETCH_FAILED, $e->getMessage());
        }

    }

    public function addPersonPicture(PictureRegisterInputDto $picture): ?PersonOutputDto
    {
        $userId = $picture['person'];
        $mediaId = $picture['mediaId'];
        try {
            $response = $this->client->post("/api/persons/$userId/picture/create/$mediaId", [
            'multipart' => [
                [
                    'name'     => 'file',
                    'contents' => fopen($picture['file']->getRealPath(), 'r'),
                    'filename' => $picture['file']->getClientOriginalName(),
                    'headers'  => ['Content-Type' => $picture['file']->getClientMimeType()]
                ]
            ]
            ]);

            if ($response->getStatusCode() >= 400) {
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
        } catch (\Exception $e) {
            throw new SherlException(SherlException::FETCH_FAILED, $e->getMessage());
        }

    }

    public function updatePersonById(string $id, PersonUpdateInputDto $person): ?PersonOutputDto
    {
        try {
            $response = $this->client->put(
                "/api/persons/$id",
                [
                    "headers" => [
                      "Content-Type" => "application/json",
                    ],
                    RequestOptions::JSON => $person
                ]
            );

            if ($response->getStatusCode() >= 400) {
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
        } catch (\Exception $e) {
            throw new SherlException(SherlException::FETCH_FAILED, $e->getMessage());
        }

    }
    public function getMe(): ?PersonOutputDto
    {
        try {
            $response = $this->client->get('/api/persons/me', [
                "headers" => [
                  "Content-Type" => "application/json",
                ]]);

            if ($response->getStatusCode() >= 400) {
                throw new SherlException(PersonProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
            }

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                PersonOutputDto::class,
                'json'
            );
        } catch (\Exception $e) {
            throw new SherlException(SherlException::FETCH_FAILED, $e->getMessage());
        }

    }
}
