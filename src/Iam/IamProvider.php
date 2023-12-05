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

    /**
     * IamProvider constructor.
     * @param Client $client The HTTP client used to make requests.
     * @param array $endpoints The endpoints used for IAM operations.
     */
    public function __construct(Client $client, array $endpoints)
    {
        $this->client = $client;
        $this->endpoints = $endpoints;
    }

    /**
     * Throws an IAM exception based on the response.
     * @param ResponseInterface $response The response from the HTTP client.
     * @throws SherlException Throws a SherlException with response details.
     */
    private function throwSherlIamException(ResponseInterface $response)
    {
        throw new SherlException(SherlException::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
    }
    /**
     * Retrieves all IAM profiles matching the specified filters.
     * @param array $filters The filters to apply to the IAM profiles retrieval.
     * @return IamProfilesFilterDto The filtered IAM profiles.
     * @throws SherlException If the response status code is not 200.
     */
    public function getAllIamProfiles(array $filters): IamProfilesFilterDto
    {
        try {
            $response = $this->client->get('/api/iam/profiles', [
                "headers" => [
                "Content-Type" => "application/json",
                ],
                RequestOptions::QUERY => $filters,
                ]);

            if ($response->getStatusCode() !== 200) {
                $this->throwSherlIamException($response);
            }

            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            throw new SherlException(SherlException::FETCH_FAILED, $e->getMessage());
        }
    }
    /**
     * Retrieves an IAM profile by its identifier.
     * @param string $id The identifier of the IAM profile.
     * @return ProfileDto The IAM profile data transfer object.
     * @throws SherlException If the response status code is not 200 or fetching fails.
     */
    public function getIamProfileById(string $id): ProfileDto
    {
        try {

            $response = $this->client->get("/api/iam/profiles/$id", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
            ]);


            if ($response->getStatusCode() !== 200) {
                $this->throwSherlIamException($response);
            }

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ProfileDto::class,
                'json'
            );
        } catch (\Exception $e) {
            throw new SherlException(SherlException::FETCH_FAILED, $e->getMessage());
        }
    }

    /**
     * Retrieves an IAM role by its identifier.
     * @param string $id The identifier of the IAM role.
     * @return ProfileDto The IAM role data transfer object.
     * @throws SherlException If the response status code is not 200 or fetching fails.
     */
    public function getIamRoleById(string $id): ProfileDto
    {
        try {
            $response = $this->client->get("/api/iam/roles/$id", [
                "headers" => [
                  "Content-Type" => "application/json",
                ],
              ]);
            if ($response->getStatusCode() !== 200) {
                $this->throwSherlIamException($response);
            }
            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ProfileDto::class,
                'json'
            );
        } catch (\Exception $e) {
            throw new SherlException(SherlException::FETCH_FAILED, $e->getMessage());
        }
    }
}
