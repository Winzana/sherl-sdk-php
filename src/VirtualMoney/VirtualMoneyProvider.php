<?php

namespace Sherl\Sdk\User;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

use Psr\Http\Message\ResponseInterface;

use Sherl\Sdk\Common\Error\SherlException;

use Sherl\Sdk\VirtualMoney\Dto\CreateWalletHistoricalInputDto;
use Sherl\Sdk\VirtualMoney\Dto\WalletHistoricalOutputDto;
use Sherl\Sdk\VirtualMoney\Dto\WalletHistoricalInputDto;
use Sherl\Sdk\VirtualMoney\Dto\WalletInputDto;
use Sherl\Sdk\VirtualMoney\Dto\WalletOuputDto;
use Sherl\Sdk\VirtualMoney\Dto\TransferWalletInputDto;

class VirtualMoneyProvider
{
    public const DOMAIN = "VirtualMoney";

    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    private function throwSherlVirtualMoneyException(ResponseInterface $response)
    {
        throw new SherlException(VirtualMoneyProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
    }

    public function createWalletHistorical(string $walletId, CreateWalletHistoricalInputDto $walletHistorical): ?WalletHistoricalOutputDto
    {
        $response = $this->client->post("/api/wallet/$walletId/historical", [
          "headers" => [
            "Content-Type" => "application/json",
          ],
          RequestOptions::JSON => $walletHistorical
        ]);

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlUserException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            WalletHistoricalOutputDto::class,
            'json'
        );
    }

    public function getWalletHistorical(
        string $walletId,
        string $historicalId
    ): ?WalletHistoricalOutputDto {
        $response = $this->client->get("api/wallet/$walletId/historical/$historicalId", [
            "headers" => [
              "Content-Type" => "application/json",
            ]
          ]);

        if ($response->getStatusCode() >= 300) {
            throw new SherlException(PersonProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            WalletHistoricalOutputDto::class,
            'json'
        );
    }

    public function createWallet(WalletInputDto $wallet): ?WalletOutputDto
    {
        $response = $this->client->post("/api/wallet", [
          "headers" => [
            "Content-Type" => "application/json",
          ],
          RequestOptions::JSON => $wallet
        ]);

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlUserException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            WalletOutputDto::class,
            'json'
        );
    }

    public function creditWallet(string $walletId, TransferWalletInputDto $transferWallet): ?WalletOutputDto
    {
        $response = $this->client->post("/api/wallet/$walletId/credit", [
          "headers" => [
            "Content-Type" => "application/json",
          ],
          RequestOptions::JSON => $transferWallet
        ]);

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlUserException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            WalletOutputDto::class,
            'json'
        );
    }

    public function debitWalet(string $walletId, TransferWalletInputDto $transferWallet): ?WalletOutputDto
    {
        $response = $this->client->post("/api/wallet/$walletId/debit", [
          "headers" => [
            "Content-Type" => "application/json",
          ],
          RequestOptions::JSON => $transferWallet
        ]);

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlUserException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            WalletOutputDto::class,
            'json'
        );
    }

    public function findOneWallet(
        string $id,
        string $personId,
        string $consumerId
    ): ?WalletOutputDto {
        $response = $this->client->get("/api/wallet/find-one", [
            "headers" => [
              "Content-Type" => "application/json",
            ], [
                "id" => $id,
                "personId" => $personId,
                "consumerId" => $consumerId
              ]
          ]);

        if ($response->getStatusCode() >= 300) {
            throw new SherlException(PersonProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            WalletOutputDto::class,
            'json'
        );
    }

    public function getWalletById(
        string $walletId,
    ): ?WalletOutputDto {
        $response = $this->client->get("api/wallet/$walletId", [
            "headers" => [
              "Content-Type" => "application/json",
            ]
          ]);

        if ($response->getStatusCode() >= 300) {
            throw new SherlException(PersonProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            WalletOutputDto::class,
            'json'
        );
    }
}
