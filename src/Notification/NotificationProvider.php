<?php

namespace Sherl\Sdk\Notification;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

use Psr\Http\Message\ResponseInterface;

use Sherl\Sdk\Common\Error\SherlException;
use Sherl\Sdk\Common\Error\ErrorFactory;
use Sherl\Sdk\Notification\Errors\NotificationErr;
use Exception;

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

    private ErrorFactory $errorFactory;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->errorFactory = new ErrorFactory(self::DOMAIN, NotificationErr::$errors);
    }

    /**
 * Retrieves the list of notifications based on the specified filters.
 *
 * @param NotificationFiltersInputDto $notificationFiltersInput The notification filters.
 * @return NotificationListOutputDto|null The list of notifications if successful, null otherwise.
 * @throws SherlException If retrieving notifications fails.
 */

    public function getNotifications(NotificationFiltersInputDto $notificationFiltersInput): ?NotificationListOutputDto
    {
        try {
            $response = $this->client->get('/api/notifications', [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::QUERY => $notificationFiltersInput,
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                NotificationListOutputDto::class,
                'json'
            );
        } catch (\Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(NotificationErr::GET_NOTIFICATIONS_FORBIDDEN);
                }
            }
            throw $this->errorFactory->create(NotificationErr::GET_NOTIFICATIONS_FAILED);
        }
    }
    /**
     * Registers the Firebase notification token for push notifications.
     *
     * @param string $notificationRegistrationToken The notification registration token.
     * @return NotificationRegistrationOutputDto|null The output data for the notification registration if successful, null otherwise.
     * @throws SherlException If registering Firebase notification fails.
     */

    public function registerFirebaseNotification(string $notificationRegistrationToken): ?NotificationRegistrationOutputDto
    {
        try {
            $response = $this->client->post('/api/notifications', [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::JSON => [
                'token' => $notificationRegistrationToken,
              ],
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                NotificationRegistrationOutputDto::class,
                'json'
            );
        } catch (\Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(NotificationErr::REGISTER_FIREBASE_NOTIFICATION_FORBIDDEN);
                }
            }
            throw $this->errorFactory->create(NotificationErr::REGISTER_FIREBASE_NOTIFICATION_FAILED);
        }
    }
    /**
     * Updates an existing notification with new information.
     *
     * @param string $notificationId The ID of the notification to update.
     * @param NotificationUpdateInputDto $notificationUpdateInput The new notification data.
     * @return NotificationOutputDto|null The output data of the updated notification if successful, null otherwise.
     * @throws SherlException If updating the notification fails.
     */

    public function updateNotification(string $notificationId, NotificationUpdateInputDto $notificationUpdateInput): ?NotificationOutputDto
    {
        try {
            $response = $this->client->put("/api/notifications/$notificationId", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::JSON => $notificationUpdateInput
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                NotificationOutputDto::class,
                'json'
            );

        } catch (\Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(NotificationErr::UPDATE_NOTIFICATION_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(NotificationErr::NOTIFICATION_NOT_FOUND);
                }
            }
            throw $this->errorFactory->create(NotificationErr::UPDATE_NOTIFICATION_FAILED);
        }
    }
    /**
     * Disables sending the notification to a specific organization.
     *
     * @param string $notificationId The ID of the notification to disable.
     * @param string $organizationId The ID of the organization to which to disable the notification.
     * @return NotificationOutputDto|null The output data of the disabled notification if successful, null otherwise.
     * @throws SherlException If disabling the notification fails.
     */

    public function disableNotificationToOrganization(string $notificationId, string $organizationId): ?NotificationOutputDto
    {
        try {
            $response = $this->client->post("/api/notifications/$notificationId/disable-to-organization", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::JSON => [
                'organizationId' => $organizationId
              ]
      ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                NotificationOutputDto::class,
                'json'
            );
        } catch (\Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(NotificationErr::DISABLE_TO_ORGANIZATION_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(NotificationErr::NOTIFICATION_NOT_FOUND);
                }
            }
            throw $this->errorFactory->create(NotificationErr::DISABLE_TO_ORGANIZATION_FAILED);
        }
    }

    /**
    * Enables sending the notification to a specific organization.
    *
    * @param string $notificationId The ID of the notification to enable.
    * @param string $organizationId The ID of the organization to which to enable the notification.
    * @return NotificationOutputDto|null The output data of the enabled notification if successful, null otherwise.
    * @throws SherlException If enabling the notification fails.
    */

    public function enableNotificationToOrganization(string $notificationId, string $organizationId): ?NotificationOutputDto
    {
        try {
            $response = $this->client->post("/api/notifications/$notificationId/enable-to-organization", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::JSON => [
                'organizationId' => $organizationId
              ]
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                NotificationOutputDto::class,
                'json'
            );
        } catch (\Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(NotificationErr::ENABLE_TO_ORGANIZATION_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(NotificationErr::NOTIFICATION_NOT_FOUND);
                }
            }
            throw $this->errorFactory->create(NotificationErr::ENABLE_TO_ORGANIZATION_FAILED);
        }
    }

    /**
 * Sends a notification of a certain type with the specified data.
 *
 * @param NotificationType $notificationType The type of notification to send.
 * @param SendNotificationInputDto $sendNotificationInput The notification data to send.
 * @return bool|null True if the notification was successfully sent, false otherwise.
 * @throws SherlException If sending the notification fails.
 */

    public function sendNotificationByType(NotificationType $notificationType, SendNotificationInputDto $sendNotificationInput): ?bool
    {
        try {
            $type = $notificationType->value;
            $response = $this->client->post("/api/notification/$type", [
                "headers" => [
                  "Content-Type" => "application/json",
                ],
                RequestOptions::JSON => $sendNotificationInput,
            ]);

            return filter_var($response->getBody()->getContents(), FILTER_VALIDATE_BOOLEAN);
        } catch (\Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(NotificationErr::SEND_NOTIFICATION_BY_TYPE_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(NotificationErr::TYPE_NOT_FOUND);
                }
            }
            throw $this->errorFactory->create(NotificationErr::SEND_NOTIFICATION_BY_TYPE_FAILED);
        }
    }
}
