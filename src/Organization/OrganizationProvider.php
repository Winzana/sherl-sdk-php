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
