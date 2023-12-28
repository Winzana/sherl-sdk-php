<?php

namespace Sherl\Sdk\Quota;

use Exception;
use GuzzleHttp\Client;
use Sherl\Sdk\Common\SerializerFactory;
use Sherl\Sdk\Quotas\Dto\QuotaOutputDto;
use Sherl\Sdk\Common\Error\SherlException;

use Sherl\Sdk\Common\Error\ErrorFactory;
use Sherl\Sdk\Common\Error\ErrorHelper;
use Sherl\Sdk\Quotas\Errors\QuotasErr;

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
        $this->errorFactory = new ErrorFactory('Quotas', QuotasErr::$errors);
    }

    /**
     * Retrieves quota information based on provided filters.
     * @param array|null $filters The filters to apply when retrieving quota data.
     * @return QuotaOutputDto|null The quota data transfer object if found, null otherwise.
     * @throws SherlException If the response status code indicates an error.
     */
    public function getQuotaFindOneBy(?array $filters = null): ?QuotaOutputDto
    {
        try {
        $response = $this->client->post("/api/quotas/findOneBy", [
            "headers" => [
            "Content-Type" => "application/json",
            ],
            RequestOptions::JSON => [
            "query" => $filters
            ]
            ]);

            switch ($response->getStatusCode()) {
                case 200:
                  return SerializerFactory::getInstance()->deserialize(
                      $response->getBody()->getContents(),
                      IQuota::class,
                      'json'
                  );
                case 403:
                  throw $this->errorFactory->create(QuotasErr::FETCH_QUOTA_FIND_ONE_BY_FORBIDDEN);
                default:
                  throw $this->errorFactory->create(QuotasErr::FETCH_FAILED);
            }
        }
        catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(QuotasErr::FETCH_FAILED));
          }
    }
}
