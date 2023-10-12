<?php

namespace Sherl\Sdk\Auth;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Sherl\Sdk\Auth\Dto\LoginOutDto;
use Sherl\Sdk\Common\SerializerFactory;

class AuthProvider
{

  private Client $client;

  public function __construct(Client $client)
  {
    $this->client = $client;
  }

  public function signInWithEmailAndPassword(string $email, string $password): LoginOutDto
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

    return SerializerFactory::getInstance()->deserialize(
      $response->getBody()->getContents(),
      LoginOutDto::class,
      'json'
    );
  }
}
