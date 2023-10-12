<?php

namespace Sherl\Sdk\Auth;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Sherl\Sdk\Auth\Dto\LoginOutDto;
use Sherl\Sdk\Common\SerializerFactory;

use Sherl\Sdk\Common\Error\SherlException;

class AuthProvider
{
  public const DOMAIN = "Auth"; 
  private Client $client;

  public function __construct(Client $client)
  {
    $this->client = $client;
  }

  public function signInWithEmailAndPassword(string $email, string $password): ?LoginOutDto
  {
    $response = $this->client->post('/api/auth/login', [
      RequestOptions::JSON => [
        'username' =>  (string) $email,
        'password' => (string) $password
      ],
      "headers" => [
        'Content-Type' => 'application/json'
      ]
    ]);

    if ($response->getStatusCode() >= 300) {
      throw new SherlException(AuthProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
    }

    return SerializerFactory::getInstance()->deserialize(
      $response->getBody()->getContents(),
      LoginOutDto::class,
      'json'
    );
  }
}
