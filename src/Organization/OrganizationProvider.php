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
}
