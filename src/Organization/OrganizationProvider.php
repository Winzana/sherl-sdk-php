<?php

namespace Sherl\Sdk\Notification;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

use Psr\Http\Message\ResponseInterface;

use Sherl\Sdk\Common\Error\SherlException;
use Sherl\Sdk\Common\Error\ErrorFactory;
use Sherl\Sdk\Common\Error\ErrorHelper;
use Sherl\Sdk\Organization\Errors\OrganizationErr;
use Exception;

use Sherl\Sdk\Common\SerializerFactory;

use Sherl\Sdk\Organization\Dto\OrganizationFiltersDto;
use Sherl\Sdk\Organization\Dto\OrganizationOutputDto;
use Sherl\Sdk\Organization\Dto\OrganizationInputDto;
use Sherl\Sdk\Organization\Dto\RegisterOrganizationRequestInputDto;
use Sherl\Sdk\Organization\Dto\SuggestOrganizationRequestInputDto;
use Sherl\Sdk\Organization\Dto\UpdateOrganizationInputDto;
use Sherl\Sdk\Organization\Dto\AddressRequestInputDto;
use Sherl\Sdk\Organization\Dto\CreateMediaInputDto;
use Sherl\Sdk\Organization\Dto\CommunicationInputDto;
use Sherl\Sdk\Organization\Dto\OrganizationMemberInputDto;
use Sherl\Sdk\Organization\Dto\EmployeeOutputDto;
use Sherl\Sdk\Organization\Dto\FounderOutputDto;
use Sherl\Sdk\Organization\Dto\FounderInputDto;
use Sherl\Sdk\Organization\Dto\KYCDocumentOutputDto;
use Sherl\Sdk\Organization\Dto\AddKYCDocumentInputDto;

class OrganizationProvider
{
    public const DOMAIN = "Organization";

    private Client $client;

