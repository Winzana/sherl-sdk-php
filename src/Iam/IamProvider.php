<?php

namespace Sherl\Sdk\Iam;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;
use Sherl\Sdk\Common\Error\SherlException;
use Exception;
use Sherl\Sdk\Common\Error\ErrorFactory;
use Sherl\Sdk\Iam\Errors\IamErr;
use Sherl\Sdk\Iam\Dto\IamProfilesFilterDto;
use Sherl\Sdk\Iam\Dto\ProfileDto;
use Sherl\Sdk\Common\SerializerFactory;
use Sherl\Sdk\Iam\Dto\RoleDto;

class IamProvider
{
    public const DOMAIN = "Iam";

    private Client $client;
    private ErrorFactory $errorFactory;

    /**
     * IamProvider constructor.
     * @param Client $client The HTTP client used to make requests.
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->errorFactory = new ErrorFactory(self::DOMAIN, IamErr::$errors);
    }

    /**
     * Retrieves all IAM profiles filtered by the provided parameters.
     *
     * @param IamProfilesFilterDto $filters IamProfilesFilterDto to apply to the IAM profiles query.
     * @return ProfileDto[]|null The filtered IAM profiles data result.
     * @throws SherlException If there is an error while fetching the IAM profiles.
     */
    public function getAllIamProfiles(IamProfilesFilterDto $filters): ?array
    {
        try {
            $response = $this->client->get('/api/iam/profiles', [
                "headers" => [
                "Content-Type" => "application/json",
                ],
                RequestOptions::QUERY => $filters,
                ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ProfileDto::class,
                'json'
            );

        } catch (\Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(IamErr::IAM_GET_ALL_FORBIDDEN);
                }
                throw $this->errorFactory->create(IamErr::IAM_GET_ALL_FAILED);
            }
            return null;
        }
    }

    /**
     * Retrieves an IAM profile by its unique identifier.
     *
     * @param string $id The unique identifier of the IAM profile.
     * @return ProfileDto|null The profile data object.
     * @throws SherlException tion If there is an error while fetching the IAM profile.
     */
    public function getIamProfileById(string $id): ?ProfileDto
    {
        try {

            $response = $this->client->get("/api/iam/profiles/$id", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
            ]);


            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ProfileDto::class,
                'json'
            );
        } catch (\Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(IamErr::IAM_GET_PROFILE_BY_ID_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(IamErr::IAM_PROFILE_NOT_FOUND_ERROR);
                }
            }
            throw $this->errorFactory->create(IamErr::IAM_GET_PROFILE_BY_ID_FAILED);
        }
    }
    /**
     * Retrieves an IAM role by its unique identifier.
     *
     * @param string $id The unique identifier of the IAM role.
     * @return RoleDto|null The role data object.
     * @throws SherlException If there is an error while fetching the IAM role.
     */
    public function getIamRoleById(string $id): ?RoleDto
    {
        try {
            $response = $this->client->get("/api/iam/roles/$id", [
                "headers" => [
                  "Content-Type" => "application/json",
                ],
              ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                RoleDto::class,
                'json'
            );
        } catch (\Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {

                    case 403:
                        throw $this->errorFactory->create(IamErr::IAM_GET_ROLE_BY_ID_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(IamErr::IAM_ROLE_NOT_FOUND_ERROR);

                }
            }
            throw $this->errorFactory->create(IamErr::IAM_GET_ROLE_BY_ID_FAILED);
        }
    }
}
