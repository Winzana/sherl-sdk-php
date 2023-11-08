<?php

namespace Sherl\Sdk\Opinion\Media;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;

use Sherl\Sdk\Common\Error\MediaException;
use Sherl\Sdk\Common\SerializerFactory;

use Sherl\Sdk\Opinion\Media\Dto\OpinionInputDto;
use Sherl\Sdk\Opinion\Media\Dto\OpinionOutputDto;
use Sherl\Sdk\Opinion\Media\Dto\OpinionAverageOutputDto;
use Sherl\Sdk\Opinion\Media\Dto\OpinionListOutputDto;

class MediaProvider
{
    public const DOMAIN = "Media";

    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    private function throwMediaException(ResponseInterface $response)
    {
        throw new MediaException(MediaProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
    }

    public function createOpinion(string $opinionId, OpinionInputDto $opinionData): ?OpinionOutputDto
    {
        $response = $this->client->post("/api/opinions/$opinionId", [
            "headers" => [
                "Content-Type" => "application/json",
            ],
            RequestOptions::JSON => $opinionData,
        ]);

        if ($response->getStatusCode() >= 300) {
            return $this->throwMediaException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            OpinionOutputDto::class,
            'json'
        );
    }

    public function getOpinionsAverage(string $opinionToUri): ?OpinionAverageOutputDto
    {
        $response = $this->client->get('/api/opinions/average', [
            RequestOptions::QUERY => ['opinionToUri' => $opinionToUri],
        ]);

        if ($response->getStatusCode() >= 300) {
            return $this->throwMediaException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            OpinionAverageOutputDto::class,
            'json'
        );
    }

    public function getOpinionsList(OpinionInputDto $filtersInput): ?OpinionListOutputDto
    {
        $response = $this->client->get('/api/opinions', [
            RequestOptions::QUERY => $filtersInput,
        ]);

        if ($response->getStatusCode() >= 300) {
            return $this->throwMediaException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            OpinionListOutputDto::class,
            'json'
        );
    }

    public function updateOpinion(string $id, OpinionInputDto $updatedOpinion): ?OpinionOutputDto
    {
        $response = $this->client->put("/api/opinions/$id/status", [
            "headers" => [
                "Content-Type" => "application/json",
            ],
            RequestOptions::JSON => $updatedOpinion,
        ]);

        if ($response->getStatusCode() >= 300) {
            return $this->throwMediaException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            OpinionOutputDto::class,
            'json'
        );
    }
}
