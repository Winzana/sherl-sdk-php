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

    private function throwSherlContactException(ResponseInterface $response)
    {
        throw new SherlException(ContactProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
    }

    public function sendContact(ContactInputDto $contactInput)
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

    public function contactPerson(string $id, ContactInputDto $contactInput)
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
