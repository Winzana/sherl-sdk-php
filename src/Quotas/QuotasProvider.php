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

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getQuotaFindOneBy(?array $filters = null): ?QuotaOutputDto
    {
        $response = $this->client->get('/api/quotas/findOneBy', [
            'query' => $filters
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
