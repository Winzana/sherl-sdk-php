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
use Sherl\Sdk\VirtualMoney\Dto\WalletOutputDto;

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

    /**
     * Creates a wallet historical record for a specific wallet.
     *
     * @param string $walletId The unique identifier of the wallet.
     * @param CreateWalletHistoricalInputDto $walletHistorical The wallet historical input data transfer object.
     * @return WalletHistoricalOutputDto|null The wallet historical output data object or null on failure.
     * @throws SherlException If there is an error during the wallet historical creation process.
     */
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

    /**
     * Retrieves a wallet historical record by wallet and historical IDs.
     *
     * @param string $walletId The unique identifier of the wallet.
     * @param string $historicalId The unique identifier of the historical record.
     * @return WalletHistoricalOutputDto|null The wallet historical output data object or null on failure.
     * @throws SherlException If there is an error during the retrieval process.
     */
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

    /**
     * Creates a new wallet with the given details.
     *
     * @param WalletInputDto $wallet The wallet input data object.
     * @return WalletOutputDto|null The wallet output data object or null on failure.
     * @throws SherlException If there is an error during the wallet creation process.
     */
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

    /**
     * Credits a wallet with a specified amount.
     *
     * @param string $walletId The unique identifier of the wallet to credit.
     * @param TransferWalletInputDto $transferWallet The transfer wallet input data object.
     * @return WalletOutputDto|null The wallet output data object or null on failure.
     * @throws SherlException If there is an error during the credit operation.
     */
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

    /**
     * Debits a wallet by a specified amount.
     *
     * @param string $walletId The unique identifier of the wallet to debit.
     * @param TransferWalletInputDto $transferWallet The transfer wallet input data object.
     * @return WalletOutputDto|null The wallet output data object or null on failure.
     * @throws SherlException If there is an error during the debit operation.
     */
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

    /**
     * Finds a single wallet based on the given identifiers.
     *
     * @param string $id The unique identifier of the wallet.
     * @param string $personId The unique identifier of the person associated with the wallet.
     * @param string $consumerId The unique identifier of the consumer associated with the wallet.
     * @return WalletOutputDto|null The wallet output data object or null on failure.
     * @throws SherlException If there is an error during the search operation.
     */
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

    /**
     * Retrieves a wallet by its unique identifier.
     *
     * @param string $walletId The unique identifier of the wallet.
     * @return WalletOutputDto|null The wallet output data object or null on failure.
     * @throws SherlException If there is an error during the retrieval process.
     */
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
