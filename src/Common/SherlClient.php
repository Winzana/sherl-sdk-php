<?php

namespace Sherl\Sdk\Common;

use Closure;
use OutOfBoundsException;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;

use Sherl\Sdk\Account\AccountProvider;

use Sherl\Sdk\Auth\AuthProvider;

use Sherl\Sdk\Claim\ClaimProvider;

use Sherl\Sdk\BugReport\BugReportProvider;

use Sherl\Sdk\Person\PersonProvider;

use Sherl\Sdk\Common\InitOptions;

use Sherl\Sdk\Contact\ContactProvider;

use Sherl\Sdk\Notification\NotificationProvider;

use Sherl\Sdk\User\UserProvider;

final class SherlClient
{
    private ?Client $client = null;

    private HandlerStack $handlerStack;

    private ?Closure $bearerMiddleware = null;

    private ?InitOptions $options = null;

    private PersonProvider $person;

    private AuthProvider $auth;

    private AccountProvider $account;

    private ContactProvider $contact;

    private ClaimProvider $claim;

    private BugReportProvider $bugReport;

    private UserProvider $user;

    private NotificationProvider $notification;

    public function __get(string $name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        } else {
            throw new OutOfBoundsException('Domain not gettable');
        }
    }

    public function __construct(
        string $apiKey,
        string $apiSecret,
        string $referer,
        ?string $apiUrl = null,
    ) {
        $this->handlerStack = HandlerStack::create();
        $client = new Client([
          'base_uri' => $apiUrl ?? 'https://api.sherl.io',
          'handler' => $this->handlerStack,
          'http_errors' => false,
          'headers' => [
            'X-WZ-API-KEY' => $apiKey,
            'X-WZ-API-SECRET' => $apiSecret,
            'Referer' => $referer,
            'Access-Control-Allow-Origin' => '*',
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer',
          ],
        ]);
        $this->client = $client;

        $this->options = new InitOptions();
        $this->options->apiKey = $apiKey;
        $this->options->apiSecret = $apiSecret;
        $this->options->apiUrl = $apiUrl;
        $this->options->referer = $referer;

        // $this->person = new PersonProvider($client);
        $this->auth = new AuthProvider($client);
        // $this->contact = new ContactProvider($client);
        // $this->claim = new ClaimProvider($client);
        // $this->bugReport = new BugReportProvider($client);
        // $this->account = new AccountProvider($client);
        // $this->user = new UserProvider($client);
        // $this->notification = new NotificationProvider($client);
    }

    public function getClient(): Client
    {
        return $this->client;
    }

    public function getOptions(): ?InitOptions
    {
        return $this->options;
    }

    public function registerAuthToken(string $token): void
    {
        $this->revokeAuthToken();
        $this->registerBearerToken($token);
    }

    public function revokeAuthToken(): void
    {
        if ($this->bearerMiddleware != null) {
            $this->handlerStack->remove($this->bearerMiddleware);
            $this->bearerMiddleware = null;
        }
    }

    public function registerBearerToken(string $token)
    {
        $bearerMiddleware = Middleware::mapRequest(function ($request) use ($token) {
            $request = $request->withHeader('Authorization', 'Bearer ' . $token);
            return $request;
        });
        $this->bearerMiddleware = $bearerMiddleware;
        $this->handlerStack->push($bearerMiddleware);
    }
}
