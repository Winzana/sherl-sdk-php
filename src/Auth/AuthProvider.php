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

    /**
     * Performs logout for the current user session.
     *
     * @return string|null An empty string on successful logout, null on failure. // TODO: check data returned
     * @throws SherlException If there is an error during the logout process.
     */
    public function logout(): ?string
    {
        $response = $this->client->post('/api/auth/logout');

        if ($response->getStatusCode() >= 300) {
            $this->throwSherlAuthError($response);
        }

        return "";
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

    /**
     * Resends the SMS code to the specified mobile phone number.
     *
     * @param string $mobilePhoneNumber The mobile phone number to resend the SMS code to.
     * @return bool|null True on success, null on failure.
     * @throws SherlException If there is an error during the process of resending the SMS code.
     */
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

    /**
     * Requests a new SMS code for two-factor authentication to be sent to the specified mobile phone number.
     *
     * @param string $mobilePhoneNumber The mobile phone number to send the SMS code to.
     * @return bool|null True on success, null on failure.
     * @throws SherlException If there is an error during the SMS code request.
     */
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

    /**
     * Refreshes the authentication token for the current session.
     *
     * @return LoginOutputDto|null The new login output data object or null on failure.
     * @throws SherlException If there is an error during the token refresh process.
     */
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

    /**
     * Performs login using Google external authentication.
     *
     * @param ExternalLoginInputDto $googleInput The external login input data for Google.
     * @return LoginOutputDto|null The login output data transfer object or null on failure.
     * @throws SherlException If there is an error during the Google login process.
     */
    public function loginWithGoogle(ExternalLoginInputDto $googleInput): ?LoginOutputDto
    {
        return $this->externalLogin('/api/auth/login/google', $googleInput);
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
        return $this->externalLogin('/api/auth/login/facebook', $facebookInput);
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
        return $this->externalLogin('/api/auth/login/apple', $appleInput);
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