    private ErrorFactory $errorFactory;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->errorFactory = new ErrorFactory(self::DOMAIN, OrganizationErr::$errors);
    }

    /**
     * Creates a new organization with the given details.
     *
     * @param OrganizationInputDto $organization - The data for creating a new organization.
     * @throws SherlException If there is an error during the organization retrieval process.
     */
    public function createOrganization(OrganizationInputDto $organization): ?OrganizationOutputDto
    {
        try {
            $response = $this->client->post("/api/organizations", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::JSON => [
                'organization' => $organization,
              ],
            ]);

            switch ($response->getStatusCode()) {
                case 201:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        OrganizationOutputDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(OrganizationErr::CREATE_ORGANIZATION_FORBIDDEN);
                default:
                    throw $this->errorFactory->create(OrganizationErr::CREATE_ORGANIZATION_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(OrganizationErr::CREATE_ORGANIZATION_FAILED));
        }
    }

    /**
     * Retrieves an organization by its unique identifier.
     *
     * @param string $organizationId The unique identifier of the organization.
     * @return OrganizationOutputDto|null The organization output data object or null on failure.
     * @throws SherlException If there is an error during the organization retrieval process.
     */
    public function getOrganization(string $organizationId): ?OrganizationOutputDto
    {
        try {
            $response = $this->client->get("/api/organizations/$organizationId", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::QUERY => $organizationId,
            ]);

            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        OrganizationOutputDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(OrganizationErr::GET_ORGANIZATION_FORBIDDEN);
                default:
                    throw $this->errorFactory->create(OrganizationErr::GET_ORGANIZATION_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(OrganizationErr::GET_ORGANIZATION_FAILED));
        }
    }

    /**
     * Retrieves a list of organizations based on the provided filters.
     *
     * @param OrganizationFiltersDto $filters The filters to apply to the organization query.
     * @return OrganizationOutputDto|null A list of organization output data objects or null on failure.
     * @throws SherlException If there is an error during the organizations retrieval process.
     */
    public function getOrganizations(OrganizationFiltersDto $filters): ?OrganizationOutputDto
    {
        try {
            $response = $this->client->get("/api/organizations", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::QUERY => $filters,
            ]);

            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        OrganizationOutputDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(OrganizationErr::GET_ORGANIZATIONS_FORBIDDEN);
                default:
                    throw $this->errorFactory->create(OrganizationErr::GET_ORGANIZATIONS_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(OrganizationErr::GET_ORGANIZATIONS_FAILED));
        }
    }

    /**
     * Retrieves a public organization by its slug.
     *
     * @param string $slug The slug identifier of the organization.
     * @return OrganizationOutputDto|null The organization output data object or null on failure.
     * @throws SherlException If there is an error during the public organization retrieval process.
     */
    public function getPublicOrganizationBySlug(string $slug): ?OrganizationOutputDto
    {
        try {
            $response = $this->client->get("/api/public/organizations/find-one-by-slug/$slug", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::QUERY => $slug,
            ]);

            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        OrganizationOutputDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(OrganizationErr::GET_PUBLIC_ORGANIZATION_BY_SLUG_FORBIDDEN);
                case 404:
                    throw $this->errorFactory->create(OrganizationErr::ORGANIZATION_NOT_FOUND);
                default:
                    throw $this->errorFactory->create(OrganizationErr::GET_PUBLIC_ORGANIZATION_BY_SLUG_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(OrganizationErr::GET_PUBLIC_ORGANIZATION_BY_SLUG_FAILED));
        }
    }

    /**
     * Retrieves a public organization by its unique identifier.
     *
     * @param string $organizationId The unique identifier of the public organization.
     * @return OrganizationOutputDto|null The public organization output data object or null on failure.
     * @throws SherlException If there is an error during the public organization retrieval process.
     */
    public function getPublicOrganization(string $organizationId): ?OrganizationOutputDto
    {
        try {
            $response = $this->client->get("/api/public/organizations/$organizationId", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::QUERY => $organizationId,
            ]);

            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        OrganizationOutputDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(OrganizationErr::GET_PUBLIC_ORGANIZATION_BY_SLUG_FORBIDDEN);
                case 404:
                    throw $this->errorFactory->create(OrganizationErr::ORGANIZATION_NOT_FOUND);
                default:
                    throw $this->errorFactory->create(OrganizationErr::GET_PUBLIC_ORGANIZATION_BY_SLUG_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(OrganizationErr::GET_PUBLIC_ORGANIZATION_BY_SLUG_FAILED));
        }
    }

    /**
     * Retrieves a list of public organizations based on the provided filters.
     *
     * @param OrganizationFiltersDto $filters The filters to apply to the public organization query.
     * @return OrganizationOutputDto|null A list of public organization output data objects or null on failure.
     * @throws SherlException If there is an error during the public organizations retrieval process.
     */
    public function getPublicOrganizations(OrganizationFiltersDto $filters): ?OrganizationOutputDto
    {
        try {
            $response = $this->client->get("/api/public/organizations", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::QUERY => $filters,
            ]);

            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        OrganizationOutputDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(OrganizationErr::GET_PUBLIC_ORGANIZATIONS_FORBIDDEN);
                default:
                    throw $this->errorFactory->create(OrganizationErr::GET_PUBLIC_ORGANIZATIONS_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(OrganizationErr::GET_PUBLIC_ORGANIZATIONS_FAILED));
        }
    }

    /**
     * Registers an organization to a person using the provided data.
     *
     * @param RegisterOrganizationRequestInputDto $organizationToPerson - The data for registering an organization to a person.
     * @return OrganizationOutputDto|null The registered organization's information post-registration or null on failure.
     * @throws SherlException If there is an error during the organization to person registration process.
     */
    public function registerOrganizationToPerson(RegisterOrganizationRequestInputDto $organizationToPerson): ?OrganizationOutputDto
    {
        try {
            $response = $this->client->post("/api/organizations/register-to-person", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::JSON => [
                'organizationToPerson' => $organizationToPerson,
              ],
            ]);

            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        OrganizationOutputDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(OrganizationErr::REGISTER_ORGANIZATION_TO_PERSON_FORBIDDEN);
                default:
                    throw $this->errorFactory->create(OrganizationErr::REGISTER_ORGANIZATION_TO_PERSON_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(OrganizationErr::REGISTER_ORGANIZATION_TO_PERSON_FAILED));
        }
    }

    /**
     * Registers a new organization with the provided request details.
     *
     * @param RegisterOrganizationRequestInputDto $request The registration request details for the new organization.
     * @return OrganizationOutputDto|null The information of the newly registered organization.
     * @throws SherlException If there is an error during the organization registration process.
     */
    public function registerOrganization(RegisterOrganizationRequestInputDto $request): ?OrganizationOutputDto
    {
        try {
            $response = $this->client->post("/api/organizations/register", [
                "headers" => [
                  "Content-Type" => "application/json",
                ],
                RequestOptions::JSON => [
                  'request' => $request,
                ],
              ]);

            switch ($response->getStatusCode()) {
                case 201:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        OrganizationOutputDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(OrganizationErr::REGISTER_ORGANIZATION_FORBIDDEN);
                default:
                    throw $this->errorFactory->create(OrganizationErr::REGISTER_ORGANIZATION_FAILED);
            }
        } catch (Exception $error) {
            throw ErrorHelper::getSherlError($error, $this->errorFactory->create(OrganizationErr::REGISTER_ORGANIZATION_FAILED));
        }
    }

    /**
     * Submits a suggestion for an organization based on the provided request details.
     *
     * @param SuggestOrganizationRequestInputDto $suggestion The details of the organization suggestion.
     * @return OrganizationOutputDto|null The response related to the organization suggestion.
     * @throws SherlException If there is an error during the organization suggestion submission process.
     */
    public function suggestOrganization(SuggestOrganizationRequestInputDto $suggestion): ?OrganizationOutputDto
    {
        try {
            $response = $this->client->post("/api/organizations/suggest", [
                "headers" => [
                  "Content-Type" => "application/json",
                ],
                RequestOptions::JSON => [
                  'suggestion' => $suggestion,
                ],
              ]);

            switch ($response->getStatusCode()) {
                case 201:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        OrganizationOutputDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(OrganizationErr::SUGGEST_ORGANIZATION_FORBIDDEN);
                default:
                    throw $this->errorFactory->create(OrganizationErr::SUGGEST_ORGANIZATION_FAILED);
            }
        } catch (Exception $error) {
            throw ErrorHelper::getSherlError($error, $this->errorFactory->create(OrganizationErr::SUGGEST_ORGANIZATION_FAILED));
        }
    }

    /**
     * Updates an existing organization's details using the provided information.
     *
     * @param string $organizationId The unique identifier of the organization to be updated.
     * @param UpdateOrganizationInputDto $updatedOrganization The new details for updating the organization.
     * @return OrganizationOutputDto|null The updated organization's information.
     * @throws SherlException If there is an error during the organization update process.
     */
    public function updateOrganization(string $organizationId, UpdateOrganizationInputDto $updatedOrganization): ?OrganizationOutputDto
    {
        try {
            $response = $this->client->put("/api/organizations/update/$organizationId", [
                "headers" => [
                  "Content-Type" => "application/json",
                ],
                RequestOptions::QUERY => $organizationId,
                RequestOptions::JSON => $updatedOrganization,
            ]);

            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        OrganizationOutputDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(OrganizationErr::UPDATE_ORGANIZATION_FORBIDDEN);
                case 404:
                    throw $this->errorFactory->create(OrganizationErr::ORGANIZATION_NOT_FOUND);
                default:
                    throw $this->errorFactory->create(OrganizationErr::UPDATE_ORGANIZATION_FAILED);
            }
        } catch (Exception $error) {
            throw ErrorHelper::getSherlError($error, $this->errorFactory->create(OrganizationErr::UPDATE_ORGANIZATION_FAILED));
        }
    }

    // ADDRESS

    /**
     * Adds an address to an organization specified by its ID.
     *
     * @param string $organizationId The unique identifier of the organization to which the address is being added.
     * @param AddressRequestInputDto $address The details of the address to be added.
     * @return OrganizationOutputDto|null A promise that resolves to the updated organization's information post address addition.
     * @throws SherlException If there is an error during the address addition process.
     */
    public function addAddress(string $organizationId, AddressRequestInputDto $address): ?OrganizationOutputDto
    {
        try {
            $response = $this->client->post("/api/organizations/$organizationId/addresses", [
                "headers" => [
                  "Content-Type" => "application/json",
                ],
                RequestOptions::QUERY => $organizationId,
                RequestOptions::JSON => $address,
            ]);

            switch ($response->getStatusCode()) {
                case 201:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        OrganizationOutputDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(OrganizationErr::ADD_ADDRESS_FORBIDDEN);
                case 404:
                    throw $this->errorFactory->create(OrganizationErr::ADDRESS_NOT_FOUND);
                default:
                    throw $this->errorFactory->create(OrganizationErr::ADD_ADDRESS_FAILED);
            }
        } catch (Exception $error) {
            throw ErrorHelper::getSherlError($error, $this->errorFactory->create(OrganizationErr::ADD_ADDRESS_FAILED));
        }
    }

    /**
     * Deletes an address from an organization using the specified IDs.
     *
     * @param string $organizationId The unique identifier of the organization from which the address is being deleted.
     * @param string $addressId The unique identifier of the address to be deleted.
     * @return OrganizationOutputDto|null A promise that resolves to the updated organization's information post address deletion.
     * @throws SherlException If there is an error during the address deletion process.
     */
    public function deleteAddress(string $organizationId, string $addressId): ?OrganizationOutputDto
    {
        try {
            $response = $this->client->delete("/api/organizations/$organizationId/addresses/$addressId", [
                "headers" => [
                    "Content-Type" => "application/json",
                ],
                RequestOptions::QUERY => [
                    'organizationId' => $organizationId,
                    'addressId' => $addressId,
                ],
            ]);

            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        OrganizationOutputDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(OrganizationErr::DELETE_ADDRESS_FORBIDDEN);
                case 404:
                    throw $this->errorFactory->create(OrganizationErr::ADDRESS_NOT_FOUND);
                default:
                    throw $this->errorFactory->create(OrganizationErr::DELETE_ADDRESS_FAILED);
            }
        } catch (Exception $error) {
            throw ErrorHelper::getSherlError($error, $this->errorFactory->create(OrganizationErr::DELETE_ADDRESS_FAILED));
        }
    }

    /**
     * Updates an address of an organization specified by IDs.
     *
     * @param string $organizationId The unique identifier of the organization whose address is being updated.
     * @param string $addressId The unique identifier of the address to be updated.
     * @param AddressRequestInputDto $request The updated address details.
     * @return OrganizationOutputDto|null A promise that resolves to the updated organization's information after the address update.
     * @throws SherlException If there is an error during the address update process.
     */
    public function updateAddress(string $organizationId, string $addressId, AddressRequestInputDto $request): ?OrganizationOutputDto
    {
        try {
            $response = $this->client->put("/api/organizations/$organizationId/addresses/$addressId", [
                "headers" => [
                    "Content-Type" => "application/json",
                ],
                RequestOptions::QUERY => [
                    'organizationId' => $organizationId,
                    'addressId' => $addressId,
                ],
                RequestOptions::JSON => $request,
            ]);

            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        OrganizationOutputDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(OrganizationErr::UPDATE_ADDRESS_FORBIDDEN);
                case 404:
                    throw $this->errorFactory->create(OrganizationErr::ADDRESS_NOT_FOUND);
                default:
                    throw $this->errorFactory->create(OrganizationErr::UPDATE_ADDRESS_FAILED);
            }
        } catch (Exception $error) {
            throw ErrorHelper::getSherlError($error, $this->errorFactory->create(OrganizationErr::UPDATE_ADDRESS_FAILED));
        }
    }

    // BACKGROUND IMAGE

    /**
     * Creates a background image for an organization from a media object.
     *
     * @param string $organizationId The unique identifier of the organization for which the background image is being set.
     * @param string $mediaId The unique identifier of the media to be used as the background image.
     * @param CreateMediaInputDto $image The image object to be set as the background.
     * @return OrganizationOutputDto|null A promise that resolves to the updated organization's information after the background image creation.
     * @throws SherlException If there is an error during the background image creation process.
     */
    public function createBackgroundImageFromMedia(string $organizationId, string $mediaId, CreateMediaInputDto $image): ?OrganizationOutputDto
    {
        try {
            $response = $this->client->post("/api/organizations/$organizationId/background-image/create/$mediaId/from-media", [
                "headers" => [
                    "Content-Type" => "application/json",
                ],
                RequestOptions::QUERY => [
                    'organizationId' => $organizationId,
                    'mediaId' => $mediaId,
                ],
                RequestOptions::JSON => $image,
            ]);

            switch ($response->getStatusCode()) {
                case 201:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        OrganizationOutputDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(OrganizationErr::CREATE_BACKGROUND_IMAGE_FROM_MEDIA_FORBIDDEN);
                case 404:
                    throw $this->errorFactory->create(OrganizationErr::ORGANIZATION_NOT_FOUND);
                default:
                    throw $this->errorFactory->create(OrganizationErr::CREATE_BACKGROUND_IMAGE_FROM_MEDIA_FAILED);
            }
        } catch (Exception $error) {
            throw ErrorHelper::getSherlError($error, $this->errorFactory->create(OrganizationErr::CREATE_BACKGROUND_IMAGE_FROM_MEDIA_FAILED));
        }
    }

    /**
     * Creates a background image for an organization by uploading a file.
     *
     * @param string $organizationId The unique identifier of the organization for which the background image is being set.
     * @param string $mediaId The unique identifier of the media associated with the background image.
     * @param \Psr\Http\Message\UploadedFileInterface $file The image file to be uploaded and set as the background.
     * @param callable|null $onUploadProgress Optional callback to monitor the progress of the upload.
     * @return OrganizationOutputDto|null A promise that resolves to the updated organization's information after the background image creation.
     * @throws SherlException If there is an error during the background image creation process.
     */
    public function createBackgroundImage(string $organizationId, string $mediaId, \Psr\Http\Message\UploadedFileInterface $file, ?callable $onUploadProgress = null): ?OrganizationOutputDto
    {
        try {
            $formData = new \GuzzleHttp\Psr7\MultipartStream([
                [
                    'name' => 'upload',
                    'contents' => $file->getStream(),
                    'filename' => $file->getClientFilename(),
                    'headers'  => ['Content-Type' => $file->getClientMediaType()]
                ]
            ]);

            $response = $this->client->post("/api/organizations/$organizationId/background-image/create/$mediaId", [
                "headers" => ["Content-Type" => "application/json"],
                'body' => $formData,
                    'on_stats' => function (\GuzzleHttp\TransferStats $stats) use ($onUploadProgress) {
                        if ($onUploadProgress) {
                            $onUploadProgress($stats);
                        }
                    },
                RequestOptions::QUERY => [
                    'organizationId' => $organizationId,
                    'mediaId' => $mediaId,
                ],
            ]);

            switch ($response->getStatusCode()) {
                case 201:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        OrganizationOutputDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(OrganizationErr::CREATE_BACKGROUND_IMAGE_FORBIDDEN);
                case 404:
                    throw $this->errorFactory->create(OrganizationErr::ORGANIZATION_NOT_FOUND);
                default:
                    throw $this->errorFactory->create(OrganizationErr::CREATE_BACKGROUND_IMAGE_FAILED);
            }
        } catch (Exception $error) {
            throw ErrorHelper::getSherlError($error, $this->errorFactory->create(OrganizationErr::CREATE_BACKGROUND_IMAGE_FAILED));
        }
    }

    /**
     * Deletes the background image of an organization identified by its unique ID.
     *
     * @param string $organizationId The unique identifier of the organization whose background image is being deleted.
     * @return OrganizationOutputDto|null A promise that resolves to the updated organization's information after the background image deletion.
     * @throws SherlException If there is an error during the background image deletion process.
     */
    public function deleteBackgroundImage(string $organizationId): ?OrganizationOutputDto
    {
        try {
            $response = $this->client->delete("/api/organizations/$organizationId/background-image", [
                "headers" => [
                    "Content-Type" => "application/json",
                ],
                RequestOptions::QUERY => ['organizationId' => $organizationId],
            ]);

            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        OrganizationOutputDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(OrganizationErr::DELETE_BACKGROUND_IMAGE_FORBIDDEN);
                case 404:
                    throw $this->errorFactory->create(OrganizationErr::ORGANIZATION_NOT_FOUND);
                default:
                    throw $this->errorFactory->create(OrganizationErr::DELETE_BACKGROUND_IMAGE_FAILED);
            }
        } catch (Exception $error) {
            throw ErrorHelper::getSherlError($error, $this->errorFactory->create(OrganizationErr::DELETE_BACKGROUND_IMAGE_FAILED));
        }
    }

    // COMMUNICATION

    /**
     * Sets communication details for an organization specified by its unique ID.
     *
     * @param string $organizationId The unique identifier of the organization for which the communication details are being set.
     * @param CommunicationInputDto $communicationInfo The communication details to be set for the organization.
     * @return OrganizationOutputDto|null A promise that resolves to the updated organization's information after setting the communication details.
     * @throws SherlException If there is an error during the process of setting communication details.
     */
    public function setCommunication(string $organizationId, CommunicationInputDto $communicationInfo): ?OrganizationOutputDto
    {
        try {
            $response = $this->client->post("/api/organizations/$organizationId/communication", [
                "headers" => [
                    "Content-Type" => "application/json",
                ],
                RequestOptions::QUERY => ['organizationId' => $organizationId],
                RequestOptions::JSON => $communicationInfo,
            ]);

            switch ($response->getStatusCode()) {
                case 201:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        OrganizationOutputDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(OrganizationErr::SET_COMMUNICATION_FORBIDDEN);
                case 404:
                    throw $this->errorFactory->create(OrganizationErr::ORGANIZATION_NOT_FOUND);
                default:
                    throw $this->errorFactory->create(OrganizationErr::SET_COMMUNICATION_FAILED);
            }
        } catch (Exception $error) {
            throw ErrorHelper::getSherlError($error, $this->errorFactory->create(OrganizationErr::SET_COMMUNICATION_FAILED));
        }
    }

    // EMPLOYEE

    /**
     * Creates a new employee record for a specified organization.
     *
     * @param string $organizationId The unique identifier of the organization to which the employee is being added.
     * @param OrganizationMemberInputDto $employee The details of the employee to be added.
     * @return EmployeeOutputDto|null A promise that resolves to the information of the newly created employee.
     * @throws SherlException If there is an error during the process of creating a new employee.
     */
    public function createEmployee(string $organizationId, OrganizationMemberInputDto $employee): ?EmployeeOutputDto
    {
        try {
            $response = $this->client->post("/api/organizations/$organizationId/employees", [
                "headers" => [
                    "Content-Type" => "application/json",
                ],
                RequestOptions::QUERY => ['organizationId' => $organizationId],
                RequestOptions::JSON => $employee,
            ]);

            switch ($response->getStatusCode()) {
                case 201:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        EmployeeOutputDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(OrganizationErr::CREATE_EMPLOYEE_FORBIDDEN);
                case 404:
                    throw $this->errorFactory->create(OrganizationErr::ORGANIZATION_NOT_FOUND);
                default:
                    throw $this->errorFactory->create(OrganizationErr::CREATE_EMPLOYEE_FAILED);
            }
        } catch (Exception $error) {
            throw ErrorHelper::getSherlError($error, $this->errorFactory->create(OrganizationErr::CREATE_EMPLOYEE_FAILED));
        }
    }

    /**
     * Deletes an employee record from a specified organization.
     *
     * @param string $organizationId The unique identifier of the organization from which the employee is being deleted.
     * @param string $employeeId The unique identifier of the employee to be deleted.
     * @return EmployeeOutputDto|null A promise that resolves to the information of the deleted employee.
     * @throws SherlException If there is an error during the process of deleting an employee.
     */
    public function deleteEmployee(string $organizationId, string $employeeId): ?EmployeeOutputDto
    {
        try {
            $response = $this->client->delete("/api/organizations/$organizationId/employees/$employeeId", [
                "headers" => [
                    "Content-Type" => "application/json",
                ],
                RequestOptions::QUERY => [
                    'organizationId' => $organizationId,
                    'employeeId' => $employeeId,
                ]
            ]);

            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        EmployeeOutputDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(OrganizationErr::DELETE_EMPLOYEE_FORBIDDEN);
                case 404:
                    throw $this->errorFactory->create(OrganizationErr::EMPLOYEE_NOT_FOUND);
                default:
                    throw $this->errorFactory->create(OrganizationErr::DELETE_EMPLOYEE_FAILED);
            }
        } catch (Exception $error) {
            throw ErrorHelper::getSherlError($error, $this->errorFactory->create(OrganizationErr::DELETE_EMPLOYEE_FAILED));
        }
    }

    // FOUNDER

    /**
     * Creates a new founder record for a specified organization.
     *
     * @param string $organizationId The unique identifier of the organization to which the founder is being added.
     * @param FounderInputDto $founder The details of the founder to be added.
     * @return FounderOutputDto|null A promise that resolves to the information of the newly created founder.
     * @throws SherlException If there is an error during the process of creating a new founder.
     */
    public function createFounder(string $organizationId, FounderInputDto $founder): ?FounderOutputDto
    {
        try {

            $response = $this->client->post("/api/organizations/$organizationId/founders", [
                "headers" => [
                    "Content-Type" => "application/json",
                ],
                RequestOptions::JSON => $founder,
                RequestOptions::QUERY => [
                    "organizationId" => $organizationId
                ]
            ]);

            switch ($response->getStatusCode()) {
                case 201:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        FounderOutputDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(OrganizationErr::CREATE_FOUNDER_FORBIDDEN);
                case 404:
                    throw $this->errorFactory->create(OrganizationErr::ORGANIZATION_NOT_FOUND);
                default:
                    throw $this->errorFactory->create(OrganizationErr::CREATE_FOUNDER_FAILED);
            }
        } catch (Exception $error) {
            throw ErrorHelper::getSherlError($error, $this->errorFactory->create(OrganizationErr::CREATE_FOUNDER_FAILED));
        }
    }

    /**
     * Deletes a founder record from a specified organization.
     *
     * @param string $organizationId The unique identifier of the organization from which the founder is being deleted.
     * @param string $founderId The unique identifier of the founder to be deleted.
     * @return FounderOutputDto|null A promise that resolves to the information of the deleted founder.
     * @throws SherlException If there is an error during the process of deleting a founder.
     */
    public function deleteFounder(string $organizationId, string $founderId): ?FounderOutputDto
    {
        try {
            $response = $this->client->delete("/api/organizations/$organizationId/founders/$founderId", [
                "headers" => [
                    "Content-Type" => "application/json",
                ],
                RequestOptions::QUERY => [
                    "organizationId" => $organizationId,
                    "founderId" => $founderId
                ]
            ]);

            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        FounderOutputDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(OrganizationErr::DELETE_FOUNDER_FORBIDDEN);
                case 404:
                    throw $this->errorFactory->create(OrganizationErr::ORGANIZATION_NOT_FOUND);
                default:
                    throw $this->errorFactory->create(OrganizationErr::DELETE_FOUNDER_FAILED);
            }
        } catch (Exception $error) {
            throw ErrorHelper::getSherlError($error, $this->errorFactory->create(OrganizationErr::DELETE_FOUNDER_FAILED));
        }
    }

    /**
     * Updates the details of a founder within a specified organization.
     *
     * @param string $organizationId The unique identifier of the organization to which the founder belongs.
     * @param string $founderId The unique identifier of the founder to be updated.
     * @param FounderInputDto $updatedFounder The partial data of the founder to be updated.
     * @return FounderOutputDto|null A promise that resolves to the information of the updated founder.
     * @throws SherlException If there is an error during the process of updating a founder.
     */
    public function updateFounder(string $organizationId, string $founderId, FounderInputDto $updatedFounder): ?FounderOutputDto
    {
        try {
            $response = $this->client->put("/api/organizations/$organizationId/founders/$founderId", [
                "headers" => [
                    "Content-Type" => "application/json",
                ],
                RequestOptions::JSON => $updatedFounder,
                RequestOptions::QUERY => [
                    "organizationId" => $organizationId,
                    "founderId" => $founderId
                ]
            ]);

            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        FounderOutputDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(OrganizationErr::UPDATE_FOUNDER_FORBIDDEN);
                case 404:
                    throw $this->errorFactory->create(OrganizationErr::FOUNDER_NOT_FOUND);
                default:
                    throw $this->errorFactory->create(OrganizationErr::UPDATE_FOUNDER_FAILED);
            }
        } catch (Exception $error) {
            throw ErrorHelper::getSherlError($error, $this->errorFactory->create(OrganizationErr::UPDATE_FOUNDER_FAILED));
        }
    }

    // KYC

    /**
     * Adds a KYC document to a specified organization.
     *
     * @param string $organizationId The unique identifier of the organization to which the KYC document is being added.
     * @param \Psr\Http\Message\UploadedFileInterface $document The KYC document details to be added.
     * @param callable|null $onUploadProgress Optional callback to monitor the progress of the upload.
     * @return KYCDocumentOutputDto|null A promise that resolves to the information of the newly added KYC document.
     * @throws SherlException If there is an error during the process of adding a KYC document.
     */
    public function addKycDocument(string $organizationId, \Psr\Http\Message\UploadedFileInterface $document, ?callable $onUploadProgress = null): ?KYCDocumentOutputDto
    {
        $formData = new \GuzzleHttp\Psr7\MultipartStream([
            [
                'name' => 'upload',
                'contents' => $document->getStream(),
                'filename' => $document->getClientFilename(),
                'headers'  => ['Content-Type' => $document->getClientMediaType()]
            ]
        ]);
        try {
            $response = $this->client->post("/api/organizations/$organizationId/kycs", [
                "headers" => ["Content-Type" => "application/json"],
                'body' => $formData,
                    'on_stats' => function (\GuzzleHttp\TransferStats $stats) use ($onUploadProgress) {
                        if ($onUploadProgress) {
                            $onUploadProgress($stats);
                        }
                    },
                RequestOptions::QUERY => ['organizationId' => $organizationId],
            ]);

            switch ($response->getStatusCode()) {
                case 201:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        KYCDocumentOutputDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(OrganizationErr::ADD_DOCUMENT_FORBIDDEN);
                case 404:
                    throw $this->errorFactory->create(OrganizationErr::ORGANIZATION_NOT_FOUND);
                default:
                    throw $this->errorFactory->create(OrganizationErr::ADD_DOCUMENT_FAILED);
            }
        } catch (Exception $error) {
            throw ErrorHelper::getSherlError($error, $this->errorFactory->create(OrganizationErr::ADD_DOCUMENT_FAILED));
        }
    }

    /**
     * Retrieves all KYC documents for a specified organization.
     *
     * @param string $organizationId The unique identifier of the organization for which the KYC documents are being retrieved.
     * @return KYCDocumentOutputDto[]|null A promise that resolves to an array of KYC documents for the specified organization.
     * @throws SherlException If there is an error during the process of retrieving KYC documents.
     */
    public function getAllKycDocuments(string $organizationId): ?array
    {
        try {
            $response = $this->client->get("/api/organizations/$organizationId/kycs", [
                "headers" => [
                    "Content-Type" => "application/json",
                ],
                RequestOptions::QUERY => ["organizationId" => $organizationId]
            ]);

            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        KYCDocumentOutputDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(OrganizationErr::GET_KYCS_FORBIDDEN);
                case 404:
                    throw $this->errorFactory->create(OrganizationErr::ORGANIZATION_NOT_FOUND);
                default:
                    throw $this->errorFactory->create(OrganizationErr::GET_KYCS_FAILED);
            }
        } catch (Exception $error) {
            throw ErrorHelper::getSherlError($error, $this->errorFactory->create(OrganizationErr::GET_KYCS_FAILED));
        }
    }

