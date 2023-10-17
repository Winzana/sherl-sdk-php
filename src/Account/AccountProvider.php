<?php

namespace Sherl\Sdk\Account;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Sherl\Sdk\Account\Dto\AccountOutputDto;
use Sherl\Sdk\Account\Dto\CreateAccountInputDto;
use Sherl\Sdk\Common\Error\SherlException;
use Sherl\Sdk\Common\SerializerFactory;

class AccountProvider
{
  public const DOMAIN = "Account";
  private Client $client;

  public function __construct(Client $client)
  {
    $this->client = $client;
  }

  public function createAccount(CreateAccountInputDto $createAccount): ?AccountOutputDto
  {
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

    if ($response->getStatusCode() >= 300) {
      throw new SherlException(AccountProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
    }

    return SerializerFactory::getInstance()->deserialize(
      $response->getBody()->getContents(),
      AccountOutputDto::class,
      'json'
    );
  }
}
