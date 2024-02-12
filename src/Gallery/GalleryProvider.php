<?php

namespace Sherl\Sdk\Gallery;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

use Psr\Http\Message\ResponseInterface;

use Sherl\Sdk\Common\Error\SherlException;
use Sherl\Sdk\Common\Error\ErrorFactory;
use Sherl\Sdk\Gallery\Errors\GalleryErr;
use Exception;

use Sherl\Sdk\Common\SerializerFactory;

use Sherl\Sdk\Gallery\Dto\NotificationFiltersInputDto;
use Sherl\Sdk\Gallery\Dto\DynamicBackgroundOutputDto;
use Sherl\Sdk\Gallery\Dto\GetDynamicBackgroundFilters;
use Sherl\Sdk\Gallery\Dto\GalleryOutputDto;
use Sherl\Sdk\Gallery\Dto\CreateDynamicBackgroundInputDto;
use Sherl\Sdk\Gallery\Dto\CreateGalleryInputDto;
use Sherl\Sdk\Gallery\Dto\GetGalleriesFiltersDto;

class GalleryProvider
{
    public const DOMAIN = "Gallery";

    private Client $client;

    private ErrorFactory $errorFactory;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->errorFactory = new ErrorFactory(self::DOMAIN, GalleryErr::$errors);
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

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                GalleryOutputDto::class,
                'json'
            );


        } catch (\Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {

                    case 403:
                        throw $this->errorFactory->create(GalleryErr::CREATE_GALLERY_FORBIDDEN);

                }
            }
            throw $this->errorFactory->create(GalleryErr::CREATE_GALLERY_FAILED);
        }
    }

    /**
     * Deletes a dynamic background by its unique identifier.
     *
     * @param string $dynamicBackgroundId The unique identifier of the dynamic background to delete.
     * @return DynamicBackgroundOutputDto|null The dynamic background output data object or null on failure.
     * @throws SherlException If there is an error during the dynamic background deletion process.
     */
    public function deleteDynamicBackground(string $dynamicBackgroundId): ?DynamicBackgroundOutputDto
    {
        try {
            $response = $this->client->delete("/api/galleries/dynamic-background/$dynamicBackgroundId", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::QUERY => $dynamicBackgroundId,
            ]);
            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                DynamicBackgroundOutputDto::class,
                'json'
            );

        } catch (\Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {

                    case 403:
                        throw $this->errorFactory->create(GalleryErr::DELETE_DYNAMIC_BACKGROUND_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(GalleryErr::DYNAMIC_BACKGROUND_NOT_FOUND);

                }
            }
            throw $this->errorFactory->create(GalleryErr::DELETE_DYNAMIC_BACKGROUND_FAILED);
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

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                GalleryOutputDto::class,
                'json'
            );
        } catch (\Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {

                    case 403:
                        throw $this->errorFactory->create(GalleryErr::DELETE_GALLERY_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(GalleryErr::GALLERY_NOT_FOUND);
                }
            }

            throw $this->errorFactory->create(GalleryErr::DELETE_GALLERY_FAILED);
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
            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                DynamicBackgroundOutputDto::class,
                'json'
            );

        } catch (\Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(GalleryErr::GET_DYNAMIC_BACKGROUNDS_FORBIDDEN);

                }
            }

            throw $this->errorFactory->create(GalleryErr::GET_DYNAMIC_BACKGROUNDS_FAILED);
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
            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                GalleryOutputDto::class,
                'json'
            );


        } catch (\Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {

                    case 403:
                        throw $this->errorFactory->create(GalleryErr::GET_GALLERIES_FORBIDDEN);

                }
            }

            throw $this->errorFactory->create(GalleryErr::GET_GALLERIES_FAILED);
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
            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                DynamicBackgroundOutputDto::class,
                'json'
            );


        } catch (\Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {


                    case 403:
                        throw $this->errorFactory->create(GalleryErr::ADD_DYNAMIC_BACKGROUND_FORBIDDEN);

                }
            }
            throw $this->errorFactory->create(GalleryErr::ADD_DYNAMIC_BACKGROUND_FAILED);
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
            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                DynamicBackgroundOutputDto::class,
                'json'
            );

        } catch (\Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {

                    case 403:
                        throw $this->errorFactory->create(GalleryErr::UPDATE_DYNAMIC_BACKGROUND_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(GalleryErr::DYNAMIC_BACKGROUND_NOT_FOUND);

                }
            }
            throw $this->errorFactory->create(GalleryErr::UPDATE_DYNAMIC_BACKGROUND_FAILED);
        }
    }
}
