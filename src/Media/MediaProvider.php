<?php

namespace Sherl\Sdk\Media;

use GuzzleHttp\RequestOptions;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use Sherl\Sdk\Common\StringUtils;
use Sherl\Sdk\Media\Errors\MediaErr;
use Sherl\Sdk\Common\SerializerFactory;
use Exception;
use Sherl\Sdk\Common\Error\ErrorFactory;
use Sherl\Sdk\Common\Error\ErrorHelper;
use Sherl\Sdk\Opinion\Errors\OpinionErr;
use Sherl\Sdk\Media\Dto\MediaQueryDto;
use Sherl\Sdk\Media\Dto\ImageObjectOutputDto;

class MediaProvider
{
    private Client $client;
    private ErrorFactory $errorFactory;

    public const DOMAIN = "media";
    /**
     * MediaProvider constructor.
     * @param Client $client The HTTP client used to make requests.
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->errorFactory = new ErrorFactory(self::DOMAIN, MediaErr::$errors);
    }
    /**
     * Deletes a file by its identifier.
     * @param string $id The unique identifier of the file to delete.
     * @return string The body content of the HTTP response.
     */
    public function deleteFile(string $id): string
    {
        try {
            $response = $this->client->delete(
                "/api/medias/$id",
                [
                "headers" => [
                    "Content-Type" => "application/json",
                ],
            ],
            );

            return $response->getBody()->getContents();

        } catch (\Exception $err) {

            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(MediaErr::DELETE_FILE_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(MediaErr::MEDIA_NOT_FOUND);
                }
            }
            throw $this->errorFactory->create(MediaErr::DELETE_FILE_FAILED);
        }
    }
    /**
     * Retrieves the details of a file by its identifier.
     * @param string $id The unique identifier of the file to retrieve.
     * @param MediaQueryDto $query Additional query parameters for the request.
     * @return ImageObjectOutputDto|null An associative array representing the file details.
     */
    public function getFile(string $id, MediaQueryDto $query): ?ImageObjectOutputDto
    {
        try {
            $response = $this->client->get(
                "/api/medias/$id",
                [

            RequestOptions::QUERY => [
                "query" => $query,
            ],
            ]
            );

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ImageObjectOutputDto::class,
                'json'
            );

        } catch (\Exception $err) {

            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(MediaErr::GET_FILE_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(MediaErr::MEDIA_NOT_FOUND);
                }
            }
            throw $this->errorFactory->create(MediaErr::GET_FILE_FAILED);
        }
    }
    /**
     * Uploads a file to the server.
     * @param  \Psr\Http\Message\UploadedFileInterface $data The multipart file data to be uploaded.
     * @return ImageObjectOutputDto|null An associative array representing the uploaded file details.
     */
    public function uploadFile(\Psr\Http\Message\UploadedFileInterface $data, MediaQueryDto $query): ?ImageObjectOutputDto
    {
        $formData = new \GuzzleHttp\Psr7\MultipartStream([
            [
                'name' => 'upload',
                'contents' => $data->getStream(),
                'filename' => $data->getClientFilename(),
                'headers'  => ['Content-Type' => $data->getClientMediaType()]
            ]

        ]);
        try {
            $response = $this->client->post(
                "/api/medias",
                [
                'headers' => ['Content-Type' => 'multipart/form-data'],
                'body' => $formData,
                RequestOptions::JSON => $formData
            ],
            );
            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ImageObjectOutputDto::class,
                'json'
            );

        } catch (\Exception $err) {

            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(MediaErr::UPLOAD_FILE_FORBIDDEN);
                }
            }
            throw $this->errorFactory->create(MediaErr::UPLOAD_FILE_FAILED);
        }
    }
}
