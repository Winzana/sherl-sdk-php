<?php

namespace Sherl\Sdk\User;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

use Psr\Http\Message\ResponseInterface;

use Sherl\Sdk\Common\Error\SherlException;
use Sherl\Sdk\Common\Error\ErrorFactory;
use Sherl\Sdk\Common\Error\ErrorHelper;
use Sherl\Sdk\User\Errors\UserErr;
use Exception;

use Sherl\Sdk\User\Dto\ValidateResetPasswordInputDto;

class UserProvider
{
    public const DOMAIN = "User";

    private Client $client;
    private ErrorFactory $errorFactory;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->errorFactory = new ErrorFactory(self::DOMAIN, UserErr::$errors);
    }

    public function forgotPasswordRequest(string $email): ?bool
    {
        try {
            $response = $this->client->post('/api/user/password/forgot-request', [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::JSON => [
                "email" => $email
              ]
            ]);

            return filter_var($response->getBody()->getContents(), FILTER_VALIDATE_BOOLEAN);
        } catch (\Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(UserErr::RESET_PASSWORD_REQUEST_FORBIDDEN);
                }
            }
            throw $this->errorFactory->create(UserErr::RESET_PASSWORD_REQUEST_FAILED);
        }
    }

    public function forgotPasswordValidation(ValidateResetPasswordInputDto $validateResetPasswordInput): ?bool
    {
        try {
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

            return filter_var($response->getBody()->getContents(), FILTER_VALIDATE_BOOLEAN);
        } catch (\Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(UserErr::RESET_PASSWORD_VALIDATE_FORBIDDEN);
                }
            }
            throw $this->errorFactory->create(UserErr::RESET_PASSWORD_VALIDATE_FAILED);
        }
    }

    public function changePassword(string $password, string $passwordRepeat): ?bool
    {
        try {
            $response = $this->client->post('/api/user/password/forgot-validate', [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::JSON => [
                "password" => $password,
                "passwordRepeat" => $passwordRepeat,
              ]
            ]);

            return filter_var($response->getBody()->getContents(), FILTER_VALIDATE_BOOLEAN);
        } catch (\Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(UserErr::UPDATE_MY_PASSWORD_FORBIDDEN);
                }
            }
            throw $this->errorFactory->create(UserErr::UPDATE_MY_PASSWORD_FAILED);
        }
    }
}
