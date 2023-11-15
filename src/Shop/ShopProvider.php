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

// PRODUCT
use Sherl\Sdk\Shop\Product\Dto\CategoryOutputDto;
use Sherl\Sdk\Shop\Product\Dto\ShopProductCategoryCreateInputDto;
use Sherl\Sdk\Shop\Product\Dto\CommentDto;
use Sherl\Sdk\Shop\Product\Dto\ProductOutputDto;
use Sherl\Sdk\Shop\Product\Dto\ShopProductSubCategoryCreateInputDto;
use Sherl\Sdk\Shop\Product\Dto\ShopProductCategoryFindByQuery;
use Sherl\Sdk\Shop\Product\Dto\PublicCategoryAndSubCategoryFindByDto;

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

    // PRODUCT
    public function addCategoryOrganization(ShopProductCategoryCreateInputDto $category): ?CategoryOutputDto
    {
        $response = $this->client->post(
            "/api/shop/products/categories",
            [
                "headers" => [
                    "Content-Type" => "application/json",
                ],
                RequestOptions::JSON => ['category' => $category]
            ]
        );

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            CategoryOutputDto::class,
            'json'
        );
    }

    public function addCommentOnProduct(AddCommentOnProductDto $productComment): ?CommentDto
    {
        $response = $this->client->post(
            "/api/shop/products/comments",
            [
                "headers" => [
                    "Content-Type" => "application/json",
                ],
                RequestOptions::JSON => ['productComment' => $productComment]
            ]
        );

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            CommentDto::class,
            'json'
        );
    }

    public function addOptionToProduct(string $productId, mixed $option): ?ProductOutputDto
    {
        $response = $this->client->post(
            "/api/shop/products/$productId/options",
            [
                "headers" => [
                    "Content-Type" => "application/json",
                ],
                RequestOptions::QUERY => ["productId" => $productId],
                RequestOptions::JSON => ['option' => $option]
            ]
        );

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            ProductOutputDto::class,
            'json'
        );
    }

    public function addLikeToProduct(string $productId): ?integer
    {
        $response = $this->client->post(
            "/api/shop/products/$productId/like",
            [
                "headers" => [
                    "Content-Type" => "application/json",
                ],
                RequestOptions::QUERY => ["productId" => $productId]
            ]
        );

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            integer,
            'json'
        );
    }

    public function addProductViews(string $productId): ?integer
    {
        $response = $this->client->post(
            "/api/shop/products/$productId/views",
            [
                "headers" => [
                    "Content-Type" => "application/json",
                ],
                RequestOptions::QUERY => ["productId" => $productId]
            ]
        );

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            integer,
            'json'
        );
    }

    public function addSubCategoryToCategory(string $categoryId, ShopProductSubCategoryCreateInputDto $subCategory): ?CategoryOutputDto
    {
        $response = $this->client->post(
            "/api/shop/products/categories/$categoryId",
            [
                "headers" => [
                    "Content-Type" => "application/json",
                ],
                RequestOptions::QUERY => ["categoryId" => $categoryId],
                RequestOptions::JSON => ['subCategory' => $subCategory]
            ]
        );

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            CategoryOutputDto::class,
            'json'
        );
    }

    public function deleteCategory(string $categoryId): ?CategoryOutputDto
    {
        $response = $this->client->delete(
            "/api/shop/products/categories/$categoryId",
            [
                "headers" => [
                    "Content-Type" => "application/json",
                ],
                RequestOptions::QUERY => ["categoryId" => $categoryId]
            ]
        );

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            CategoryOutputDto::class,
            'json'
        );
    }

    public function removeProductOption(string $productId, string $optionId): ?ProductOutputDto
    {
        $response = $this->client->delete(
            "/api/shop/products/$productId/options/$optionId",
            [
                "headers" => [
                    "Content-Type" => "application/json",
                ],
                RequestOptions::QUERY => [
                    "categoryId" => $categoryId,
                    "optionId" => $optionId
                ]
            ]
        );

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            ProductOutputDto::class,
            'json'
        );
    }

    public function updateCategory(string $categoryId, ShopProductCategoryCreateInputDto $updatedCategory): ?CategoryOutputDto
    {
        $response = $this->client->put(
            "/api/shop/products/categories/$categoryId",
            [
                "headers" => [
                    "Content-Type" => "application/json",
                ],
                RequestOptions::QUERY => ["categoryId" => $categoryId],
                RequestOptions::JSON => ['updatedCategory' => $updatedCategory]
            ]
        );

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            CategoryOutputDto::class,
            'json'
        );
    }

    public function getCategories(ShopProductCategoryFindByQuery $filters): ?CategoryOutputDto
    {
        $response = $this->client->get(
            "/api/shop/products/categories/all",
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
            CategoryOutputDto::class,
            'json'
        );
    }

    public function getCategoryById(string $categoryId): ?CategoryOutputDto
    {
        $response = $this->client->get(
            "/api/shop/products/categories/$categoryId",
            [
            "headers" => [
                "Content-Type" => "application/json",
            ],
            RequestOptions::QUERY => ["categoryId" => $categoryId]
            ]
        );

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            CategoryOutputDto::class,
            'json'
        );
    }

    public function getOrganizationCategories(string $organizationId): ?CategoryOutputDto
    {
        $response = $this->client->get(
            "/api/shop/products/categories", // TODO: CHECK ROUTE
            [
            "headers" => [
                "Content-Type" => "application/json",
            ],
            RequestOptions::QUERY => ["categoryId" => $categoryId]
            ]
        );

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            CategoryOutputDto::class,
            'json'
        );
    }

    public function getOrganizationSubCategories(string $categoryId): ?CategoryOutputDto
    {
        $response = $this->client->get(
            "/api/shop/products/categories/$categoryId",
            [
            "headers" => [
                "Content-Type" => "application/json",
            ],
            RequestOptions::QUERY => ["categoryId" => $categoryId]
            ]
        );

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            CategoryOutputDto::class,
            'json'
        );
    }

    public function getProductComments(string $productId, FindProductCommentsInputDto $filters): ?CommentDto // TODO: <ISearchResult<IComment>>
    {
        $response = $this->client->get(
            "/api/shop/products/$productId/comments",
            [
            "headers" => [
                "Content-Type" => "application/json",
            ],
            RequestOptions::QUERY => ["productId" => $productId]
            ]
        );

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            CommentDto::class, // TODO: <ISearchResult<IComment>>
            'json'
        );
    }

    public function getProductLikes(string $productId): ?integer
    {
        $response = $this->client->get(
            "/api/shop/products/$productId/like",
            [
            "headers" => [
                "Content-Type" => "application/json",
            ],
            RequestOptions::QUERY => ["productId" => $productId]
            ]
        );

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            integer,
            'json'
        );
    }

    public function getProductViews(string $productId): ?integer
    {
        $response = $this->client->get(
            "/api/shop/products/$productId/views",
            [
            "headers" => [
                "Content-Type" => "application/json",
            ],
            RequestOptions::QUERY => ["productId" => $productId]
            ]
        );

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            integer,
            'json'
        );
    }

    public function getProduct(string $productId): ?ProductResponseDto
    {
        $response = $this->client->get(
            "/api/shop/products/$productId",
            [
            "headers" => [
                "Content-Type" => "application/json",
            ],
            RequestOptions::QUERY => ["productId" => $productId]
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

    public function getProducts(ProductFindByDto $filters): ?ProductResponseDto //TODO: Pagination<ProductResponseDto>
    {
        $response = $this->client->get(
            "/api/shop/products",
            [
            "headers" => [
                "Content-Type" => "application/json",
            ],
            RequestOptions::JSON => ["filters" => $filters]
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

    public function getPublicCategoriesAndSub(PublicCategoryAndSubCategoryFindByDto $filters): ?PublicCategoryResponseDto // TODO: PublicCategoryResponseDto[]
    {
        $response = $this->client->get(
            "/api/public/shop/products/categories-and-subcategories",
            [
            "headers" => [
                "Content-Type" => "application/json",
            ],
            RequestOptions::JSON => ["filters" => $filters]
            ]
        );

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            PublicCategoryResponseDto::class,
            'json'
        );
    }

    public function getPublicCategories(): ?PublicCategoryResponseDto // TODO: PublicCategoryResponseDto[]
    {
        $response = $this->client->get(
            "/api/public/shop/products/categories",
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
            PublicCategoryResponseDto::class,
            'json'
        );
    }

    public function getPublicCategoryBySlug(string $slug): ?PublicCategoryResponseDto
    {
        $response = $this->client->get(
            "/api/public/shop/products/categories/find-one-by-slug/$slug",
            [
            "headers" => [
                "Content-Type" => "application/json",
            ],
            RequestOptions::QUERY => ["slug" => $slug]
            ]
        );

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            PublicCategoryResponseDto::class,
            'json'
        );
    }

    public function getPublicProductBySlug(string $slug): ?PublicProductResponseDto
    {
        $response = $this->client->get(
            "/api/public/shop/products/find-one-by-slug/$slug",
            [
            "headers" => [
                "Content-Type" => "application/json",
            ],
            RequestOptions::QUERY => ["slug" => $slug]
            ]
        );

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            PublicProductResponseDto::class,
            'json'
        );
    }

    public function getPublicProduct(string $id): ?PublicProductResponseDto
    {
        $response = $this->client->get(
            "/api/public/shop/products/$id",
            [
            "headers" => [
                "Content-Type" => "application/json",
            ],
            RequestOptions::QUERY => ["id" => $id]
            ]
        );

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            PublicProductResponseDto::class,
            'json'
        );
    }

    public function getPublicProductsWithFilters(ProductFindByDto $filters): ?Pagination // TODO: Pagination<ProductResponseDto>
    {
        $response = $this->client->get(
            "/api/shop/products/public",
            [
            "headers" => [
                "Content-Type" => "application/json",
            ],
            RequestOptions::JSON => ["filters" => $filters]
            ]
        );

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            Pagination::class,
            'json'
        );
    }

    public function getPublicProducts(ProductFindByDto $filters): ?Pagination // TODO: Pagination<ProductResponseDto>
    {
        $response = $this->client->get(
            "/api/public/shop/products",
            [
            "headers" => [
                "Content-Type" => "application/json",
            ],
            RequestOptions::JSON => ["filters" => $filters]
            ]
        );

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            Pagination::class,
            'json'
        );
    }

    public function getUnrestrictedCategories(): ?CategoryOutputDto
    {
        $response = $this->client->get(
            "/api/shop/products/categories/public",
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
            CategoryOutputDto::class,
            'json'
        );
    }
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
