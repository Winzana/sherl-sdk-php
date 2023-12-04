<?php

namespace Sherl\Sdk\Notification;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

use Psr\Http\Message\ResponseInterface;

use Sherl\Sdk\Common\Error\SherlException;
use Sherl\Sdk\Common\SerializerFactory;

use Sherl\Sdk\Config\Dto\ConfigOutputDto;
use Sherl\Sdk\Config\Dto\SetConfigInputDto;
use Sherl\Sdk\Config\Dto\NotificationListOutputDto;

class ConfigProvider
{
    public const DOMAIN = "Config";

    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    private function throwSherlConfigException(ResponseInterface $response)
    {
        throw new SherlException(ConfigProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
    }

    /**
     * Retrieves the public configuration for the given code.
     *
     * @param string $code The configuration code.
     * @return ConfigOutputDto|null The configuration output data object or null on failure.
     * @throws SherlException If there is an error during the config retrieval process.
     */
    public function getPublicConfig(string $code): ?NotificationListOutputDto
    {
        try {
            $response = $this->client->get("/api/public/configs/$code", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
            ]);

            if ($response->getStatusCode() >= 300) {
                return $this->throwSherlNotificationException($response);
            }

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ConfigOutputDto::class,
                'json'
            );
        } catch (\Exception $e) {
            throw new SherlException(SherlException::FETCH_FAILED, $e->getMessage());
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
            $response = $this->client->get("/api/configs", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::JSON => $request,
            ]);

            if ($response->getStatusCode() >= 300) {
                return $this->throwSherlNotificationException($response);
            }

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ConfigOutputDto::class,
                'json'
            );
        } catch (\Exception $e) {
            throw new SherlException(SherlException::FETCH_FAILED, $e->getMessage());
        }
    }
}
