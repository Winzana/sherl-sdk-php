<?php

namespace Sherl\Sdk\Contact;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;

use Sherl\Sdk\BugReport\Dto\BugReportListInputDto;
use Sherl\Sdk\BugReport\Dto\BugReportListOutputDto;
use Sherl\Sdk\BugReport\Dto\BugReportOutputDto;
use Sherl\Sdk\BugReport\Dto\CreateBugReportInputDto;

use Sherl\Sdk\Common\SerializerFactory;
use Sherl\Sdk\Common\Error\SherlException;

class BugReportProvider
{
    public const DOMAIN = "Bug report";

    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    private function throwSherlBugReportContactException(ResponseInterface $response)
    {
        throw new SherlException(BugReportProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
    }

    public function createBugReport(CreateBugReportInputDto $createBugReportInput): ?BugReportOutputDto
    {
        $response = $this->client->post('/api/bug-reports', [
          "headers" => [
            "Content-Type" => "application/json",
          ],
          RequestOptions::JSON => [
            "osName" => $createBugReportInput->osName,
            "browserName" => $createBugReportInput->browserName,
            "contactEmail" => $createBugReportInput->contactEmail,
            "message" => $createBugReportInput->message,
            "windowHeight" => $createBugReportInput->windowHeight,
            "windowWidth" => $createBugReportInput->windowWidth,
          ]
        ]);

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlBugReportContactException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            BugReportOutputDto::class,
            'json'
        );
    }

    public function getBugReportById(string $bugReportId): ?BugReportOutputDto
    {
        $response = $this->client->get("/api/bug-reports/$bugReportId", [
          "headers" => [
            "Content-Type" => "application/json",
          ],
        ]);

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlBugReportContactException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            BugReportOutputDto::class,
            'json'
        );
    }

    public function getBugReports(BugReportListInputDto $bugReportListInput): ?BugReportListOutputDto
    {
        $response = $this->client->get('/api/bug-reports', [
          "headers" => [
            "Content-Type" => "application/json",
          ],
          RequestOptions::QUERY => [
            "page" => $bugReportListInput->page,
            "itemsPerPage" => $bugReportListInput->itemsPerPage,
            "osName" => $bugReportListInput->osName,
            "browserName" => $bugReportListInput->browserName,
            "contactEmail" => $bugReportListInput->contactEmail,
            "windowHeight" => $bugReportListInput->windowHeight,
            "windowWidth" => $bugReportListInput->windowWidth
          ]
        ]);

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlBugReportContactException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            BugReportListOutputDto::class,
            'json'
        );
    }
}
