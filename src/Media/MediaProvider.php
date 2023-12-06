<?php

namespace Sherl\Sdk\Media;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use Sherl\Sdk\Common\StringUtils;
use Sherl\Sdk\Exceptions\MediaErr;
use Sherl\Sdk\Exceptions\SherlException;
use Sherl\Sdk\Common\SerializerFactory;

class MediaProvider
{
    private Client $client;
    /**
     * MediaProvider constructor.
     * @param Client $client The HTTP client used to make requests.
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }
    /**
     * Throws a SherlMediaException with a custom message.
     * @param ResponseInterface $response The response object from the HTTP client.
     * @param string $message The custom error message.
     * @throws SherlException
     */
    private function throwSherlMediaException(ResponseInterface $response, string $message)
    {
        throw new SherlException(MediaErr::DOMAIN, $message, $response->getStatusCode());
    }
    /**
     * Deletes a file by its identifier.
     * @param string $id The unique identifier of the file to delete.
     * @return string The body content of the HTTP response.
     * @throws SherlException If the file deletion fails.
     */
    public function deleteFile(string $id): string
    {
        try {
            $endpoint = StringUtils::bindContext('/api/medias/' . $id, []);
            $response = $this->client->delete($endpoint);

            if ($response->getStatusCode() >= 300) {
                $this->throwSherlMediaException($response, "Failed to delete file.");
            }

            return $response->getBody()->getContents();

        } catch (\Exception $e) {
            throw new SherlException(MediaErr::DELETE_FILE_FAILED, $e->getMessage());
        }
    }
    /**
     * Retrieves the details of a file by its identifier.
     * @param string $id The unique identifier of the file to retrieve.
     * @param array $query Additional query parameters for the request.
     * @return array An associative array representing the file details.
     * @throws SherlException If the file retrieval fails.
     */
    public function getFile(string $id, array $query): array
    {
        try {
            $endpoint = StringUtils::bindContext('/api/medias/' . $id, []);
            $response = $this->client->get($endpoint, [
                'query' => $query
            ]);

            if ($response->getStatusCode() >= 300) {
                $this->throwSherlMediaException($response, "Failed to get file.");
            }

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ImageObjectOutputDto::class,
                'json'
            );

        } catch (\Exception $e) {
            throw new SherlException(MediaErr::GET_FILE_FAILED, $e->getMessage());
        }
    }
    /**
     * Uploads a file to the server.
     * @param array $data The multipart file data to be uploaded.
     * @return array An associative array representing the uploaded file details.
     * @throws SherlException If the file upload fails.
     */
    public function uploadFile(array $data): array
    {
        try {
            $response = $this->client->post('/api/medias', [
                'multipart' => $data,
                'headers' => ['Content-Type' => 'multipart/form-data']
            ]);

            if ($response->getStatusCode() >= 300) {
                $this->throwSherlMediaException($response, "Failed to upload file.");
            }

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ImageObjectOutputDto::class,
                'json'
            );

        } catch (\Exception $e) {
            throw new SherlException(MediaErr::UPLOAD_FILE_FAILED, $e->getMessage());
        }
    }
}
