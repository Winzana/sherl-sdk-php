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
    //Payment
    public function deleteCard(string $cardId): ?PersonInputDto
{
    $response = $this->client->delete("/api/shop/payments/card/{$cardId}");

    if ($response->getStatusCode() >= 300) {
        return $this->throwSherlShopException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
        $response->getBody()->getContents(),
        PersonInputDto::class,
        'json'
    );
}
public function requestCredentialsToAddCard(): ?CreditCardDto
{
    $response = $this->client->post("/api/shop/payments/request-credentials-to-add-card");

    if ($response->getStatusCode() >= 300) {
        return $this->throwSherlShopException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
        $response->getBody()->getContents(),
        CreditCardDto::class,
        'json'
    );
}
public function saveCard(string $cardId, string $token): ?PersonInputDto
{
    $response = $this->client->post(
        "/api/shop/payments/card/{$cardId}/default",
        [
            RequestOptions::JSON => ['id' => $cardId, 'token' => $token]
        ]
    );

    if ($response->getStatusCode() >= 300) {
        return $this->throwSherlShopException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
        $response->getBody()->getContents(),
        PersonInputDto::class,
        'json'
    );
}
public function setDefaultCard(string $cardId): ?PersonInputDto
{
    $response = $this->client->post("/api/shop/payments/card/{$cardId}/default");

    if ($response->getStatusCode() >= 300) {
        return $this->throwSherlShopException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
        $response->getBody()->getContents(),
        PersonInputDto::class,
        'json'
    );
}
public function validateCard(string $cardId): ?CreditCardDto
{
    $response = $this->client->get("/api/shop/payments/validate-card/{$cardId}");

    if ($response->getStatusCode() >= 300) {
        return $this->throwSherlShopException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
        $response->getBody()->getContents(),
        CreditCardDto::class,
        'json'
    );
}
//Payout
public function generatePayout(): ?array
{
    $response = $this->client->post("/api/shop/generate-payout");

    if ($response->getStatusCode() >= 300) {
        return $this->throwSherlShopException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
        $response->getBody()->getContents(),
        'array<PayoutDto>',
        'json'
    );
}
public function submitPayout(): ?PayoutDto
{
    $response = $this->client->post("/api/shop/submit-payout");

    if ($response->getStatusCode() >= 300) {
        return $this->throwSherlShopException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
        $response->getBody()->getContents(),
        PayoutDto::class,
        'json'
    );
}
//picture
public function addPictureToProduct(string $productId, string $mediaId): ?ProductResponseDto
{
    $response = $this->client->post(
        "/api/shop/products/{$productId}/pictures/{$mediaId}",
        [
            "headers" => [
                "Content-Type" => "application/json",
            ],
            RequestOptions::JSON => [
                'productId' => $productId,
                'idMedia' => $mediaId,
            ]
        ]
    );

    if ($response->getStatusCode() >= 300) {
        return $this->throwSherlShopException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
        $response->getBody()->getContents(),
        ProductResponseDto::class,
        'json'
    );
}
public function removePictureToProduct(string $productId, string $mediaId): ?ProductResponseDto
{
    $response = $this->client->delete(
        "/api/shop/products/{$productId}/pictures/{$mediaId}"
    );

    if ($response->getStatusCode() >= 300) {
        return $this->throwSherlShopException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
        $response->getBody()->getContents(),
        ProductResponseDto::class,
        'json'
    );
}
//subcription
public function cancelSubscription(string $subscriptionId): ?SubscriptionOutputDto
{
    $response = $this->client->post(
        "/api/shop/subscriptions/{$subscriptionId}/cancel",
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

    return SerializerFactory::getInstance()->deserialize(
        $response->getBody()->getContents(),
        SubscriptionOutputDto::class,
        'json'
    );
}
public function getSubscriptionFindOneBy(SubscriptionFindOnByDto $filters): ?SubscriptionOutputDto
{
    $response = $this->client->get(
        "/api/shop/subscriptions/find-one-by", 
        [
            "headers" => [
                "Content-Type" => "application/json",
            ],
            'query' => $filters
        ]
    );

    if ($response->getStatusCode() >= 300) {
        return $this->throwSherlShopException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
        $response->getBody()->getContents(),
        SubscriptionOutputDto::class,
        'json'
    );
}

}