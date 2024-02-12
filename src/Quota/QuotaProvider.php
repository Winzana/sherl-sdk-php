<?php

namespace Sherl\Sdk\Quota;

use Exception;
use GuzzleHttp\Client;
use Sherl\Sdk\Common\SerializerFactory;
use Sherl\Sdk\Quota\Dto\QuotaOutputDto;
use Sherl\Sdk\Common\Error\SherlException;
use Sherl\Sdk\Common\Error\ErrorFactory;
use Sherl\Sdk\Quota\Errors\QuotaErr;
use Sherl\Sdk\Quota\Dto\QuotaFilterDto;
use GuzzleHttp\RequestOptions;

class QuotaProvider
{
    public const DOMAIN = 'Quota';

    private Client $client;
    private ErrorFactory $errorFactory;
    /**
     * Constructor for QuotaProvider.
     * @param Client $client The HTTP client used to make requests.
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->errorFactory = new ErrorFactory(self::DOMAIN, QuotaErr::$errors);
    }

    /**
     * Retrieves quota information based on provided filters.
     * @param QuotaFilterDto $filters The filters to apply when retrieving quota data.
     * @return QuotaOutputDto|null The quota data transfer object if found, null otherwise.
     * @throws SherlException If the response status code indicates an error.
     */
    public function getOneQuotaBy(QuotaFilterDto $filters): ?QuotaOutputDto
    {
        try {
            $response = $this->client->get("/api/quotas/find-one-by", [
                "headers" => [
                "Content-Type" => "application/json",
                ],
                RequestOptions::QUERY => $filters
                ]);
            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                QuotaOutputDto::class,
                'json'
            );

        } catch (\Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(QuotaErr::FETCH_QUOTA_FIND_ONE_BY_FORBIDDEN);

                }
            }
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(QuotaErr::FETCH_QUOTA_FIND_ONE_BY_FAILED));
        }
    }
}
