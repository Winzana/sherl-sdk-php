<?php

namespace Sherl\Sdk\Person;

use GuzzleHttp\Client;
use Sherl\Sdk\Common\SerializerFactory;

use Sherl\Sdk\Person\Dto\PersonOutputDto;
use Sherl\Sdk\Common\Dto\LocationDto;
use Sherl\Sdk\Common\Dto\ConfigDto;
use Sherl\Sdk\Place\Dto\GeoCoordinatesDto;
use Sherl\Sdk\Person\Dto\PersonFiltersDto;
use Sherl\Sdk\Person\Dto\AddressInputDto;
use Sherl\Sdk\Person\Dto\PersonCreateInputDto;
use Sherl\Sdk\Person\Dto\PersonUpdateInputDto;
use Sherl\Sdk\Person\Dto\PictureRegisterInputDto;

use GuzzleHttp\RequestOptions;
use Sherl\Sdk\Common\Error\SherlException;
use Sherl\Sdk\Common\Error\ErrorFactory;
use Sherl\Sdk\Common\Error\ErrorHelper;
use Sherl\Sdk\Person\Errors\PersonErr;
use Exception;

class PersonProvider
{
    public const DOMAIN = 'Person';

    private Client $client;

    private ErrorFactory $errorFactory;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->errorFactory = new ErrorFactory(self::DOMAIN, PersonErr::$errors);
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

            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        ConfigDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(PersonErr::GET_CONFIGS_FORBIDDEN);
                default:
                    throw $this->errorFactory->create(PersonErr::GET_CONFIGS_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(PersonErr::GET_CONFIGS_FAILED));
        }
    }

    /**
     * Gets the current address based on geo-coordinates.
     *
     * @param GeoCoordinatesDto $position The geo-coordinates data object.
     * @return LocationDto|null A list of location data transfer objects or null if not found.
     * @throws SherlException If there is an error while fetching the address.
     */
    public function getCurrentAddress(GeoCoordinatesDto $position): ?LocationDto
    {
        try {
            $response = $this->client->get('/api/persons/current-address', [
                "headers" => [
                  "Content-Type" => "application/json",
                ],
                RequestOptions::QUERY => $position
            ]);

            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        LocationDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(PersonErr::FETCH_POSITION_FORBIDDEN);
                default:
                    throw $this->errorFactory->create(PersonErr::FETCH_POSITION_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(PersonErr::FETCH_POSITION_FAILED));
        }

    }

    /**
     * Retrieves a list of persons based on filters, page, and items per page.
     *
     * @param int $page The number of the current page.
     * @param int $itemsPerPage The number of items per page.
     * @param PersonFiltersDto $filters The filters to apply to the person list.
     * @return PersonOutputDto|null A list of person output data transfer objects or null if none found.
     * @throws SherlException If there is an error while fetching the persons.
     */
    public function getPersons(PersonFiltersDto $filters, $page = 1, $itemsPerPage = 10): ?PersonOutputDto
    {
        try {
            $response = $this->client->get('/api/persons', [
                "headers" => [
                  "Content-Type" => "application/json",
                ],
                RequestOptions::QUERY => [
                    'filters' => $filters,
                    'page' => $page,
                    'itemsPerPage' => $itemsPerPage,
                ]
            ]);

            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        PersonOutputDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(PersonErr::FETCH_PERSONS_FORBIDDEN);
                default:
                    throw $this->errorFactory->create(PersonErr::FETCH_PERSONS_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(PersonErr::FETCH_PERSONS_FAILED));
        }
    }

    /**
     * Retrieves a person by their unique identifier.
     *
     * @param string $id The unique identifier of the person.
     * @return PersonOutputDto|null A person data object or null if not found.
     * @throws SherlException If there is an error while fetching the person data.
     */
    public function getPersonById(string $id): ?PersonOutputDto
    {
        try {
            $response = $this->client->get("/api/persons/$id", [
                "headers" => [
                  "Content-Type" => "application/json",
                ]
            ]);

            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        PersonOutputDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(PersonErr::GET_PERSON_BY_ID_FORBIDDEN);
                case 404:
                    throw $this->errorFactory->create(PersonErr::PERSON_NOT_FOUND);
                default:
                    throw $this->errorFactory->create(PersonErr::GET_PERSON_BY_ID_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(PersonErr::GET_PERSON_BY_ID_FAILED));
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
            $response = $this->client->post("/api/persons/addresses", [
                "headers" => [
                  "Content-Type" => "application/json",
                ],
                RequestOptions::JSON => $address
            ]);

            switch ($response->getStatusCode()) {
                case 201:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        PersonOutputDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(PersonErr::CREATE_ADDRESS_FORBIDDEN);
                default:
                    throw $this->errorFactory->create(PersonErr::CREATE_ADDRESS_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(PersonErr::CREATE_ADDRESS_FAILED));
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
            $response = $this->client->delete("/api/persons/addresses/$id", [
                "headers" => [
                  "Content-Type" => "application/json",
                ],
            ]);

            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        PersonOutputDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(PersonErr::DELETE_ADDRESS_FORBIDDEN);
                case 404:
                    throw $this->errorFactory->create(PersonErr::ADDRESS_NOT_FOUND);
                default:
                    throw $this->errorFactory->create(PersonErr::DELETE_ADDRESS_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(PersonErr::DELETE_ADDRESS_FAILED));
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
            $response = $this->client->put("/api/persons/addresses/$addressId", [
                "headers" => [
                  "Content-Type" => "application/json",
                ],
                RequestOptions::JSON => $address
            ]);

            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        PersonOutputDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(PersonErr::UPDATE_ADDRESS_FORBIDDEN);
                case 404:
                    throw $this->errorFactory->create(PersonErr::ADDRESS_NOT_FOUND);
                default:
                    throw $this->errorFactory->create(PersonErr::UPDATE_ADDRESS_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(PersonErr::UPDATE_ADDRESS_FAILED));
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
            $response = $this->client->post("/api/persons", [
                "headers" => [
                  "Content-Type" => "application/json",
                ],
                RequestOptions::JSON => $person
            ]);

            switch ($response->getStatusCode()) {
                case 201:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        PersonOutputDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(PersonErr::CREATE_PERSON_FORBIDDEN);
                default:
                    throw $this->errorFactory->create(PersonErr::CREATE_PERSON_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(PersonErr::CREATE_PERSON_FAILED));
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
            $response = $this->client->post("/api/persons/register-with-email-and-password", [
                "headers" => [
                  "Content-Type" => "application/json",
                ],
                RequestOptions::JSON => $person
            ]);

            switch ($response->getStatusCode()) {
                case 201:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        PersonOutputDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(PersonErr::REGISTER_PERSON_FORBIDDEN);
                default:
                    throw $this->errorFactory->create(PersonErr::REGISTER_PERSON_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(PersonErr::REGISTER_PERSON_FAILED));
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
        $userId = $picture->person;
        $mediaId = $picture->mediaId;

        try {
            $formData = new \GuzzleHttp\Psr7\MultipartStream([
                [
                    'name' => 'upload',
                    'contents' => $picture->file->getStream(),
                    'filename' => $picture->file->getClientFilename(),
                    'headers'  => ['Content-Type' => $picture->file->getClientMediaType()]
                ]
            ]);

            $response = $this->client->post(
                "/api/persons/$userId/picture/create/$mediaId",
                [
                'headers' => ['Content-Type' => 'multipart/form-data'],
                'body' => $formData,
            ]
            );

            switch ($response->getStatusCode()) {
                case 201:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        PersonOutputDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(PersonErr::ADD_PICTURE_FORBIDDEN);
                default:
                    throw $this->errorFactory->create(PersonErr::ADD_PICTURE_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(PersonErr::ADD_PICTURE_FAILED));
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
            $response = $this->client->put("/api/persons/$id", [
                "headers" => [
                  "Content-Type" => "application/json",
                ],
                RequestOptions::JSON => $person
            ]);

            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        PersonOutputDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(PersonErr::UPDATE_PERSON_BY_ID_FORBIDDEN);
                case 404:
                    throw $this->errorFactory->create(PersonErr::PERSON_NOT_FOUND);
                default:
                    throw $this->errorFactory->create(PersonErr::UPDATE_PERSON_BY_ID_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(PersonErr::UPDATE_PERSON_BY_ID_FAILED));
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
            $response = $this->client->get("/api/persons/me", [
                "headers" => [
                    "Content-Type" => "application/json",
                ],
            ]);

            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        PersonOutputDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(PersonErr::GET_ME_FORBIDDEN);
                default:
                    throw $this->errorFactory->create(PersonErr::GET_ME_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(PersonErr::GET_ME_FAILED));
        }
    }
}
