<?php

namespace Sherl\Sdk\Opinion\Media;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;

use Sherl\Sdk\Common\Error\MediaException;
use Sherl\Sdk\Common\SerializerFactory;

use Sherl\Sdk\Opinion\Dto\OpinionDto;
use Sherl\Sdk\Opinion\Dto\OpinionAverageOutputDto;
use Sherl\Sdk\Opinion\Dto\OpinionListOutputDto;
use Sherl\Sdk\Opinion\Dto\AverageDto;
use Exception;
use Sherl\Sdk\Common\Error\ErrorFactory;
use Sherl\Sdk\Common\Error\ErrorHelper;
use Sherl\Sdk\Opinion\Errors\OpinionErr;

class OpinionProvider
{
    public const DOMAIN = "Opinion";


    private Client $client;
    private ErrorFactory $errorFactory;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->errorFactory = new ErrorFactory('Opinion', OpinionErr::$errors);
    }

    public function createOpinion(string $id, OpinionDto $opinionData): ?OpinionDto
    {
        try {
            $response = $this->client->post("/api/opinions/$id", [
                "headers" => [
                    "Content-Type" => "application/json",
                ],
                RequestOptions::JSON => $opinionData,
            ]);

            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        OpinionDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(OpinionErr::CREATE_OPINION_FORBIDDEN);
                default:
                    throw $this->errorFactory->create(OpinionErr::CREATE_OPINION_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(OpinionErr::CREATE_OPINION_FAILED));
        }
    }

    public function getOpinionsAverage(string $opinionToUri): ?AverageDto
    {
        try {
            $response = $this->client->get('/api/opinions/average', [
                RequestOptions::QUERY => ['opinionToUri' => $opinionToUri],
            ]);

            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        OpinionDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(OpinionErr::FETCH_OPINION_AVERAGE_FORBIDDEN);
                default:
                    throw $this->errorFactory->create(OpinionErr::FETCH_OPINION_AVERAGE_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(OpinionErr::FETCH_OPINION_AVERAGE_FAILED));
        }
    }

    public function getOpinionsList(OpinionDto $filtersInput): ?OpinionDto
    {
        try {
            $response = $this->client->get('/api/opinions', [
                RequestOptions::QUERY => $filtersInput,
            ]);

            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        OpinionDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(OpinionErr::FETCH_OPINIONS_FORBIDDEN);
                default:
                    throw $this->errorFactory->create(OpinionErr::FETCH_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(OpinionErr::FETCH_FAILED));
        }
    }

    public function updateOpinion(string $id, OpinionDto $updatedOpinion): ?OpinionDto
    {
        try {
            $response = $this->client->put("/api/opinions/$id/status", [
                "headers" => [
                    "Content-Type" => "application/json",
                ],
                RequestOptions::JSON => $updatedOpinion,
            ]);

            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        OpinionDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(OpinionErr::FETCH_OPINIONS_FORBIDDEN);
                default:
                    throw $this->errorFactory->create(OpinionErr::FETCH_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(OpinionErr::FETCH_FAILED));
        }
    }
}
