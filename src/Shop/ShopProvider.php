<?php

namespace Sherl\Sdk\Shop;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

use Psr\Http\Message\ResponseInterface;

use Sherl\Sdk\Common\Error\SherlException;
use Sherl\Sdk\Common\SerializerFactory;

use Sherl\Sdk\Shop\Advertisement\Dto\CreateAdvertisementInputDto;
use Sherl\Sdk\Shop\Advertisement\Dto\AdvertisementOutputDto;
use Sherl\Sdk\Shop\Advertisement\Dto\FindAdvertisementInputDto;
use Sherl\Sdk\Shop\Advertisement\Dto\FindAdvertisementsOutputDto;


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

    public function createAdvertisement(CreateAdvertisementInputDto $createAdvertisement): ?AdvertisementOutputDto
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
              'metadatas' => $createAdvertisement->metadatas
            ]
      ]
        );

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            Advertisement::class,
            'json'
        );
    }

    public function updateAdvertisement(string $advertisementId, CreateAdvertisementInputDto $updateAdvertisement): ?AdvertisementOutputDto
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
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            AdvertismentOutputDto::class,
            'json'
        );
    }

    public function deleteAdvertisement(string $advertisementId): ?bool
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
            return $this->throwSherlShopException($response);
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
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            AdvertisementOutputDto::class,
            'json'
        );
    }

    public function getAdvertisements(FindAdvertisementInputDto $filter): ?FindAdvertisementsOutputDto
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
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            FindAdvertisementsOutputDto::class,
            'json'
        );
    }

    public function getPublicAdvertisements(FindAdvertisementInputDto $filter): ?FindAdvertisementsOutputDto
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
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            FindAdvertisementsOutputDto::class,
            'json'
        );
    }


    //Basket
    public function addProductToBasket(AddProductInputDto $productToAdd): ?FindAdvertisementsOutputDto
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
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            FindAdvertisementsOutputDto::class,
            'json'
        );
    }
// order
    public function cancelOrder(string $orderId, CancelOrderInputDto $cancelOrderDates): ?OrderResponse
{
    $response = $this->client->post(
        "/api/shop/orders/{$orderId}/cancel",
        [
            "headers" => [
                "Content-Type" => "application/json",
            ],
            RequestOptions::JSON => $cancelOrderDates
        ]
    );
    if ($response->getStatusCode() >= 300) {
        return $this->throwSherlShopException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
        $response->getBody()->getContents(),
        OrderResponse::class,
        'json'
    );
}

public function getOrder(string $orderId): ?OrderResponse
{
    $response = $this->client->get("/api/shop/orders/{$orderId}");

    if ($response->getStatusCode() != 200) {
        return $this->throwSherlShopException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
        $response->getBody()->getContents(),
        OrderResponse::class,
        'json'
    );
}

public function getOrders(OrderFindByDto $filters): ?Pagination
{

    $response = $this->client->get("/api/shop/orders", [
        'query' => $filters
    ]);

    if ($response->getStatusCode() != 200) {
        return $this->throwSherlShopException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
        $response->getBody()->getContents(),
        Pagination::class,
        'json'
    );
}
public function getOrganizationOrders(string $organizationId, OrderFindByDto $filters): ?Pagination
{

    $response = $this->client->get(
        "/api/shop/orders/list-to/{$organizationId}",
        [
            "headers" => [
                "Content-Type" => "application/json",
            ],
            'query' => $filters
        ]
    );

    if ($response->getStatusCode() != 200) {
        return $this->throwSherlShopException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
        $response->getBody()->getContents(),
        Pagination::class,
        'json'
    );
}
public function updateOrderStatus(string $orderId, OrderStatusEnum $status): ?OrderResponse
{
    $response = $this->client->post(
        "/api/shop/orders/{$orderId}/status/:status",
        [
            "headers" => [
                "Content-Type" => "application/json",
            ],
            RequestOptions::JSON => ['status' => $status]
        ]
    );

    if ($response->getStatusCode() >= 300) {
        return $this->throwSherlShopException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
        $response->getBody()->getContents(),
        OrderResponse::class,
        'json'
    );
}
}