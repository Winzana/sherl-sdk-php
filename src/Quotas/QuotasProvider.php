<?php

namespace Sherl\Sdk\Quota;

use Exception;
use GuzzleHttp\Client;
use Sherl\Sdk\Common\SerializerFactory;
use Sherl\Sdk\Quotas\Dto\QuotaOutputDto;
use Sherl\Sdk\Common\Error\SherlException;

class QuotaProvider
{
    public const DOMAIN = 'Quota';

    private Client $client;
    /**
     * Constructor for QuotaProvider.
     * @param Client $client The HTTP client used to make requests.
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieves quota information based on provided filters.
     * @param array|null $filters The filters to apply when retrieving quota data.
     * @return QuotaOutputDto|null The quota data transfer object if found, null otherwise.
     * @throws SherlException If the response status code indicates an error.
     */
    public function getQuotaFindOneBy(?array $filters = null): ?QuotaOutputDto
    {
        $response = $this->client->post("/api/quotas/findOneBy", [
            "headers" => [
            "Content-Type" => "application/json",
            ],
            RequestOptions::JSON => [
            "query" => $filters
            ]
            ]);

        if ($response->getStatusCode() >= 300) {
            throw new SherlException(QuotaProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            QuotaOutputDto::class,
            'json'
        );
    }
}
