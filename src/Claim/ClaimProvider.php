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

class ClaimProvider
{
  public const DOMAIN = "Claim";

  private Client $client;

  public function __construct(Client $client)
  {
    $this->client = $client;
  }

  private function throwSherlClaimException(ResponseInterface $response)
  {
    throw new SherlException(ClaimProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
  }

  public function createClaim(CreateClaimInput $createClaim): ?ClaimOutputDto
  {
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

    if ($response->getStatusCode() >= 300) {
      return $this->throwSherlClaimException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
      $response->getBody()->getContents(),
      ClaimOutputDto::class,
      'json'
    );
  }

  public function updateClaim(string $claimId, UpdateClaimInputDto $updateClaim): ?ClaimOutputDto
  {
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

    if ($response->getStatusCode() >= 300) {
      return $this->throwSherlClaimException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
      $response->getBody()->getContents(),
      ClaimOutputDto::class,
      'json'
    );
  }

  public function getClaim(string $claimId): ?ClaimOutputDto
  {
    $response = $this->client->get(
      "/api/claims/$claimId",
      [
        "headers" => [
          "Content-Type" => "application/json",
        ],
      ]
    );

    if ($response->getStatusCode() >= 300) {
      return $this->throwSherlClaimException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
      $response->getBody()->getContents(),
      ClaimOutputDto::class,
      'json'
    );
  }

  public function getClaims(FindClaimsInputDto $filters): ?ClaimsResultOutputDto
  {
    $response = $this->client->get(
      "/api/claims",
      [
        "headers" => [
          "Content-Type" => "application/json",
        ],
        RequestOptions::QUERY => [
          'filters' => $filters->filters,
          'page' => $filters->page,
          'itemsPerPage' => $filters->itemsPerPage,
        ]
      ]
    );

    if ($response->getStatusCode() >= 300) {
      return $this->throwSherlClaimException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
      $response->getBody()->getContents(),
      ClaimsResultOutputDto::class,
      'json'
    );
  }

  public function findClaimBy(ClaimFindOneByInputDto $findClaimOneBy): ?ClaimOutputDto
  {
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

    if ($response->getStatusCode() >= 300) {
      return $this->throwSherlClaimException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
      $response->getBody()->getContents(),
      ClaimOutputDto::class,
      'json'
    );
  }

  public function replyToClaim(string $claimId, ReplyToClaimInputDto $replyToClaim): ?ClaimOutputDto
  {
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

    if ($response->getStatusCode() >= 300) {
      return $this->throwSherlClaimException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
      $response->getBody()->getContents(),
      ClaimOutputDto::class,
      'json'
    );
  }

  public function refundClaim(string $claimId): ?ClaimOutputDto
  {
    $response = $this->client->post(
      "/api/claims/$claimId/refund",
      [
        "headers" => [
          "Content-Type" => "application/json",
        ],
      ]
    );

    if ($response->getStatusCode() >= 300) {
      return $this->throwSherlClaimException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
      $response->getBody()->getContents(),
      ClaimOutputDto::class,
      'json'
    );
  }
}
