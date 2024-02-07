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
