<?php

namespace Sherl\Sdk\Shop;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

use Psr\Http\Message\ResponseInterface;

use Sherl\Sdk\Common\Error\SherlException;
use Sherl\Sdk\Common\SerializerFactory;

class ShopProvider
{
    public const DOMAIN = "Shop";

    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    private function throwSherlShopException(ResponseInterface $response)
    {
        throw new SherlException(ShopProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
    }

    public function createAdvertisement(CreateAdvertisementInputDto $createAdvertisement): ?AdvertismentOutputDto
    {
        

        $response = $this->client->post(
            "/api/shop/advertisements",
            [
            "headers" => [
              "Content-Type" => "application/json",
            ],
            RequestOptions::JSON => [
              'description' => $createAdvertisement->description,
              'displayZones' => $createAdvertisement->displayZones,
              'backgroundImage' => $createAdvertisement->backgroundImage,
              'name' => $createAdvertisement->name,
              'redirectUrl' => $createAdvertisement->redirectUrl,
              'translations' => $createAdvertisement->translations,
              'metadatas' => $createAdvertisment->metadatas
            ]
      ]
        );

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlClaimException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            Advertisement::class,
            'json'
        );
    }

    public function updateAdvertisement(string $advertisementId, CreateAdvertisementInputDto $updateAdvertisement): ?AdvertismentOutputDto
    {
        $response = $this->client->put(
            "/api/shop/advertisements/:" + $advertisementId,
            [
            "headers" => [
              "Content-Type" => "application/json",
            ],
            RequestOptions::JSON => [
              'description' => $updateAdvertisement->description,
              'displayZones' => $updateAdvertisement->displayZones,
              'backgroundImage' => $updateAdvertisement->backgroundImage,
              'name' => $updateAdvertisement->name,
              'redirectUrl' => $updateAdvertisement->redirectUrl,
              'translations' => $updateAdvertisement->translations,
              'metadatas' => $updateAdvertisement->metadatas            ]
      ]
        );

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlClaimException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            AdvertismentOutputDto::class,
            'json'
        );
    }

    public function deleteAdvertisement(string $advertisementId): ?boolean
    {
        $response = $this->client->delete(
            "/api/shop/advertisements/$advertisementId",
            [
            "headers" => [
              "Content-Type" => "application/json",
            ],
            RequestOptions::JSON => []
      ]
        );

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlClaimException($response);
        }

        return filter_var($response->getBody()->getContents(), FILTER_VALIDATE_BOOLEAN);

    }
    public function getAdvertisement(string $advertisementId): ?AdvertisementOutputDto
    {
        $response = $this->client->get(
          "/api/shop/advertisements/$advertisementId",
          [
            "headers" => [
              "Content-Type" => "application/json",
            ],
      ]
        );

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlClaimException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            AdvertisementOutputDto::class,
            'json'
        );
    }

    public function getAdvertisements(FindAdvertisementInptuDto $filter): ?FindAdvertisementsOutputDto
    {
        $response = $this->client->get(
          "/api/shop/advertisements",
          [
            "headers" => [
              "Content-Type" => "application/json",
            ],
      ]
        );

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlClaimException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            FindAdvertisementsOutputDto::class,
            'json'
        );
    }

    public function getPublicAdvertisements(FindAdvertisementInptuDto $filter): ?FindAdvertisementsOutputDto
    {
        $response = $this->client->get(
          "/api/public/shop/advertisements",
          [
            "headers" => [
              "Content-Type" => "application/json",
            ],
      ]
        );

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlClaimException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            FindAdvertisementsOutputDto::class,
            'json'
        );
    }


    //Basket 
  
}
