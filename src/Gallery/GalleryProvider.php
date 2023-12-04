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
use Sherl\Sdk\Gallery\Dto\GalleryOutputDto;
use Sherl\Sdk\Gallery\Dto\CreateDynamicBackgroundInputDto;


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

    /**
     * Creates a new gallery with the given details.
     * 
     * @param CreateGalleryInputDto $gallery The gallery input data transfer object.
     * @return GalleryOutputDto|null The gallery output data object or null on failure.
     * @throws SherlException If there is an error during the gallery creation process.
     */
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

    /**
     * Deletes a dynamic background by its unique identifier.
     * 
     * @param string $dynamicBackgroundId The unique identifier of the dynamic background to delete.
     * @return DynamicBackgroundOutputDto|null The dynamic background output data object or null on failure.
     * @throws SherlException If there is an error during the dynamic background deletion process.
     */
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

    /**
     * Deletes a gallery by its unique identifier.
     * 
     * @param string $galleryId The unique identifier of the gallery to delete.
     * @return GalleryOutputDto|null The gallery output data object or null on failure.
     * @throws SherlException If there is an error during the gallery deletion process.
     */
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

    /**
     * Retrieves dynamic backgrounds based on the provided filters.
     * 
     * @param GetDynamicBackgroundFilters $filters The filters to apply to the dynamic background query.
     * @return DynamicBackgroundOutputDto|null A list of dynamic background output data objects or null on failure.
     * @throws SherlException If there is an error during the retrieval process.
     */
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

    /**
     * Retrieves galleries based on the provided filters.
     * 
     * @param GetGalleriesFiltersDto $filters The filters to apply to the galleries query.
     * @return GalleryOutputDto|null A list of gallery output data objects or null on failure.
     * @throws SherlException If there is an error during the retrieval process.
     */
    public function getGalleries(GetGalleriesFiltersDto $filters): ?GalleryOutputDto
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
                GalleryOutputDto::class,
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

    /**
     * Creates a new dynamic background with the given details.
     * 
     * @param CreateDynamicBackgroundInputDto $dynamicBackground The dynamic background input data transfer object.
     * @return DynamicBackgroundOutputDto|null The dynamic background output data object or null on failure.
     * @throws SherlException If there is an error during the dynamic background creation process.
     */
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
