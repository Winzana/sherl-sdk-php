<?php

namespace Sherl\Sdk\Iam;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;
use Sherl\Sdk\Common\Error\SherlException;
use Exception;
use Sherl\Sdk\Common\Error\ErrorFactory;
use Sherl\Sdk\Common\Error\ErrorHelper;
use Sherl\Sdk\Iam\Errors\IamErr;

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
        $this->errorFactory = new ErrorFactory('Iam', IamErr::$errors);
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

            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        IIam::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(IamErr::IAM_GET_ALL_FORBIDDEN);
                default:
                    throw $this->errorFactory->create(IamErr::FETCH_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(IamErr::FETCH_FAILED));
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


            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        IIam::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(IamErr::IAM_GET_PROFILE_BY_ID_FORBIDDEN);
                case 404:
                    throw $this->errorFactory->create(IamErr::IAM_PROFILE_NOT_FOUND_ERROR);
                default:
                    throw $this->errorFactory->create(IamErr::FETCH_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(IamErr::FETCH_FAILED));
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

            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        IIam::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(IamErr::IAM_GET_ROLE_BY_ID_FORBIDDEN);
                case 404:
                    throw $this->errorFactory->create(IamErr::IAM_ROLE_NOT_FOUND_ERROR);
                default:
                    throw $this->errorFactory->create(IamErr::FETCH_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(IamErr::FETCH_FAILED));
        }
    }
}
