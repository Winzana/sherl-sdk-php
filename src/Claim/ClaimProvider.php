<?php

namespace Sherl\Sdk\Claim;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

use Psr\Http\Message\ResponseInterface;
use Sherl\Sdk\Claim\Dto\ClaimFindOneByInputDto;
use Sherl\Sdk\Claim\Dto\ClaimOutputDto;
use Sherl\Sdk\Claim\Dto\ClaimsResultOutputDto;
use Sherl\Sdk\Claim\Dto\CreateClaimInput;
use Sherl\Sdk\Claim\Dto\FindClaimsInputDto;
use Sherl\Sdk\Claim\Dto\ReplyToClaimInputDto;
use Sherl\Sdk\Claim\Dto\UpdateClaimInputDto;

use Sherl\Sdk\Common\Error\SherlException;
use Sherl\Sdk\Common\SerializerFactory;

use Exception;

use Sherl\Sdk\Common\Error\ErrorFactory;
use Sherl\Sdk\Common\Error\ErrorHelper;
use Sherl\Sdk\Claim\Errors\ClaimErr;

class ClaimProvider
{
    public const DOMAIN = "Claim";
    private ErrorFactory $errorFactory;
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->errorFactory = new ErrorFactory(self::DOMAIN, ClaimErr::$errors);
    }

    /**
 * Creates a claim based on the provided input data.
 *
 * @param CreateClaimInput $createClaim The input data for creating the claim.
 * @return ClaimOutputDto|null The created claim object or null if creation fails.
 * @throws SherlException If an error occurs during the claim creation process.
 */
    public function createClaim(CreateClaimInput $createClaim): ?ClaimOutputDto
    {
        try {
            $id = $createClaim->id;
            $response = $this->client->post(
                "/api/claims/$id",
                [
                "headers" => [
                  "Content-Type" => "application/json",
                ],
                RequestOptions::JSON => [
                  'id' => $createClaim->id,
                  'personId' => $createClaim->personId,
                  'issueTitle' => $createClaim->issueTitle,
                  'issueMessage' => $createClaim->issueMessage,
                  'schedules' => $createClaim->schedules,
                ]
      ]
            );

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ClaimOutputDto::class,
                'json'
            );

        } catch (\Exception $err) {

            if ($err instanceof \GuzzleHttp\Exception\ClientException) {

                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ClaimErr::CREATE_CLAIM_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ClaimErr::CLAIM_NOT_FOUND);
                }
            }
            throw $this->errorFactory->create(ClaimErr::CREATE_CLAIM_ERROR);
        }

    }

    /**
 * Updates the status of a claim identified by the provided claim ID.
 *
 * @param string $claimId The ID of the claim to update.
 * @param UpdateClaimInputDto $updateClaim The input data containing the updated status.
 * @return ClaimOutputDto|null The updated claim object or null if the update fails.
 * @throws SherlException If an error occurs during the claim update process.
 */
    public function updateClaim(string $claimId, UpdateClaimInputDto $updateClaim): ?ClaimOutputDto
    {
        try {
            $response = $this->client->put(
                "/api/claims/$claimId",
                [
                "headers" => [
                  "Content-Type" => "application/json",
                ],
                RequestOptions::JSON => [
                  'status' => $updateClaim->status,
                ]
      ]
            );
            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ClaimOutputDto::class,
                'json'
            );

        } catch (\Exception $err) {

            if ($err instanceof \GuzzleHttp\Exception\ClientException) {

                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ClaimErr::UPDATE_CLAIM_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ClaimErr::CLAIM_NOT_FOUND);
                }
            }
            throw $this->errorFactory->create(ClaimErr::UPDATE_CLAIM_ERROR);
        }

    }

    /**
 * Retrieves the claim information for the claim identified by the provided claim ID.
 *
 * @param string $claimId The ID of the claim to retrieve.
 * @return ClaimOutputDto|null The claim object representing the retrieved claim, or null if the claim is not found.
 * @throws SherlException If an error occurs during the claim retrieval process.
 */
    public function getClaim(string $claimId): ?ClaimOutputDto
    {
        try {
            $response = $this->client->get(
                "/api/claims/$claimId",
                [
                "headers" => [
                  "Content-Type" => "application/json",
                ],
      ]
            );
            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ClaimOutputDto::class,
                'json'
            );

        } catch (\Exception $err) {

            if ($err instanceof \GuzzleHttp\Exception\ClientException) {

                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ClaimErr::GET_CLAIM_BY_ID_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ClaimErr::CLAIM_NOT_FOUND);

                }
            }
            throw $this->errorFactory->create(ClaimErr::GET_CLAIM_BY_ID_FAILED);
        }
    }

    /**
 * Retrieves a list of claims based on the provided filters.
 *
 * @param FindClaimsInputDto $filters The filters to apply to the claims retrieval query.
 * @return ClaimsResultOutputDto|null A list of claim objects representing the retrieved claims, or null if the retrieval fails.
 * @throws SherlException If an error occurs during the claims retrieval process.
 */
    public function getClaims(FindClaimsInputDto $filters): ?ClaimsResultOutputDto
    {
        try {
            $response = $this->client->get(
                "/api/claims",
                [
                "headers" => [
                  "Content-Type" => "application/json",
                ],
                RequestOptions::QUERY => [
                  'filters' => $filters,
                  'page' => $filters->page,
                  'itemsPerPage' => $filters->itemsPerPage,
                ]
      ]
            );

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ClaimsResultOutputDto::class,
                'json'
            );

        } catch (\Exception $err) {

            if ($err instanceof \GuzzleHttp\Exception\ClientException) {

                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ClaimErr::GET_ALL_CLAIM_FORBIDDEN);

                }
            }
            throw $this->errorFactory->create(ClaimErr::GET_ALL_CLAIM_FAILED);
        }

    }

    /**
 * Finds a claim by the specified criteria.
 *
 * @param ClaimFindOneByInputDto $findClaimOneBy The criteria to search for the claim.
 * @return ClaimOutputDto|null The claim object matching the criteria, or null if not found.
 * @throws SherlException If an error occurs during the claim search process.
 */
    public function findClaimBy(ClaimFindOneByInputDto $findClaimOneBy): ?ClaimOutputDto
    {
        try {
            $response = $this->client->get(
                "/api/claims/find-one-by",
                [
                "headers" => [
                  "Content-Type" => "application/json",
                ],
                RequestOptions::QUERY => [
                  'consumerId' => $findClaimOneBy->consumerId,
                  'orderId' => $findClaimOneBy->orderId,
                  'personId' => $findClaimOneBy->personId,
                  'id' => $findClaimOneBy->id,
                ]
      ]
            );

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ClaimOutputDto::class,
                'json'
            );

        } catch (\Exception $err) {

            if ($err instanceof \GuzzleHttp\Exception\ClientException) {

                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ClaimErr::FIND_CLAIM_BY_FORBIDDEN);

                }
            }
            throw $this->errorFactory->create(ClaimErr::FIND_CLAIM_BY_FAILED);
        }

    }

    /**
 * Replies to a claim identified by the provided claim ID.
 *
 * @param string $claimId The ID of the claim to reply to.
 * @param ReplyToClaimInputDto $replyToClaim The input data containing the reply content.
 * @return ClaimOutputDto|null The updated claim object after replying, or null if the reply fails.
 * @throws SherlException If an error occurs during the reply process.
 */
    public function replyToClaim(string $claimId, ReplyToClaimInputDto $replyToClaim): ?ClaimOutputDto
    {
        try {
            $response = $this->client->post(
                "/api/claims/$claimId/reply",
                [
                "headers" => [
                  "Content-Type" => "application/json",
                ],
                RequestOptions::JSON => [
                  'content' => $replyToClaim->content,
                ]
      ]
            );

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ClaimOutputDto::class,
                'json'
            );

        } catch (\Exception $err) {

            if ($err instanceof \GuzzleHttp\Exception\ClientException) {

                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ClaimErr::REPLY_CLAIM_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ClaimErr::CLAIM_NOT_FOUND);

                }
            }
            throw $this->errorFactory->create(ClaimErr::REPLY_CLAIM_FAILED);
        }


    }

    /**
 * Initiates a refund for the claim identified by the provided claim ID.
 *
 * @param string $claimId The ID of the claim to refund.
 * @return ClaimOutputDto|null The claim object representing the refunded claim, or null if the refund fails.
 * @throws SherlException If an error occurs during the refund process.
 */
    public function refundClaim(string $claimId): ?ClaimOutputDto
    {
        try {
            $response = $this->client->post(
                "/api/claims/$claimId/refund",
                [
                "headers" => [
                  "Content-Type" => "application/json",
                ],
      ]
            );

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ClaimOutputDto::class,
                'json'
            );
        } catch (\Exception $err) {

            if ($err instanceof \GuzzleHttp\Exception\ClientException) {

                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ClaimErr::REFUND_CLAIM_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ClaimErr::CLAIM_NOT_FOUND);

                }
            }
            throw $this->errorFactory->create(ClaimErr::REFUND_CLAIM_FAILED);
        }


    }
}
