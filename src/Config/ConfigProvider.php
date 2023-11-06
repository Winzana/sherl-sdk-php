<?php

namespace Sherl\Sdk\Notification;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

use Psr\Http\Message\ResponseInterface;

use Sherl\Sdk\Common\Error\SherlException;
use Sherl\Sdk\Common\SerializerFactory;

use Sherl\Sdk\Config\Dto\ConfigOutputDto;
use Sherl\Sdk\Config\Dto\SetConfigInputDto;

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