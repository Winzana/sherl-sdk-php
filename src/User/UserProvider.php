<?php

namespace Sherl\Sdk\User;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

use Psr\Http\Message\ResponseInterface;

use Sherl\Sdk\Common\Error\SherlException;

use Sherl\Sdk\User\Dto\UpdatePasswordInputDto;
use Sherl\Sdk\User\Dto\ValidateResetPasswordInputDto;

class UserProvider
{
    public const DOMAIN = "User";

    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    private function throwSherlUserException(ResponseInterface $response)
    {
        throw new SherlException(UserProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
    }

    public function forgotPasswordRequest(string $email): ?bool
    {
        $response = $this->client->post('/api/user/password/forgot-request', [
          "headers" => [
            "Content-Type" => "application/json",
          ],
          RequestOptions::JSON => [
            "email" => $email
          ]
        ]);

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlUserException($response);
        }

        return filter_var($response->getBody()->getContents(), FILTER_VALIDATE_BOOLEAN);
    }

    public function forgotPasswordValidation(ValidateResetPasswordInputDto $validateResetPasswordInput): ?bool
    {
        $response = $this->client->post('/api/user/password/forgot-validate', [
          "headers" => [
            "Content-Type" => "application/json",
          ],
          RequestOptions::JSON => [
            "password" => $validateResetPasswordInput->password,
            "passwordRepeat" => $validateResetPasswordInput->passwordRepeat,
            "token" => $validateResetPasswordInput->token
          ]
        ]);

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlUserException($response);
        }

        return filter_var($response->getBody()->getContents(), FILTER_VALIDATE_BOOLEAN);
    }

    public function changePassword(string $password, string $passwordRepeat): ?bool
    {
        $response = $this->client->post('/api/user/password/forgot-validate', [
          "headers" => [
            "Content-Type" => "application/json",
          ],
          RequestOptions::JSON => [
            "password" => $password,
            "passwordRepeat" => $passwordRepeat,
          ]
        ]);

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlUserException($response);
        }

        return filter_var($response->getBody()->getContents(), FILTER_VALIDATE_BOOLEAN);
    }
}
