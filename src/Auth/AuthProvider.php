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

    /**
     * Performs sign-in with email and password credentials.
     *
     * @param string $username The user's username.
     * @param string $password The user's password.
     * @return LoginOutputDto|null The login output data object or null on failure.
     * @throws SherlException If there is an error during the sign-in process.
     */
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

    /**
     * Performs logout for the current user session.
     *
     * @return string|null An empty string on successful logout, null on failure. // TODO: check data returned
     * @throws SherlException If there is an error during the logout process.
     */
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

    /**
     * Validates the SMS code sent to a mobile phone number during two-factor authentication.
     *
     * @param string $mobilePhoneNumber The user's mobile phone number.
     * @param string $code The SMS code to validate.
     * @return LoginOutputDto|null The login output data object on success, null on failure.
     * @throws SherlException If there is an error during code validation.
     */
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

    /**
     * Resends an SMS code to the provided mobile phone number.
     *
     * @param string $mobilePhoneNumber The mobile phone number to resend the SMS code.
     * @return bool|null True if SMS code is resent successfully, false otherwise.
     * @throws SherlException If an error occurs during the SMS code resending process.
     */
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
            throw $this->errorFactory->create(AuthErr::RESEND_SMS_CODE_FAILED);
        }
    }
    /**
     * Requests a new SMS code to be sent to the provided mobile phone number.
     *
     * @param string $mobilePhoneNumber The mobile phone number to request a new SMS code.
     * @return bool|null True if new SMS code is requested successfully, false otherwise.
     * @throws SherlException If an error occurs during the SMS code request process.
     */
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
            throw $this->errorFactory->create(AuthErr::REQUEST_SMS_CODE_FAILED);
        }
    }

    /**
     * Refreshes the authentication token for the current session.
     *
     * @return LoginOutputDto|null The new login output data object or null on failure.
     * @throws SherlException If there is an error during the token refresh process.
     */
    public function refreshToken(): ?LoginOutputDto
    {
        try {
            $response = $this->client->post('/api/auth/refresh-token');

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
                        throw $this->errorFactory->create(AuthErr::REFRESH_TOKEN_UNAUTHORIZED);
                }
            }
            throw $this->errorFactory->create(AuthErr::REFRESH_TOKEN_FAILED);
        }
    }

    /**
     * Performs an external login using the specified URL and external login input data.
     *
     * @param string $url The URL endpoint for the external login service.
     * @param ExternalLoginInputDto $externalLoginInput The external login input data object.
     * @return LoginOutputDto|null The login output data object or null on failure.
     * @throws SherlException If there is an error during the external login process.
     */
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

    /**
     * Performs login using Google external authentication.
     *
     * @param ExternalLoginInputDto $googleInput The external login input data for Google.
     * @return LoginOutputDto|null The login output data transfer object or null on failure.
     * @throws SherlException If there is an error during the Google login process.
     */
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

    /**
     * Performs login using Facebook external authentication.
     *
     * @param ExternalLoginInputDto $facebookInput The external login input data for Facebook.
     * @return LoginOutputDto|null The login output data object or null on failure.
     * @throws SherlException If there is an error during the Facebook login process.
     */
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

    /**
     * Performs login using Apple external authentication.
     *
     * @param ExternalLoginInputDto $appleInput The external login input data for Apple.
     * @return LoginOutputDto|null The login output data object or null on failure.
     * @throws SherlException If there is an error during the Apple login process.
     */
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

    /**
     * Performs login using a unique code.
     *
     * @param string $userId The unique identifier of the user.
     * @param string $code The unique code for login.
     * @return LoginOutputDto|null The login output data object or null on failure.
     * @throws SherlException If there is an error during the login with code process.
     */
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
