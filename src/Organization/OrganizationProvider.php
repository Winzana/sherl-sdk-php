<?php

namespace Sherl\Sdk\Notification;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

use Psr\Http\Message\ResponseInterface;

use Sherl\Sdk\Common\Error\SherlException;
use Sherl\Sdk\Common\SerializerFactory;


use Sherl\Sdk\Organization\Dto\OrganizationOuputDto;
use Sherl\Sdk\Organization\Dto\OrganizationFiltersDto;

class OrganizationProvider
{
    public const DOMAIN = "Organization";

    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    private function throwSherlOrganizationException(ResponseInterface $response)
    {
        throw new SherlException(OrganizationProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
    }

    /**
     * Retrieves an organization by its unique identifier.
     * 
     * @param string $organizationId The unique identifier of the organization.
     * @return OrganizationOutputDto|null The organization output data object or null on failure.
     * @throws SherlException If there is an error during the organization retrieval process.
     */
    public function getOrganization(string $organizationId): ?OrganizationOuputDto
    {
        $response = $this->client->get("/api/organizations/$organizationId", [
          "headers" => [
            "Content-Type" => "application/json",
          ],
          RequestOptions::QUERY => $organizationId,
        ]);

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlNotificationException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            OrganizationOuputDto::class,
            'json'
        );
    }

    /**
     * Retrieves a list of organizations based on the provided filters.
     * 
     * @param OrganizationFiltersDto $filters The filters to apply to the organization query.
     * @return OrganizationOutputDto|null A list of organization output data objects or null on failure.
     * @throws SherlException If there is an error during the organizations retrieval process.
     */
    public function getOrganizations(OrganizationFiltersDto $filters): ?OrganizationOuputDto
    {
        $response = $this->client->get("/api/organizations", [
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
            OrganizationOuputDto::class,
            'json'
        );
    }

    /**
     * Retrieves a public organization by its slug.
     * 
     * @param string $slug The slug identifier of the organization.
     * @return OrganizationOutputDto|null The organization output data object or null on failure.
     * @throws SherlException If there is an error during the public organization retrieval process.
     */
    public function getPublicOrganizationBySlug(string $slug): ?OrganizationOuputDto
    {
        $response = $this->client->get("/api/public/organizations/find-one-by-slug/$slug", [
          "headers" => [
            "Content-Type" => "application/json",
          ],
          RequestOptions::QUERY => $organizationId,
        ]);

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlNotificationException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            OrganizationOuputDto::class,
            'json'
        );
    }

    /**
     * Retrieves a public organization by its unique identifier.
     * 
     * @param string $organizationId The unique identifier of the public organization.
     * @return OrganizationOutputDto|null The public organization output data object or null on failure.
     * @throws SherlException If there is an error during the public organization retrieval process.
     */
    public function getPublicOrganization(string $organizationId): ?OrganizationOuputDto
    {
        $response = $this->client->get("/api/public/organizations/$organizationId", [
          "headers" => [
            "Content-Type" => "application/json",
          ],
          RequestOptions::QUERY => $organizationId,
        ]);

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlNotificationException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            OrganizationOuputDto::class,
            'json'
        );
    }

    /**
     * Retrieves a list of public organizations based on the provided filters.
     * 
     * @param OrganizationFiltersDto $filters The filters to apply to the public organization query.
     * @return OrganizationOutputDto|null A list of public organization output data objects or null on failure.
     * @throws SherlException If there is an error during the public organizations retrieval process.
     */
    public function getPublicOrganizations(OrganizationFiltersDto $filters): ?OrganizationOuputDto
    {
        $response = $this->client->get("/api/public/organizations", [
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
            OrganizationOuputDto::class,
            'json'
        );
    }
}
