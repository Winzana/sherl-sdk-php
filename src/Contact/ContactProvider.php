<?php

namespace Sherl\Sdk\Contact;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;
use Sherl\Sdk\Common\Error\SherlException;
use Sherl\Sdk\Contact\Dto\ContactInputDto;
use Exception;

use Sherl\Sdk\Common\Error\ErrorFactory;
use Sherl\Sdk\Common\Error\ErrorHelper;
use Sherl\Sdk\Contact\Errors\ContactErr;

class ContactProvider
{
    public const DOMAIN = "Contact";
    private ErrorFactory $errorFactory;
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->errorFactory = new ErrorFactory(self::DOMAIN, ContactErr::$errors);
    }

    /**
 * Sends a contact message using the provided contact input data.
 *
 * @param ContactInputDto $contactInput The input data containing the contact information.
 * @return string The response content indicating the success or failure of the contact message sending process.
 * @throws SherlException If an error occurs during the contact message sending process.
 */
    public function sendContact(ContactInputDto $contactInput): string
    {
        try {
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

            return $response->getBody()->getContents();
        } catch (\Exception $err) {

            if ($err instanceof \GuzzleHttp\Exception\ClientException) {

                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ContactErr::SEND_CONTACT_FORBIDDEN);
                }
            }
            throw $this->errorFactory->create(ContactErr::SEND_CONTACT_FAILED);
        }

    }

    /**
 * Contacts a person identified by the provided ID using the provided contact input data.
 *
 * @param string $id The ID of the person to contact.
 * @param ContactInputDto $contactInput The input data containing the contact information.
 * @return string The response content indicating the success or failure of the contact process with the person.
 * @throws SherlException If an error occurs during the contact process with the person.
 */
    public function contactPerson(string $id, ContactInputDto $contactInput): string
    {
        try {
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
            return $response->getBody()->getContents();
        } catch (\Exception $err) {

            if ($err instanceof \GuzzleHttp\Exception\ClientException) {

                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ContactErr::CONTACT_PERSON_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ContactErr::CONTACT_NOT_FOUND);
                }
            }
            throw $this->errorFactory->create(ContactErr::CONTACT_PERSON_FAILED);
        }
    }
}
