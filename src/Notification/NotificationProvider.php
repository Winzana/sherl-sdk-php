<?php

namespace Sherl\Sdk\Notification;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

use Psr\Http\Message\ResponseInterface;

use Sherl\Sdk\Common\Error\SherlException;
use Sherl\Sdk\Common\SerializerFactory;

use Sherl\Sdk\Notification\Dto\NotificationFiltersInputDto;
use Sherl\Sdk\Notification\Dto\NotificationListOutputDto;
use Sherl\Sdk\Notification\Dto\NotificationOutputDto;
use Sherl\Sdk\Notification\Dto\NotificationRegistrationOutputDto;
use Sherl\Sdk\Notification\Dto\NotificationUpdateInputDto;
use Sherl\Sdk\Notification\Dto\SendNotificationInputDto;
use Sherl\Sdk\Notification\Enum\NotificationType;

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
    $response = $this->client->get('/api/notifications', [
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

  public function registerFirebaseNotification(string $notificationRegistrationToken): ?NotificationRegistrationOutputDto
  {
    $response = $this->client->post('/api/notifications', [
      "headers" => [
        "Content-Type" => "application/json",
      ],
      RequestOptions::JSON => [
        'token' => $notificationRegistrationToken,
      ],
    ]);

    if ($response->getStatusCode() >= 300) {
      return $this->throwSherlNotificationException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
      $response->getBody()->getContents(),
      NotificationRegistrationOutputDto::class,
      'json'
    );
  }

  public function updateNotification(string $notificationId, NotificationUpdateInputDto $notificationUpdateInput): ?NotificationOutputDto
  {
    $response = $this->client->put("/api/notifications/$notificationId", [
      "headers" => [
        "Content-Type" => "application/json",
      ],
      RequestOptions::JSON => $notificationUpdateInput
    ]);

    if ($response->getStatusCode() >= 300) {
      return $this->throwSherlNotificationException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
      $response->getBody()->getContents(),
      NotificationOutputDto::class,
      'json'
    );
  }

  public function disableNotificationToOrganization(string $notificationId, string $organizationId): ?NotificationOutputDto
  {
    $response = $this->client->post(
      "/api/notifications/$notificationId/disable-to-organization",
      [
        "headers" => [
          "Content-Type" => "application/json",
        ],
        RequestOptions::JSON => [
          'organizationId' => $organizationId
        ]
      ]
    );

    if ($response->getStatusCode() >= 300) {
      return $this->throwSherlNotificationException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
      $response->getBody()->getContents(),
      NotificationOutputDto::class,
      'json'
    );
  }

  public function enableNotificationToOrganization(string $notificationId, string $organizationId): ?NotificationOutputDto
  {
    $response = $this->client->post(
      "/api/notifications/$notificationId/enable-to-organization",
      [
        "headers" => [
          "Content-Type" => "application/json",
        ],
        RequestOptions::JSON => [
          'organizationId' => $organizationId
        ]
      ]
    );

    if ($response->getStatusCode() >= 300) {
      return $this->throwSherlNotificationException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
      $response->getBody()->getContents(),
      NotificationOutputDto::class,
      'json'
    );
  }

  public function sendNotificationByType(NotificationType $notificationType, SendNotificationInputDto $sendNotificationInput): ?bool
  {
    $type = $notificationType->value;
    $response = $this->client->post(
      "/api/notification/$type",
      [
        "headers" => [
          "Content-Type" => "application/json",
        ],
        RequestOptions::JSON => $sendNotificationInput,
      ]
    );

    if ($response->getStatusCode() >= 300) {
      return $this->throwSherlNotificationException($response);
    }

    return filter_var($response->getBody()->getContents(), FILTER_VALIDATE_BOOLEAN);
  }
}
