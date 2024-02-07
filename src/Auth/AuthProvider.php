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

    /**
 * Signs in a user with the provided username and password.
 *
 * @param string $username The username of the user.
 * @param string $password The password of the user.
 * @return LoginOutputDto|null The login output data if successful, null otherwise.
 * @throws SherlException If an error occurs during the sign-in process.
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
 * Logs out the current user.
 *
 * @return string|null Empty string if logout is successful, null otherwise.
 * @throws SherlException If an error occurs during the logout process.
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
 * Validates an SMS code sent to the provided mobile phone number.
 *
 * @param string $mobilePhoneNumber The mobile phone number to validate the SMS code.
 * @param string $code The SMS code to validate.
 * @return LoginOutputDto|null The login output data if successful, null otherwise.
 * @throws SherlException If an error occurs during the SMS code validation process.
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
            throw $this->errorFactory->create(AuthErr::RE_REQUEST_SMS_CODE_FAILED);
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
            throw $this->errorFactory->create(AuthErr::RE_REQUEST_SMS_CODE_FAILED);
        }
    }
    /**
     * Refreshes the authentication token.
     *
     * @return LoginOutputDto|null The login output data if successful, null otherwise.
     * @throws SherlException If an error occurs during the token refresh process.
     */

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
    /**
     * Logs in a user using external authentication.
     *
     * @param string $url The URL for the external login service.
     * @param ExternalLoginInputDto $externalLoginInput The input data for external authentication.
     * @return LoginOutputDto|null The login output data if successful, null otherwise.
     * @throws SherlException If an error occurs during the external login process.
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
     * Logs in a user using Google authentication.
     *
     * @param ExternalLoginInputDto $googleInput The input data for Google authentication.
     * @return LoginOutputDto|null The login output data if successful, null otherwise.
     * @throws SherlException If an error occurs during the Google login process.
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
     * Logs in a user using Facebook authentication.
     *
     * @param ExternalLoginInputDto $facebookInput The input data for Facebook authentication.
     * @return LoginOutputDto|null The login output data if successful, null otherwise.
     * @throws SherlException If an error occurs during the Facebook login process.
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
     * Logs in a user using Apple authentication.
     *
     * @param ExternalLoginInputDto $appleInput The input data for Apple authentication.
     * @return LoginOutputDto|null The login output data if successful, null otherwise.
     * @throws SherlException If an error occurs during the Apple login process.
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
     * Logs in a user using a provided code.
     *
     * @param string $userId The ID of the user.
     * @param string $code The code for login.
     * @return LoginOutputDto|null The login output data if successful, null otherwise.
     * @throws SherlException If an error occurs during the login with code process.
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