/**
 * Updates a specific KYC document for an organization.
 *
 * @param string $organizationId The unique identifier of the organization to which the KYC document belongs.
 * @param string $kycId The unique identifier of the KYC document to be updated.
 * @param ImageObjectDto $document The updated KYC document details.
 * @param callable|null $onUploadProgress Optional callback to monitor the progress of the upload.
 * @return KYCDocument A promise that resolves to the information of the updated KYC document.
 * @throws SherlException If there is an error during the process of updating a KYC document.
 */
public function updateKycDocument(string $organizationId, string $kycId, ImageObjectDto $document, ?callable $onUploadProgress = null): KYCDocument
{
    $formData = new \GuzzleHttp\Psr7\MultipartStream([
        [
            'name' => 'upload',
            'contents' => $document->getStream(),
            'filename' => $document->getClientFilename(),
            'headers'  => ['Content-Type' => $document->getClientMediaType()]
        ]
    ]);
    try {
        $response = $this->client->post("/api/organizations/$organizationId/kycs/$kycId", [
            "headers" => ["Content-Type" => "application/json"],
            'body' => $formData,
                'on_stats' => function (\GuzzleHttp\TransferStats $stats) use ($onUploadProgress) {
                    if ($onUploadProgress) {
                        $onUploadProgress($stats);
                    }
                },
            RequestOptions::QUERY => [
                'organizationId' => $organizationId,
                'kycId' => $kycId,
            ],
        ]);

        switch ($response->getStatusCode()) {
            case 200:
                return SerializerFactory::getInstance()->deserialize(
                    $response->getBody()->getContents(),
                    KYCDocument::class,
                    'json'
                );
            case 403:
                throw $this->errorFactory->create(OrganizationErr::UPDATE_DOCUMENT_FORBIDDEN);
            case 404:
                throw $this->errorFactory->create(OrganizationErr::KYC_NOT_FOUND);
            default:
                throw $this->errorFactory->create(OrganizationErr::UPDATE_DOCUMENT_FAILED);
        }
    } catch (Exception $error) {
        throw ErrorHelper::getSherlError($error, $this->errorFactory->create(OrganizationErr::UPDATE_DOCUMENT_FAILED));
    }
}


}
