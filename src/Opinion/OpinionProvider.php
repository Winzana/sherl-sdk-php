<?php

namespace Sherl\Sdk\Opinion\Media;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;

use Sherl\Sdk\Common\Error\SherlException;
use Sherl\Sdk\Common\SerializerFactory;

use Sherl\Sdk\Opinion\Dto\OpinionDto;
use Sherl\Sdk\Opinion\Dto\OpinionAverageDto;
use Sherl\Sdk\Opinion\Dto\OpinionFilterDto;
use Sherl\Sdk\Opinion\Dto\CreateOpinionInputDto;
use Exception;
use Sherl\Sdk\Common\Error\ErrorFactory;
use Sherl\Sdk\Opinion\Errors\OpinionErr;

class OpinionProvider
{
    public const DOMAIN = "Opinion";


    private Client $client;
    private ErrorFactory $errorFactory;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->errorFactory = new ErrorFactory(self::DOMAIN, OpinionErr::$errors);
    }


    /**
     * Creates a new opinion related to a specific entity.
     *
     * @param string $id The ID of the entity to which the opinion is related.
     * @param OpinionDto $opinionData The opinion data as an OpinionDto object.
     * @return OpinionDto|null The created opinion if successful, otherwise null.
     * @throws SherlException If an error occurs during the request.
     */
    public function createOpinion(string $id, OpinionDto $opinionData): ?OpinionDto
    {
        try {
            $response = $this->client->post("/api/opinions/$id", [
                "headers" => [
                    "Content-Type" => "application/json",
                ],
                RequestOptions::JSON => $opinionData,
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                OpinionDto::class,
                'json'
            );

        } catch (\Exception $err) {

            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(OpinionErr::CREATE_OPINION_FORBIDDEN);
                }
            }
            throw $this->errorFactory->create(OpinionErr::CREATE_OPINION_FAILED);
        }
    }
    /**
     * Gets the average opinions for a specific entity.
     *
     * @param string $opinionToUri The URI of the entity.
     * @return OpinionAverageDto|null The average opinion data if successful, otherwise null.
     * @throws SherlException If an error occurs during the request.
     */
    public function getOpinionsAverage(string $opinionToUri): ?OpinionAverageDto
    {
        try {
            $response = $this->client->get('/api/opinions/average', [
                RequestOptions::QUERY => ['opinionToUri' => $opinionToUri],
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                OpinionAverageDto::class,
                'json'
            );

        } catch (\Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(OpinionErr::FETCH_OPINION_AVERAGE_FORBIDDEN);
                }
            }
            throw $this->errorFactory->create(OpinionErr::FETCH_OPINION_AVERAGE_FAILED);
        }
    }

    /**
     * Gets a list of opinions based on provided filters.
     *
     * @param OpinionFilterDto $filtersInput Filters to apply to the request as an OpinionFilterDto object.
     * @return OpinionDto|null Paginated opinion data if successful, otherwise null.
     * @throws SherlException If an error occurs during the request.
     */
    public function getOpinionsList(OpinionFilterDto $filtersInput): ?OpinionDto
    {
        try {
            $response = $this->client->get('/api/opinions', [
                RequestOptions::QUERY => $filtersInput,
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                OpinionDto::class,
                'json'
            );

        } catch (\Exception $err) {

            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(OpinionErr::FETCH_OPINIONS_FORBIDDEN);
                }
            }
            throw $this->errorFactory->create(OpinionErr::FETCH_FAILED);
        }
    }
    /**
     * Updates the status of an opinion.
     *
     * @param string $id The ID of the opinion to update.
     * @param OpinionDto $updatedOpinion The updated opinion data as an OpinionDto object.
     * @return OpinionDto|null The updated opinion if successful, otherwise null.
     * @throws SherlException If an error occurs during the request.
     */
    public function updateOpinion(string $id, OpinionDto $updatedOpinion): ?OpinionDto
    {
        try {
            $response = $this->client->put("/api/opinions/$id/status", [
                "headers" => [
                    "Content-Type" => "application/json",
                ],
                RequestOptions::JSON => $updatedOpinion,
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                OpinionDto::class,
                'json'
            );

        } catch (\Exception $err) {

            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(OpinionErr::FETCH_OPINIONS_FORBIDDEN);
                }
            }
            throw $this->errorFactory->create(OpinionErr::FETCH_FAILED);
        }
    }

    /**
 * Create a claim related to an opinion.
 *
 * @param string $id - The ID of the opinion to which the claim is related.
 * @param CreateOpinionInputDto $opinionData - The claim input data as OpinionDto object.
 * @return OpinionDto|null - Return the opinion with the claim created.
 * @throws SherlException - If an error occurs during the request.
 */
    public function createOpinionClaim(string $id, CreateOpinionInputDto $opinionData): ?OpinionDto
    {
        try {
            $response = $this->client->post("/api/opinions/$id/claim", [
                "headers" => [
                    "Content-Type" => "application/json",
                ],
                RequestOptions::JSON => $opinionData,
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                OpinionDto::class,
                'json'
            );

        } catch (\Exception $err) {

            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(OpinionErr::CREATE_OPINION_CLAIM_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(OpinionErr::OPINION_NOT_FOUND);

                }
            }
            throw $this->errorFactory->create(OpinionErr::CREATE_OPINION_CLAIM_FAILED);
        }
    }
    /**
     * Get opinions given by a user based on provided filters.
     *
     * @param OpinionFilterDto $filtersInput - Filters to apply to the request as OpinionDto object.
     * @return OpinionDto|null - Paginated opinion data if successful, otherwise null.
     * @throws SherlException - If an error occurs during the request.
     */
    public function getOpinionsIGive(OpinionFilterDto $filtersInput): ?OpinionDto
    {
        try {
            $response = $this->client->get('/api/opinions/i-give', [
                "headers" => [
                    "Content-Type" => "application/json",
                ],
                RequestOptions::QUERY => $filtersInput,
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                OpinionDto::class,
                'json'
            );

        } catch (\Exception $err) {

            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(OpinionErr::FETCH_OPINION_I_GIVE_FORBIDDEN);
                }
            }
            throw $this->errorFactory->create(OpinionErr::FETCH_OPINION_I_GIVE_FAILED);
        }
    }
    /**
     * Get public opinions based on provided filters.
     *
     * @param OpinionFilterDto $filtersInput - Filters to apply to the request as OpinionDto object.
     * @return OpinionDto|null - Paginated public opinion data if successful, otherwise null.
     * @throws SherlException - If an error occurs during the request.
     */
    public function getPublicOpinions(OpinionFilterDto $filtersInput): ?OpinionDto
    {
        try {
            $response = $this->client->get('/api/public/opinions', [
                "headers" => [
                    "Content-Type" => "application/json",
                ],
                RequestOptions::QUERY => $filtersInput,
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                OpinionDto::class,
                'json'
            );

        } catch (\Exception $err) {

            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(OpinionErr::FETCH_PUBLIC_OPINIONS_FORBIDDEN);
                    default:
                }
            }
            throw $this->errorFactory->create(OpinionErr::FETCH_FAILED);
        }
    }
}
