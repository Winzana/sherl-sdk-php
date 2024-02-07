<?php

namespace Sherl\Sdk\Account;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Sherl\Sdk\Account\Dto\AccountOutputDto;
use Sherl\Sdk\Account\Dto\CreateAccountInputDto;
use Sherl\Sdk\Common\Error\SherlException;
use Sherl\Sdk\Common\SerializerFactory;
use Sherl\Sdk\Common\Error\ErrorFactory;
use Sherl\Sdk\Common\Error\ErrorHelper;
use Sherl\Sdk\Account\Errors\AccountErr;
use Exception;

class AccountProvider
{
    public const DOMAIN = "Account";
    private Client $client;

    private ErrorFactory $errorFactory;
    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->errorFactory = new ErrorFactory(self::DOMAIN, AccountErr::$errors);
    }

    /**
 * Creates a new user account based on the provided input data.
 *
 * @param CreateAccountInputDto $createAccount The input data for creating the account.
 * @return AccountOutputDto|null The output data for the created account if successful, null otherwise.
 * @throws SherlException If there is an error during the account creation process.
 */
    public function createAccount(CreateAccountInputDto $createAccount): ?AccountOutputDto
    {

        try {
            $response = $this->client->post('/api/accounts', [
              'headers' => [
                'Content-Type' => 'application/json'
              ],
              RequestOptions::JSON => [
                'hosts' => $createAccount->hosts,
                'ips' => $createAccount->ips,
                'firstName' => $createAccount->firstName,
                'lastName' => $createAccount->lastName,
                'legalName' => $createAccount->legalName,
                'email' => $createAccount->email,
                'mobilePhoneNumber' => $createAccount->mobilePhoneNumber,
                'birthDate' => $createAccount->birthDate,
                'gender' => $createAccount->gender,
                'location' => $createAccount->location,
                'password' => $createAccount->password,
                'passwordRepeat' => $createAccount->passwordRepeat,
              ]
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                AccountOutputDto::class,
                'json'
            );
        } catch (\Exception $err) {

            if ($err instanceof \GuzzleHttp\Exception\ClientException) {

                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(AccountErr::CREATE_ACCOUNT_FORBIDDEN);
                }
            }
            throw $this->errorFactory->create(AccountErr::CREATE_ACCOUNT_FAILED);
        }
    }
}
