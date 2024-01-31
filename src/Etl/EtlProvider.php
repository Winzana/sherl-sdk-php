<?php

namespace Sherl\Sdk\Etl;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;
use Sherl\Sdk\Common\Error\SherlException;
use Sherl\Sdk\Common\SerializerFactory;
use Exception;
use Sherl\Sdk\Common\Error\ErrorFactory;
use Sherl\Sdk\Common\Error\ErrorHelper;
use Sherl\Sdk\Etl\Errors\EtlErr;
use Sherl\Sdk\Etl\Dto\ExtractTransformLoadResponseDto;
use Sherl\Sdk\Etl\Dto\ExtractTransformLoadInputDto;
use Sherl\Sdk\Etl\Dto\EtlSaveConfigInputDto;
use Sherl\Sdk\Etl\Dto\ConfigModelDto;

class EtlProvider
{
    public const DOMAIN = "Etl";

    private Client $client;
    private ErrorFactory $errorFactory;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->errorFactory = new ErrorFactory(self::DOMAIN, EtlErr::$errors);
    }

    /**
     * Executes an Extract Transform Load process by ID.
     *
     * @param string $id - The ID of the ETL process to execute.
     * @return ExtractTransformLoadResponseDto|null - The response from the ETL process.
     * @throws SherlException
     */
    public function extractTransformLoadById(string $id): ?ExtractTransformLoadResponseDto
    {
        try {
            $response = $this->client->post("/api/etl/$id", [
                "headers" => [
                    "Content-Type" => "application/json",
                ],
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ExtractTransformLoadResponseDto::class,
                'json'
            );
        } catch (\Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {

                    case 403:
                        throw $this->errorFactory->create(EtlErr::EXTRACT_TRANSFORM_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(EtlErr::ETL_CONFIG_NOT_FOUND);
                }
            }
            throw $this->errorFactory->create(EtlErr::EXTRACT_TRANSFORM_LOAD_FAILED);
        }
    }
    /**
     * Executes an Extract Transform Load process with a given configuration.
     *
     * @param ExtractTransformLoadInputDto $config - The configuration for the ETL process.
     * @return ExtractTransformLoadResponseDto|null - The response from the ETL process.
     * @throws SherlException
     */
    public function extractTransformLoad(ExtractTransformLoadInputDto $config): ?ExtractTransformLoadResponseDto
    {
        try {
            $response = $this->client->post("/api/etl/extract-transform-load", [
                "headers" => [
                    "Content-Type" => "application/json",
                ],
                RequestOptions::JSON => $config,
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ExtractTransformLoadResponseDto::class,
                'json'
            );

        } catch (\Exception $err) {

            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(EtlErr::EXTRACT_TRANSFORM_LOAD_FORBIDDEN);
                }
            }
            throw $this->errorFactory->create(EtlErr::EXTRACT_TRANSFORM_LOAD_FAILED);
        }
    }
    /**
     * Saves a configuration for the ETL process.
     * @param EtlSaveConfigInputDto $config - The configuration to save.
     * @return ConfigModelDto|null - The saved configuration model.
     * @throws SherlException
     */
    public function saveConfig(EtlSaveConfigInputDto $config): ?ConfigModelDto
    {
        try {
            $response = $this->client->post("/api/etl/save-config", [
                "headers" => [
                    "Content-Type" => "application/json",
                ],
                RequestOptions::JSON => $config,
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ConfigModelDto::class,
                'json'
            );
        } catch (\Exception $err) {

            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(EtlErr::SAVE_CONFIG_FORBIDDEN);
                }
            }
            throw $this->errorFactory->create(EtlErr::SAVE_CONFIG_FAILED);
        }
    }
}
