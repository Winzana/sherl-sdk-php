<?php

namespace Sherl\Sdk\Notification;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

use Psr\Http\Message\ResponseInterface;

use Sherl\Sdk\Common\Error\SherlException;
use Sherl\Sdk\Common\Error\ErrorFactory;
use Sherl\Sdk\Common\Error\ErrorHelper;
use Sherl\Sdk\Communication\Errors\CommunicationErr;
use Exception;

use Sherl\Sdk\Common\SerializerFactory;

use Sherl\Sdk\Communication\Dto\CommunicationOutputDto;
use Sherl\Sdk\Communication\Dto\CommunicationFindByInputDto;

class CommunicationProvider
{
    public const DOMAIN = "Communication";

    private Client $client;

    private ErrorFactory $errorFactory;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->errorFactory = new ErrorFactory(self::DOMAIN, CommunicationErr::$errors);
    }

    /**
     * Retrieves communication data based on the provided filters.
     *
     * @param CommunicationFindByInputDto $filters The filters to apply to the communication query.
     * @return CommunicationOutputDto|null The communication output data object or null on failure.
     * @throws SherlException If there is an error during the communication retrieval process.
     */
    public function getCommunication(CommunicationFindByInputDto $filters): ?CommunicationOutputDto
    {
        try {
            $response = $this->client->get('/api/communications', [
                "headers" => [
                  "Content-Type" => "application/json",
                ],
                RequestOptions::QUERY => $filters,
              ]);

            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        CommunicationOutputDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(CommunicationErr::GET_COMMUNICATION_FORBIDDEN);
                case 404:
                    throw $this->errorFactory->create(CommunicationErr::COMMUNICATION_NOT_FOUND);
                default:
                    throw $this->errorFactory->create(CommunicationErr::GET_COMMUNICATION_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(CommunicationErr::GET_COMMUNICATION_FAILED));
        }
    }
}
