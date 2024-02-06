<?php

namespace Sherl\Sdk\BugReport;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;

use Sherl\Sdk\BugReport\Dto\BugReportListInputDto;
use Sherl\Sdk\BugReport\Dto\BugReportListOutputDto;
use Sherl\Sdk\BugReport\Dto\BugReportOutputDto;
use Sherl\Sdk\BugReport\Dto\CreateBugReportInputDto;

use Sherl\Sdk\Common\SerializerFactory;
use Sherl\Sdk\Common\Error\SherlException;

use Exception;

use Sherl\Sdk\Common\Error\ErrorFactory;
use Sherl\Sdk\Common\Error\ErrorHelper;
use Sherl\Sdk\BugReport\Errors\BugReportErr;

class BugReportProvider
{
    public const DOMAIN = "Bug report";

    private Client $client;
    private ErrorFactory $errorFactory;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->errorFactory = new ErrorFactory(self::DOMAIN, BugReportErr::$errors);
    }

    public function createBugReport(CreateBugReportInputDto $createBugReportInput): ?BugReportOutputDto
    {
        try {
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

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                BugReportOutputDto::class,
                'json'
            );
        } catch (\Exception $err) {

            if ($err instanceof \GuzzleHttp\Exception\ClientException) {

                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(BugReportErr::CREATE_BUG_REPORT_FORBIDDEN);
                }
            }
            throw $this->errorFactory->create(BugReportErr::CREATE_BUG_REPORT_FAILED);
        }

    }

    public function getBugReportById(string $bugReportId): ?BugReportOutputDto
    {
        try {
            $response = $this->client->get("/api/bug-reports/$bugReportId", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                BugReportOutputDto::class,
                'json'
            );

        } catch (\Exception $err) {

            if ($err instanceof \GuzzleHttp\Exception\ClientException) {

                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(BugReportErr::GET_BUG_REPORT_BY_ID_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(BugReportErr::BUG_REPORT_NOT_FOUND);
                }
            }
            throw $this->errorFactory->create(BugReportErr::GET_BUG_REPORT_BY_ID_FAILED);
        }

    }

    public function getBugReports(BugReportListInputDto $bugReportListInput): ?BugReportListOutputDto
    {
        try {
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

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                BugReportListOutputDto::class,
                'json'
            );

        } catch (\Exception $err) {

            if ($err instanceof \GuzzleHttp\Exception\ClientException) {

                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(BugReportErr::GET_BUG_REPORTS_FORBIDDEN);
                }
            }
            throw $this->errorFactory->create(BugReportErr::GET_BUG_REPORTS_FAILED);
        }
    }
}
