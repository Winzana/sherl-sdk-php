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
     * Retrieves all IAM profiles filtered by the provided parameters.
     *
     * @param array $filters Array of filters to apply to the IAM profiles query.
     * @return IamProfilesFilterDto The filtered IAM profiles data result.
     * @throws SherlException If there is an error while fetching the IAM profiles.
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
     * Retrieves an IAM profile by its unique identifier.
     *
     * @param string $id The unique identifier of the IAM profile.
     * @return ProfileDto The profile data object.
     * @throws SherlExcep tion If there is an error while fetching the IAM profile.
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
     * Retrieves an IAM role by its unique identifier.
     *
     * @param string $id The unique identifier of the IAM role.
     * @return ProfileDto The role data object.
     * @throws SherlException If there is an error while fetching the IAM role.
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
