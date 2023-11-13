<?php

namespace Sherl\Sdk\Gallery;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

use Psr\Http\Message\ResponseInterface;

use Sherl\Sdk\Common\Error\SherlException;
use Sherl\Sdk\Common\SerializerFactory;

use Sherl\Sdk\Gallery\Dto\NotificationFiltersInputDto;
use Sherl\Sdk\Gallery\Dto\DynamicBackgroundOutputDto;
use Sherl\Sdk\Gallery\Dto\GetDynamicBackgroundFilters;

class GalleryProvider
{
    public const DOMAIN = "Gallery";

    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    private function throwSherlGalleryException(ResponseInterface $response)
    {
        throw new SherlException(GalleryProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
    }

    public function createGallery(CreateGalleryInputDto $gallery): ?GalleryOutputDto
    {
        try {
            $response = $this->client->post('/api/galleries', [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::JSON => $gallery,
            ]);

            if ($response->getStatusCode() >= 300) {
                return $this->throwSherlGalleryException($response);
            }

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                GalleryOutputDto::class,
                'json'
            );
        } catch (\Exception $e) {
            throw new SherlException(SherlException::FETCH_FAILED, $e->getMessage());
        }
    }

    public function deleteDynamicBackground(string $dynamicBakgroundId): ?DynamicBackgroundOutputDto
    {
        try {
            $response = $this->client->delete("/api/galleries/dynamic-background/$dynamicBakgroundId", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
            ]);

            if ($response->getStatusCode() >= 300) {
                return $this->throwSherlGalleryException($response);
            }

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                DynamicBackgroundOutputDto::class,
                'json'
            );
        } catch (\Exception $e) {
            throw new SherlException(SherlException::FETCH_FAILED, $e->getMessage());
        }
    }

    public function deleteGallery(string $galleryId): ?GalleryOutputDto
    {
        try {
            $response = $this->client->delete("/api/galleries/$galleryId", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
            ]);

            if ($response->getStatusCode() >= 300) {
                return $this->throwSherlGalleryException($response);
            }

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                GalleryOutputDto::class,
                'json'
            );
        } catch (\Exception $e) {
            throw new SherlException(SherlException::FETCH_FAILED, $e->getMessage());
        }
    }

    public function getDynamicBackgrounds(GetDynamicBackgroundFilters $filters): ?DynamicBackgroundOutputDto
    {
        try {
            $response = $this->client->get('/api/galleries/dynamic-background', [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::QUERY => $filters,
            ]);

            if ($response->getStatusCode() >= 300) {
                return $this->throwSherlGalleryException($response);
            }

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                DynamicBackgroundOutputDto::class,
                'json'
            );
        } catch (\Exception $e) {
            throw new SherlException(SherlException::FETCH_FAILED, $e->getMessage());
        }

    }

    public function getGalleries(GetGalleriesFiltersDto $filters): ?GalleyOutputDto
    {
        try {
            $response = $this->client->get('/api/galleries', [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::QUERY => $filters,
            ]);

            if ($response->getStatusCode() >= 300) {
                return $this->throwSherlGalleryException($response);
            }

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                GalleyOutputDto::class,
                'json'
            );
        } catch (\Exception $e) {
            throw new SherlException(SherlException::FETCH_FAILED, $e->getMessage());
        }
    }

    public function createDynamicBackground(CreateDynamicBackgroundInputDto $dynamicBackground): ?DynamicBackgroundOutputDto
    {
        try {
            $response = $this->client->post('/api/galleries/dynamic-background', [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::JSON => $dynamicBackground,
            ]);

            if ($response->getStatusCode() >= 300) {
                return $this->throwSherlGalleryException($response);
            }

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                DynamicBackgroundOutputDto::class,
                'json'
            );
        } catch (\Exception $e) {
            throw new SherlException(SherlException::FETCH_FAILED, $e->getMessage());
        }
    }

    public function updateDynamicBackground(string $dynamicBackgroundId, CreateDynamicBackgroundInputDto $dynamicBackground): ?DynamicBackgroundOutputDto
    {
        try {
            $response = $this->client->put("/api/galleries/dynamic-background/$dynamicBackgroundId", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::JSON => $dynamicBackground,
            ]);

            if ($response->getStatusCode() >= 300) {
                return $this->throwSherlGalleryException($response);
            }

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                DynamicBackgroundOutputDto::class,
                'json'
            );
        } catch (\Exception $e) {
            throw new SherlException(SherlException::FETCH_FAILED, $e->getMessage());
        }
    }
}
