<?php

namespace Sherl\Sdk\Media;

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
            $response = $this->client->delete("/api/medias/$id", [
                "headers" => [
                    "Content-Type" => "application/json",
                ],]);

            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        MediaQueryDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(MediaErr::DELETE_FILE_FORBIDDEN);
                case 404:
                    throw $this->errorFactory->create(MediaErr::MEDIA_NOT_FOUND);
                default:
                    throw $this->errorFactory->create(MediaErr::DELETE_FILE_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(MediaErr::DELETE_FILE_FAILED));
        }
    }
    /**
     * Retrieves the details of a file by its identifier.
     * @param string $id The unique identifier of the file to retrieve.
     * @param MediaQueryDto $query Additional query parameters for the request.
     * @return MediaQueryDto An associative array representing the file details.
     */
    public function getFile(string $id, MediaQueryDto $query): MediaQueryDto
    {
        try {
            $response = $this->client->get("/api/medias/$id", [
                'query' => $query
            ]);

            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        MediaQueryDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(MediaErr::GET_FILE_FORBIDDEN);
                case 404:
                    throw $this->errorFactory->create(MediaErr::MEDIA_NOT_FOUND);
                default:
                    throw $this->errorFactory->create(MediaErr::GET_FILE_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(MediaErr::GET_FILE_FAILED));
        }
    }
    /**
     * Uploads a file to the server.
     * @param MediaQueryDto $data The multipart file data to be uploaded.
     * @return MediaQueryDto An associative array representing the uploaded file details.
     */
    public function uploadFile(MediaQueryDto $data, MediaQueryDto $query): MediaQueryDto
    {
        try {
            $response = $this->client->post('/api/medias', [
                'multipart' => $data,
                'query' => $query,
                'headers' => ['Content-Type' => 'multipart/form-data']
            ]);

            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        MediaQueryDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(MediaErr::UPLOAD_FILE_FORBIDDEN);
                default:
                    throw $this->errorFactory->create(MediaErr::UPLOAD_FILE_FAILED);
            }

        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(MediaErr::UPLOAD_FILE_FAILED));
        }
    }
}
