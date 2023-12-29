<?php

namespace Sherl\Sdk\Contact;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;
use Sherl\Sdk\Common\Error\SherlException;
use Sherl\Sdk\Contact\Dto\ContactInputDto;

class ContactProvider
{
    public const DOMAIN = "Contact";

    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @throws SherlException
     */
    private function throwSherlContactException(ResponseInterface $response): SherlException
    {
        throw new SherlException(ContactProvider::DOMAIN, $response->getBody()->getContents());
    }

    public function sendContact(ContactInputDto $contactInput): string
    {
        $response = $this->client->post('/api/contact', [
          "headers" => [
            "Content-Type" => "application/json",
          ],
          RequestOptions::JSON => [
            "name" => $contactInput->name,
            "email" => $contactInput->email,
            "message" => $contactInput->message
          ]
        ]);

        if ($response->getStatusCode() >= 300) {
            $this->throwSherlContactException($response);
        }

        return $response->getBody()->getContents();
    }

    public function contactPerson(string $id, ContactInputDto $contactInput): string
    {
        $response = $this->client->post("/api/contact/$id", [
          "headers" => [
            "Content-Type" => "application/json",
          ],
          RequestOptions::JSON => [
            "name" => $contactInput->name,
            "email" => $contactInput->email,
            "message" => $contactInput->message
          ]
        ]);

        if ($response->getStatusCode() >= 300) {
            $this->throwSherlContactException($response);
        }

        return $response->getBody()->getContents();
    }
}
