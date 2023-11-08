<?php

namespace Sherl\Sdk\Opinion\Media;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use Sherl\Sdk\Common\Error\MediaException;

class MediaProvider
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    private function processResponse(ResponseInterface $response)
    {
        if ($response->getStatusCode() !== 200) {
            throw new MediaException($response->getBody()->getContents(), $response->getStatusCode());
        }
        return json_decode($response->getBody()->getContents(), true);
    }

    private function getUriWithId(string $uri, string $id): string
    {
        return str_replace(':id', $id, $uri);
    }

    public function createOpinionClaim(string $opinionId, array $claim)
    {
        try {
            $response = $this->client->post(
                $this->getUriWithId('/api/opinions/:id/claim', $opinionId),
                ['json' => $claim]
            );
            return $this->processResponse($response);
        } catch (GuzzleException $e) {
            throw new MediaException(MediaException::CREATE_OPINION_CLAIM_FAILED, $e->getMessage());
        }
    }

    public function createOpinion(string $opinionId, array $opinionData)
    {
        try {
            $response = $this->client->post(
                $this->getUriWithId('/api/opinions/:id', $opinionId),
                ['json' => $opinionData]
            );
            return $this->processResponse($response);
        } catch (GuzzleException $e) {
            throw new MediaException(MediaException::CREATE_OPINION_FAILED, $e->getMessage());
        }
    }

    public function getOpinionsAverage(string $opinionToUri)
    {
        try {
            $response = $this->client->get('/api/opinions/average', ['query' => ['opinionToUri' => $opinionToUri]]);
            return $this->processResponse($response);
        } catch (GuzzleException $e) {
            throw new MediaException(MediaException::FETCH_OPINION_AVERAGE_FAILED, $e->getMessage());
        }
    }

    public function getOpinionsIGive(array $filters)
    {
        try {
            $response = $this->client->get('/api/opinions/i-give', ['query' => $filters]);
            return $this->processResponse($response);
        } catch (GuzzleException $e) {
            throw new MediaException(MediaException::FETCH_FAILED, $e->getMessage());
        }
    }

    public function getOpinions(array $filters)
    {
        try {
            $response = $this->client->get('/api/opinions', ['query' => $filters]);
            return $this->processResponse($response);
        } catch (GuzzleException $e) {
            throw new MediaException(MediaException::FETCH_FAILED, $e->getMessage());
        }
    }

    public function getPublicOpinions(array $filters)
    {
        try {
            $response = $this->client->get('/api/public/opinions', ['query' => $filters]);
            return $this->processResponse($response);
        } catch (GuzzleException $e) {
            throw new MediaException(MediaException::FETCH_FAILED, $e->getMessage());
        }
    }

    public function updateOpinion(string $id, array $updatedOpinion)
    {
        try {
            $response = $this->client->put(
                $this->getUriWithId('/api/opinions/:id/status', $id),
                ['json' => $updatedOpinion]
            );
            return $this->processResponse($response);
        } catch (GuzzleException $e) {
            throw new MediaException(MediaException::UPDATE_OPINION_FAILED, $e->getMessage());
        }
    }
}
