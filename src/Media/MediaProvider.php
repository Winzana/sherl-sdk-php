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

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    private function throwSherlMediaException(ResponseInterface $response, string $message)
    {
        throw new SherlException(MediaErr::DOMAIN, $message, $response->getStatusCode());
    }

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
