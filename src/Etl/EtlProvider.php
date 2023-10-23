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

    private function throwSherlEtlException(ResponseInterface $response)
    {
        throw new SherlException(EtlProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
    }

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

            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            throw new SherlException(EtlErr::EXTRACT_TRANSFORM_LOAD_FAILED, $e->getMessage());
        }
    }

    public function extractTransformLoad(array $config): IEtlResponse
    {
        try {
            $response = $this->client->post("/api/etl", [
                "headers" => [
                    "Content-Type" => "application/json",
                ],
                RequestOptions::JSON => $config,
            ]);

            if ($response->getStatusCode() >= 300) {
                $this->throwSherlEtlException($response);
            }

            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            throw new SherlException(EtlErr::EXTRACT_TRANSFORM_LOAD_FAILED, $e->getMessage());
        }
    }

    public function saveConfig(array $config): IConfigModel
    {
        try {
            $response = $this->client->post("/api/save-config", [
                "headers" => [
                    "Content-Type" => "application/json",
                ],
                RequestOptions::JSON => $config,
            ]);

            if ($response->getStatusCode() >= 300) {
                $this->throwSherlEtlException($response);
            }

            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            throw new SherlException(EtlErr::SAVE_CONFIG_FAILED, $e->getMessage());
        }
    }
}
