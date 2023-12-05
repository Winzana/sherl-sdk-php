<?php

namespace Sherl\Sdk\Etl;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;
use Sherl\Sdk\Common\Error\SherlException;
use Sherl\Sdk\Common\SerializerFactory;
use Sherl\Sdk\Etl\Enum\EtlErr;
use Sherl\Sdk\Etl\Enum\IEtlResponse;

class EtlProvider
{
    public const DOMAIN = "Etl";

    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Throws a Sherl ETL exception.
     * @param ResponseInterface $response - The response from the HTTP client.
     * @throws SherlException
     */
    private function throwSherlEtlException(ResponseInterface $response)
    {
        throw new SherlException(EtlProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
    }
    /**
     * Executes an Extract Transform Load process by ID.
     * @param string $id - The ID of the ETL process to execute.
     * @return IEtlResponse - The response from the ETL process.
     * @throws SherlException
     */

    public function extractTransformLoadById(string $id): IEtlResponse
    {
        try {
            $response = $this->client->post("/api/etl/$id", [
                "headers" => [
                    "Content-Type" => "application/json",
                ],
            ]);

            if ($response->getStatusCode() >= 300) {
                $this->throwSherlEtlException($response);
            }
            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                LeTypeAttendu::class,
                'json'
            );

        } catch (\Exception $e) {
            throw new SherlException(EtlErr::FETCH_FAILED, $e->getMessage());
        }
    }
    /**
     * Executes an Extract Transform Load process with a given configuration.
     * @param array $config - The configuration for the ETL process.
     * @return IEtlResponse - The response from the ETL process.
     * @throws SherlException
     */
    public function extractTransformLoad(array $config): IEtlResponse
    {
        try {
            $response = $this->client->post("/api/etl", [
                "headers" => [
                    "Content-Type" => "application/json",
                ],
                RequestOptions::JSON => RequestOptions::QUERY,
            ]);

            if ($response->getStatusCode() >= 300) {
                $this->throwSherlEtlException($response);
            }

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                LeTypeAttendu::class,
                'json'
            );

        } catch (\Exception $e) {
            throw new SherlException(EtlErr::EXTRACT_TRANSFORM_LOAD_FAILED, $e->getMessage());
        }
    }
    /**
     * Saves a configuration for the ETL process.
     * @param array $config - The configuration to save.
     * @return IConfigModel - The saved configuration model.
     * @throws SherlException
     */
    public function saveConfig(array $config): IConfigModel
    {
        try {
            $response = $this->client->post("/api/save-config", [
                "headers" => [
                    "Content-Type" => "application/json",
                ],
                RequestOptions::JSON => RequestOptions::QUERY,
            ]);

            if ($response->getStatusCode() >= 300) {
                $this->throwSherlEtlException($response);
            }

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                LeTypeAttendu::class,
                'json'
            );

        } catch (\Exception $e) {
            throw new SherlException(EtlErr::FETCH_FAILED, $e->getMessage());
        }
    }
}
