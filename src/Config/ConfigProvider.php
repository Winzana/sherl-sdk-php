<?php

namespace Sherl\Sdk\Notification;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

use Psr\Http\Message\ResponseInterface;

use Sherl\Sdk\Common\Error\SherlException;
use Sherl\Sdk\Common\Error\ErrorFactory;
use Sherl\Sdk\Common\Error\ErrorHelper;
use Sherl\Sdk\Config\Errors\ConfigErr;
use Exception;

use Sherl\Sdk\Common\SerializerFactory;

use Sherl\Sdk\Config\Dto\ConfigOutputDto;
use Sherl\Sdk\Config\Dto\SetConfigInputDto;

class ConfigProvider
{
    public const DOMAIN = "Config";

    private Client $client;

    private ErrorFactory $errorFactory;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->errorFactory = new ErrorFactory(self::DOMAIN, ConfigErr::$errors);
    }

    /**
     * Retrieves the public configuration for the given code.
     *
     * @param string $code The configuration code.
     * @return ConfigOutputDto|null The configuration output data object or null on failure.
     * @throws SherlException If there is an error during the config retrieval process.
     */
    public function getPublicConfig(string $code): ?ConfigOutputDto
    {
        try {
            $response = $this->client->get("/api/public/configs/$code", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
            ]);

            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        ConfigOutputDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(ConfigErr::GET_CONFIG_FORBIDDEN);
                case 404:
                    throw $this->errorFactory->create(ConfigErr::CONFIG_NOT_FOUND);
                default:
                    throw $this->errorFactory->create(ConfigErr::GET_CONFIG_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(ConfigErr::GET_CONFIG_FAILED));
        }
    }

    /**
     * Sets the public configuration with the given details.
     *
     * @param SetConfigInputDto $request The configuration input data transfer object.
     * @return ConfigOutputDto|null The configuration output data object or null on failure.
     * @throws SherlException If there is an error during the config setting process.
     */
    public function setPublicConfig(SetConfigInputDto $request): ?ConfigOutputDto
    {
        try {
            $response = $this->client->post("/api/configs", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::JSON => $request,
            ]);

            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        ConfigOutputDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(ConfigErr::SET_CONFIG_FORBIDDEN);
                default:
                    throw $this->errorFactory->create(ConfigErr::SET_CONFIG_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(ConfigErr::SET_CONFIG_FAILED));
        }
    }
}
