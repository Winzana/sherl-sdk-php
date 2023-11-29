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

    /**
     * Retrieves the configuration settings for the person module.
     *
     * @return ConfigDto|null The configuration data transfer object or null if not found.
     * @throws SherlException If there is an error while fetching the configuration.
     */
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
     * Gets the current address based on geo-coordinates.
     *
     * @param GeoCoordinatesDto $position The geo-coordinates data object.
     * @return Pagination<LocationDto>|null A paginated list of location data transfer objects or null if not found.
     * @throws SherlException If there is an error while fetching the address.
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
     * Retrieves a paginated list of persons based on filters, page, and items per page.
     *
     * @param int $page The number of the current page.
     * @param int $itemsPerPage The number of items per page.
     * @param PersonFiltersDto $filters The filters to apply to the person list.
     * @return Pagination<PersonOutputDto>|null A paginated list of person output data transfer objects or null if none found.
     * @throws SherlException If there is an error while fetching the persons.
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

    /**
     * Retrieves a person by their unique identifier.
     *
     * @param string $id The unique identifier of the person.
     * @return PersonOutputDto|null A person data object or null if not found.
     * @throws SherlException If there is an error while fetching the person data.
     */
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

    /**
     * Creates a new address for a person.
     *
     * @param AddressInputDto $address The address data object for address creation.
     * @return PersonOutputDto|null The person data object or null if the operation fails.
     * @throws SherlException If there is an error while creating the address.
     */
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

    /**
     * Deletes an address by its unique identifier.
     *
     * @param string $id The unique identifier of the address to be deleted.
     * @return PersonOutputDto|null The person data object or null if the deletion fails.
     * @throws SherlException If there is an error while deleting the address.
     */
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

    /**
     * Updates an existing address with new information.
     *
     * @param string $addressId The unique identifier of the address to update.
     * @param AddressInputDto $address The data object containing the new address details.
     * @return PersonOutputDto|null The person data object with the updated address or null if the update fails.
     * @throws SherlException If there is an error while updating the address.
     */
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

    /**
     * Creates a new person.
     *
     * @param PersonCreateInputDto $person The data object for person creation.
     * @return PersonOutputDto|null The newly created person data transfer object or null if the operation fails.
     * @throws SherlException If there is an error while creating the person.
     */
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

    /**
     * Registers a person using their email and password.
     *
     * @param PersonCreateInputDto $person The data object containing registration details.
     * @return PersonOutputDto|null The registered person's data object or null if registration fails.
     * @throws SherlException If there is an error during registration.
     */
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

    /**
     * Adds a picture to a person's profile.
     *
     * @param PictureRegisterInputDto $picture The data object containing the picture and associated details.
     * @return PersonOutputDto|null The person data object with the new picture or null if the operation fails.
     * @throws SherlException If there is an error while adding the picture.
     */
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

    /**
     * Updates a person's information by their unique identifier.
     *
     * @param string $id The unique identifier of the person to update.
     * @param PersonUpdateInputDto $person The data object containing the person's new details.
     * @return PersonOutputDto|null The updated person data object or null if the update fails.
     * @throws SherlException If there is an error while updating the person's information.
     */
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

    /**
     * Retrieves the personal details of the current authenticated user.
     *
     * @return PersonOutputDto|null The person data object for the authenticated user or null if not found.
     * @throws SherlException If there is an error while fetching the user's details.
     */
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
