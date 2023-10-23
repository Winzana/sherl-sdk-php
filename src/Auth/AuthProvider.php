<?php

namespace Sherl\Sdk\Auth;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;
use Sherl\Sdk\Auth\Dto\LoginOutputDto;
use Sherl\Sdk\Common\SerializerFactory;

use Sherl\Sdk\Common\Error\SherlException;
use Sherl\Sdk\Person\Dto\ExternalLoginInputDto;

class AuthProvider
{
    public const DOMAIN = "Auth";
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    private function throwSherlAuthError(ResponseInterface $response)
    {
        throw new SherlException(AuthProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
    }

    public function signInWithEmailAndPassword(string $username, string $password): ?LoginOutputDto
    {
        $response = $this->client->post('/api/auth/login', [
          RequestOptions::JSON => [
            'username' =>  (string) $username,
            'password' => (string) $password
          ],
          "headers" => [
            'Content-Type' => 'application/json'
          ]
        ]);

        if ($response->getStatusCode() >= 300) {
            $this->throwSherlAuthError($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            LoginOutputDto::class,
            'json'
        );
    }

    public function logout(): ?string
    {
        $response = $this->client->post('/api/auth/logout');

        if ($response->getStatusCode() >= 300) {
            $this->throwSherlAuthError($response);
        }

        return "";
    }

    public function validateSmsCode(string $mobilePhoneNumber, string $code): ?LoginOutputDto
    {
        $response = $this->client->post('/api/auth/login/sms/validate', [
          RequestOptions::JSON => [
            'mobilePhoneNumber' => (string) $mobilePhoneNumber,
            'code' => (string) $code
          ],
          "headers" => [
            'Content-Type' => 'application/json'
          ]
        ]);

        if ($response->getStatusCode() >= 300) {
            $this->throwSherlAuthError($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            LoginOutputDto::class,
            'json'
        );
    }

    public function resendSMSCode(string $mobilePhoneNumber): ?bool
    {
        $response = $this->client->post('/api/auth/login/sms/request-new', [
          RequestOptions::JSON => [
            'mobilePhoneNumber' => (string) $mobilePhoneNumber,
          ],
          "headers" => [
            'Content-Type' => 'application/json'
          ]
        ]);

        if ($response->getStatusCode() >= 300) {
            $this->throwSherlAuthError($response);
        }

        return filter_var($response->getBody()->getContents(), FILTER_VALIDATE_BOOLEAN);
    }

    public function requestSMSCode(string $mobilePhoneNumber): ?bool
    {
        $response = $this->client->post('/api/auth/login/sms/request', [
          RequestOptions::JSON => [
            'mobilePhoneNumber' => (string) $mobilePhoneNumber,
          ],
          "headers" => [
            'Content-Type' => 'application/json'
          ]
        ]);

        if ($response->getStatusCode() >= 300) {
            $this->throwSherlAuthError($response);
        }

        return filter_var($response->getBody()->getContents(), FILTER_VALIDATE_BOOLEAN);
    }

    public function refreshToken(): ?LoginOutputDto
    {
        $response = $this->client->post('/api/auth/refesh-token');

        if ($response->getStatusCode() >= 300) {
            $this->throwSherlAuthError($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            LoginOutputDto::class,
            'json'
        );
    }

    private function externalLogin(string $url, ExternalLoginInputDto $externalLoginInput): ?LoginOutputDto
    {
        $response = $this->client->post($url, [
          RequestOptions::JSON => [
            'id' => $externalLoginInput->id,
            'emails' => [
              [
                'value' => $externalLoginInput->emails->value,
                'verified' => true
              ]
            ],
            'displayName' => $externalLoginInput->displayName,
            'name' => [
              "familyName" => $externalLoginInput->name->familyName,
              "givenName" => $externalLoginInput->name->givenName
            ],
            'locale' => 'fr',
            'photos' => [
              [
                'value' => $externalLoginInput->photos->value
              ]
            ]

          ],
          "headers" => [
            'Content-Type' => 'application/json'
          ],
        ]);

        if ($response->getStatusCode() >= 300) {
            $this->throwSherlAuthError($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            LoginOutputDto::class,
            'json'
        );
    }

    public function loginWithGoogle(ExternalLoginInputDto $googleInput): ?LoginOutputDto
    {
        return $this->externalLogin('/api/auth/login/google', $googleInput);
    }

    public function loginWithFacebook(ExternalLoginInputDto $facebookInput): ?LoginOutputDto
    {
        return $this->externalLogin('/api/auth/login/facebook', $facebookInput);
    }

    public function loginWithApple(ExternalLoginInputDto $appleInput): ?LoginOutputDto
    {
        return $this->externalLogin('/api/auth/login/apple', $appleInput);
    }

    public function loginWithCode(string $userId, string $code): ?LoginOutputDto
    {
        $response = $this->client->post('/api/auth/login/code', [
          RequestOptions::JSON => [
            'userId' => $userId,
            'code' => $code,

          ],
          "headers" => [
            'Content-Type' => 'application/json'
          ],
        ]);

        if ($response->getStatusCode() >= 300) {
            $this->throwSherlAuthError($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            LoginOutputDto::class,
            'json'
        );
    }
}
