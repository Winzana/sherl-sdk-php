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


use Sherl\Sdk\Common\Error\ErrorFactory;
use Sherl\Sdk\Common\Error\ErrorHelper;
use Sherl\Sdk\Auth\Errors\AuthErr;

class AuthProvider
{
    public const DOMAIN = "Auth";
    private Client $client;
    private ErrorFactory $errorFactory;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->errorFactory = new ErrorFactory(self::DOMAIN, AuthErr::$errors);

    }

    public function signInWithEmailAndPassword(string $username, string $password): ?LoginOutputDto
    {
        try {
            $response = $this->client->post('/api/auth/login', [
              RequestOptions::JSON => [
                'username' =>  (string) $username,
                'password' => (string) $password
              ],
              "headers" => [
                'Content-Type' => 'application/json'
              ]
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                LoginOutputDto::class,
                'json'
            );
        } catch (\Exception $err) {

            if ($err instanceof \GuzzleHttp\Exception\ClientException) {

                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {
                    case 401:
                        throw $this->errorFactory->create(AuthErr::LOGIN_FAILED_UNAUTHORIZED);
                }
            }
            throw $this->errorFactory->create(AuthErr::LOGIN_FAILED);
        }

    }

    public function logout(): ?string
    {
        try {
            $response = $this->client->post('/api/auth/logout');

            return "";
        } catch (\Exception $err) {

            if ($err instanceof \GuzzleHttp\Exception\ClientException) {

                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {
                    case 401:
                        throw $this->errorFactory->create(AuthErr::LOGOUT_UNAUTHORIZED);
                }
            }
            throw $this->errorFactory->create(AuthErr::LOGOUT_FAILED);
        }
    }

    public function validateSmsCode(string $mobilePhoneNumber, string $code): ?LoginOutputDto
    {
        try {
            $response = $this->client->post('/api/auth/login/sms/validate', [
              RequestOptions::JSON => [
                'mobilePhoneNumber' => (string) $mobilePhoneNumber,
                'code' => (string) $code
              ],
              "headers" => [
                'Content-Type' => 'application/json'
              ]
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                LoginOutputDto::class,
                'json'
            );

        } catch (\Exception $err) {

            if ($err instanceof \GuzzleHttp\Exception\ClientException) {

                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {
                    case 401:
                        throw $this->errorFactory->create(AuthErr::VALIDATE_SMS_CODE_FAILED_UNAUTHORIZED);
                    case 403:
                        throw $this->errorFactory->create(AuthErr::VALIDATE_SMS_CODE_FAILED_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(AuthErr::SMS_CODE_OR_PHONE_NUMBER_NOT_FOUND);
                    case 498:
                        throw $this->errorFactory->create(AuthErr::SMS_VALIDATION_CODE_EXPIRED);
                }
            }
            throw $this->errorFactory->create(AuthErr::VALIDATE_SMS_CODE_FAILED);
        }

    }

    public function resendSMSCode(string $mobilePhoneNumber): ?bool
    {
        try {
            $response = $this->client->post('/api/auth/login/sms/request-new', [
              RequestOptions::JSON => [
                'mobilePhoneNumber' => (string) $mobilePhoneNumber,
              ],
              "headers" => [
                'Content-Type' => 'application/json'
              ]
            ]);

            return filter_var($response->getBody()->getContents(), FILTER_VALIDATE_BOOLEAN);

        } catch (\Exception $err) {

            if ($err instanceof \GuzzleHttp\Exception\ClientException) {

                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(AuthErr::SMS_ALREADY_SENT);
                    case 404:
                        throw $this->errorFactory->create(AuthErr::PHONE_NUMBER_NOT_FOUND);
                }
            }
            throw $this->errorFactory->create(AuthErr::RE_REQUEST_SMS_CODE_FAILED);
        }
    }

    public function requestSMSCode(string $mobilePhoneNumber): ?bool
    {
        try {
            $response = $this->client->post('/api/auth/login/sms/request', [
              RequestOptions::JSON => [
                'mobilePhoneNumber' => (string) $mobilePhoneNumber,
              ],
              "headers" => [
                'Content-Type' => 'application/json'
              ]
            ]);

            return filter_var($response->getBody()->getContents(), FILTER_VALIDATE_BOOLEAN);

        } catch (\Exception $err) {

            if ($err instanceof \GuzzleHttp\Exception\ClientException) {

                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(AuthErr::SMS_ALREADY_SENT);
                    case 404:
                        throw $this->errorFactory->create(AuthErr::PHONE_NUMBER_NOT_FOUND);
                }
            }
            throw $this->errorFactory->create(AuthErr::RE_REQUEST_SMS_CODE_FAILED);
        }
    }

    public function refreshToken(): ?LoginOutputDto
    {
        try {
            $response = $this->client->post('/api/auth/refesh-token');

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                LoginOutputDto::class,
                'json'
            );

        } catch (\Exception $err) {

            if ($err instanceof \GuzzleHttp\Exception\ClientException) {

                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {
                    case 401:
                        throw $this->errorFactory->create(AuthErr::AUTH_UNAUTHORIZED);
                }
            }
            throw $this->errorFactory->create(AuthErr::AUTH_FAILED);
        }
    }

    private function externalLogin(string $url, ExternalLoginInputDto $externalLoginInput): ?LoginOutputDto
    {
        try {
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

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                LoginOutputDto::class,
                'json'
            );
        } catch (\Exception $err) {

            if ($err instanceof \GuzzleHttp\Exception\ClientException) {

                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {
                    case 401:
                        throw $this->errorFactory->create(AuthErr::AUTH_UNAUTHORIZED);
                }
            }
            throw $this->errorFactory->create(AuthErr::AUTH_FAILED);
        }
    }

    public function loginWithGoogle(ExternalLoginInputDto $googleInput): ?LoginOutputDto
    {
        try {
            return $this->externalLogin('/api/auth/login/google', $googleInput);

        } catch (\Exception $err) {

            if ($err instanceof \GuzzleHttp\Exception\ClientException) {

                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {
                    case 401:
                        throw $this->errorFactory->create(AuthErr::LOGIN_GOOGLE_FAILED_UNAUTHORIZED);
                }
            }
            throw $this->errorFactory->create(AuthErr::LOGIN_GOOGLE_FAILED);
        }
    }

    public function loginWithFacebook(ExternalLoginInputDto $facebookInput): ?LoginOutputDto
    {
        try {
            return $this->externalLogin('/api/auth/login/facebook', $facebookInput);

        } catch (\Exception $err) {

            if ($err instanceof \GuzzleHttp\Exception\ClientException) {

                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {
                    case 401:
                        throw $this->errorFactory->create(AuthErr::LOGIN_FACEBOOK_FAILED_UNAUTHORIZED);
                }
            }
            throw $this->errorFactory->create(AuthErr::LOGIN_FACEBOOK_FAILED);
        }
    }

    public function loginWithApple(ExternalLoginInputDto $appleInput): ?LoginOutputDto
    {
        try {
            return $this->externalLogin('/api/auth/login/apple', $appleInput);

        } catch (\Exception $err) {

            if ($err instanceof \GuzzleHttp\Exception\ClientException) {

                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {
                    case 401:
                        throw $this->errorFactory->create(AuthErr::LOGIN_APPLE_FAILED_UNAUTHORIZED);
                }
            }
            throw $this->errorFactory->create(AuthErr::LOGIN_APPLE_FAILED);
        }
    }

    public function loginWithCode(string $userId, string $code): ?LoginOutputDto
    {
        try {
            $response = $this->client->post('/api/auth/login/code', [
              RequestOptions::JSON => [
                'userId' => $userId,
                'code' => $code,

              ],
              "headers" => [
                'Content-Type' => 'application/json'
              ],
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                LoginOutputDto::class,
                'json'
            );

        } catch (\Exception $err) {

            if ($err instanceof \GuzzleHttp\Exception\ClientException) {

                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {
                    case 401:
                        throw $this->errorFactory->create(AuthErr::LOGIN_WITH_CODE_FAILED_UNAUTHORIZED);
                    case 404:
                        throw $this->errorFactory->create(AuthErr::UNKNOWN_LOGIN_CODE);
                }
            }
            throw $this->errorFactory->create(AuthErr::LOGIN_WITH_CODE_FAILED);
        }
    }
}
