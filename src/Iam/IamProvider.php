<?php

namespace Sherl\Sdk\Iam;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;
use Sherl\Sdk\Common\Error\SherlException;


class IamProvider
{
    public const DOMAIN = "Iam";

    private Client $client;
    private array $endpoints;

    public function __construct(Client $client, array $endpoints)
    {
        $this->client = $client;
        $this->endpoints = $endpoints;
    }

    private function throwSherlIamException(ResponseInterface $response)
    {
        throw new SherlException(SherlException::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
    }

    public function getAllIamProfiles(array $filters): array {
        try {
            $response = $this->client->get($this->endpoints['GET_ALL_IAM_PROFILES'], [
                'query' => $filters
            ]);

            if ($response->getStatusCode() !== 200) {
                $this->throwSherlIamException($response);
            }

            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            throw new SherlException(SherlException::FETCH_FAILED, $e->getMessage());
        }
    }

    public function getIamProfileById(string $id): array {
        try {
            $endpoint = str_replace('{id}', $id, $this->endpoints['GET_IAM_PROFILE_BY_ID']);
            $response = $this->client->get($endpoint);

            if ($response->getStatusCode() !== 200) {
                $this->throwSherlIamException($response);
            }

            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            throw new SherlException(SherlException::FETCH_FAILED, $e->getMessage());
        }
    }

    public function getIamRoleById(string $id): array {
        try {
            $endpoint = str_replace('{id}', $id, $this->endpoints['GET_IAM_ROLE_BY_ID']);
            $response = $this->client->get($endpoint);

            if ($response->getStatusCode() !== 200) {
                $this->throwSherlIamException($response);
            }

            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            throw new SherlException(SherlException::FETCH_FAILED, $e->getMessage());
        }
    }
}
