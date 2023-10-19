<?php

namespace Sherl\Sdk\Notification;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

use Psr\Http\Message\ResponseInterface;

use Sherl\Sdk\Common\Error\SherlException;
use Sherl\Sdk\Common\SerializerFactory;

use Sherl\Sdk\Notification\Dto\NotificationFiltersInputDto;
use Sherl\Sdk\Notification\Dto\NotificationListOutputDto;

class NotificationProvider
{
  public const DOMAIN = "Notification";

  private Client $client;

  public function __construct(Client $client)
  {
    $this->client = $client;
  }

  private function throwSherlNotificationException(ResponseInterface $response)
  {
    throw new SherlException(NotificationProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
  }

  public function getNotifications(NotificationFiltersInputDto $notificationFiltersInput): ?NotificationListOutputDto
  {
    $response = $this->client->get('/api/notification', [
      "headers" => [
        "Content-Type" => "application/json",
      ],
      RequestOptions::QUERY => $notificationFiltersInput,
    ]);

    if ($response->getStatusCode() >= 300) {
      return $this->throwSherlNotificationException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
      $response->getBody()->getContents(),
      NotificationListOutputDto::class,
      'json'
    );
  }
}
