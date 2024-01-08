<?php

namespace Sherl\Sdk\Shop;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

use Psr\Http\Message\ResponseInterface;
use Sherl\Sdk\Common\SerializerFactory;

// ERRORS MANAGEMENT
use Sherl\Sdk\Common\Error\SherlException;
use Sherl\Sdk\Common\Error\ErrorFactory;
use Sherl\Sdk\Common\Error\ErrorHelper;
use Sherl\Sdk\Shop\Errors\ShopErr;
use Exception;

// PERSON CLASSES
use Sherl\Sdk\Person\Dto\PersonOutputDto;

// ADVERTISEMENT CLASSES
use Sherl\Sdk\Shop\Advertisement\Dto\AdvertisementDto;
use Sherl\Sdk\Shop\Advertisement\Dto\CreateAdvertisementInputDto;
use Sherl\Sdk\Shop\Advertisement\Dto\FindAdvertisementInputDto;
use Sherl\Sdk\Shop\Advertisement\Dto\FindAdvertisementsOutputDto;

// BASKET CLASSES
use Sherl\Sdk\Shop\Basket\Dto\AddProductInputDto;

// DISCOUNT CLASSES
use Sherl\Sdk\Shop\Discount\Dto\DiscountFilterInputDto;
use Sherl\Sdk\Shop\Discount\Dto\DiscountPublicFilterInputDto;
use Sherl\Sdk\Shop\Discount\Dto\DiscountDto;
use Sherl\Sdk\Shop\Discount\Dto\DiscountParameterDto;
use Sherl\Sdk\Shop\Discount\Dto\DiscountPaginatedResultOutputDto;

// LOYALTY CLASSES
use Sherl\Sdk\Shop\Loyalty\Dto\LoyaltyCardDto;
use Sherl\Sdk\Shop\Loyalty\Dto\LoyaltyCardFindByDto;
use Sherl\Sdk\Shop\Loyalty\Dto\LoyaltySearchResultDto;
use Sherl\Sdk\Shop\Loyalty\Dto\ShopLoyaltyCardUpdateInputDto;

// ORDER CLASSES
use Sherl\Sdk\Shop\Order\Dto\ShopBasketValidateAndPayInputDto;
use Sherl\Sdk\Shop\Order\Dto\ShopBasketValidatePaymentInputDto;
use Sherl\Sdk\Shop\Order\Dto\CancelOrderInputDto;
use Sherl\Sdk\Shop\Order\Dto\OrderDto;
use Sherl\Sdk\Shop\Order\Dto\OrderFindInputDto;
use Sherl\Sdk\Shop\Order\Dto\OrderFindOutputDto;

// ORDER ENUMS
use Sherl\Sdk\Shop\Order\Enum\OrderStatus;


// PRODUCT CLASSES
use Sherl\Sdk\Shop\Product\Dto\CommentDto;
use Sherl\Sdk\Shop\Product\Dto\ProductOutputDto;
use Sherl\Sdk\Shop\Product\Dto\ProductResponseDto;
use Sherl\Sdk\Shop\Product\Dto\FindProductCommentsInputDto;
use Sherl\Sdk\Shop\Product\Dto\ProductCommentsResult;
use Sherl\Sdk\Shop\Product\Dto\ProductFindByDto;
use Sherl\Sdk\Shop\Product\Dto\PublicProductResponseDto;
use Sherl\Sdk\Shop\Product\Dto\ProductPaginatedResultDto;

// CATEGORY CLASSES
use Sherl\Sdk\Shop\Category\Dto\ProductCategoryDto;
use Sherl\Sdk\Shop\Category\Dto\ShopProductCategoryCreateInputDto;
use Sherl\Sdk\Shop\Category\Dto\ShopProductSubCategoryCreateInputDto;
use Sherl\Sdk\Shop\Category\Dto\ShopProductCategoryFindByQueryDto;
use Sherl\Sdk\Shop\Category\Dto\PublicCategoryAndSubCategoryFindByDto;
use Sherl\Sdk\Shop\Category\Dto\PublicCategoryResponseDto;

// PRODUCT CLASSES
use Sherl\Sdk\Shop\Product\Dto\AddCommentOnProductDto;

// SUBSCRIPTION CLASSES
use Sherl\Sdk\Shop\Subscription\Dto\SubscriptionDto;
use Sherl\Sdk\Shop\Subscription\Dto\SubscriptionFindOnByDto;

// PAYEMENT CLASSES
use Sherl\Sdk\Shop\Payment\Dto\CreditCardDto;

// PAYOUT CLASSES
use Sherl\Sdk\Shop\Payout\Dto\PayoutDto;

class ShopProvider
{
    public const DOMAIN = "Shop";

    private Client $client;

    private ErrorFactory $errorFactory;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->errorFactory = new ErrorFactory(self::DOMAIN, ShopErr::$errors);
    }

    private function throwSherlShopException(ResponseInterface $response): Exception
    {
        throw new SherlException(ShopProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
    }

    // ADVERTISEMENT

    /**
     * Create an advertisement.
     *
     * @param CreateAdvertisementInputDto $createAdvertisement The input data to create the advertisement.
     * @throws SherlException If there is an error creating the advertisement.
     * @return AdvertisementDto|null The created advertisement.
     */
    public function createAdvertisement(CreateAdvertisementInputDto $createAdvertisement): ?AdvertisementDto
    {
        try {
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

            switch ($response->getStatusCode()) {
                case 201:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        AdvertisementDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(ShopErr::CREATION_FAILED_FORBIDDEN);
                default:
                    throw $this->errorFactory->create(ShopErr::CREATION_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(ShopErr::CREATION_FAILED));
        }
    }
    /**
     * Updates an advertisement.
     *
     * @param string $advertisementId The ID of the advertisement to update.
     * @param CreateAdvertisementInputDto $updateAdvertisement The updated advertisement data.
     * @throws SherlException If the API request fails.
     * @return AdvertisementDto|null The updated advertisement, or null if the request was unsuccessful.
     */
    public function updateAdvertisement(string $advertisementId, CreateAdvertisementInputDto $updateAdvertisement): ?AdvertisementDto
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
              'metadatas' => $updateAdvertisement->metadatas
            ]
      ]
        );

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            AdvertisementDto::class,
            'json'
        );
    }

    /**
     * Deletes an advertisement.
     *
     * @param string $advertisementId The ID of the advertisement to delete.
     * @throws SherlException If the request to delete the advertisement fails.
     * @return bool|null Returns `true` if the advertisement was deleted successfully, `false` otherwise.
     */
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

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return filter_var($response->getBody()->getContents(), FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Retrieves an advertisement by its ID.
     *
     * @param string $advertisementId The ID of the advertisement.
     * @throws SherlException If an error occurs during the request.
     * @return AdvertisementDto|null The advertisement data or null if not found.
     */
    public function getAdvertisement(string $advertisementId): ?AdvertisementDto
    {
        $response = $this->client->get(
            "/api/shop/advertisements/$advertisementId",
            [
            "headers" => [
              "Content-Type" => "application/json",
            ],
      ]
        );

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            AdvertisementDto::class,
            'json'
        );
    }

    /**
     * Retrieves advertisements based on the provided filter.
     *
     * @param FindAdvertisementInputDto $filter The filter to apply when retrieving advertisements.
     * @throws SherlException If there is an error retrieving the advertisements.
     * @return FindAdvertisementsOutputDto The retrieved advertisements.
     */
    public function getAdvertisements(FindAdvertisementInputDto $filter): ?FindAdvertisementsOutputDto
    {
        $response = $this->client->get(
            "/api/shop/advertisements",
            [
            "headers" => [
              "Content-Type" => "application/json",
            ],
            RequestOptions::JSON => [
              'displayDeleted' => $filter->displayDeleted,
              'displayZones' => $filter->displayZones,
              'shuffle' => $filter->shuffle,
              'q' => $filter->q,
              'displayAllVersion' => $filter->displayAllVersion,
              'panel' => $filter->panel,
              'uriOfPanels' => $filter->uriOfPanels,
              'sortBy' => $filter->sortBy,
              'sortOrder' => $filter->sortOrder
            ]
      ]
        );

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            FindAdvertisementsOutputDto::class,
            'json'
        );
    }

    /**
     * Retrieves public advertisements based on the given filter.
     *
     * @param FindAdvertisementInputDto $filter The filter to apply when retrieving advertisements.
     * @throws SherlException If there is an error retrieving the advertisements.
     * @return FindAdvertisementsOutputDto The output DTO containing the retrieved advertisements.
     */
    public function getPublicAdvertisements(FindAdvertisementInputDto $filter): ?FindAdvertisementsOutputDto
    {
        $response = $this->client->get(
            "/api/public/shop/advertisements",
            [
            "headers" => [
              "Content-Type" => "application/json",
            ],
            RequestOptions::JSON => [
              'displayDeleted' => $filter->displayDeleted,
              'displayZones' => $filter->displayZones,
              'shuffle' => $filter->shuffle,
              'q' => $filter->q,
              'displayAllVersion' => $filter->displayAllVersion,
              'panel' => $filter->panel,
              'uriOfPanels' => $filter->uriOfPanels,
              'sortBy' => $filter->sortBy,
              'sortOrder' => $filter->sortOrder
            ]
      ]
        );

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            FindAdvertisementsOutputDto::class,
            'json'
        );
    }


    // BASKET

    /**
     * Adds a product to the basket.
     *
     * @param AddProductInputDto $productToAdd The product to add to the basket.
     * @throws SherlException If an error occurs during the request.
     * @return FindAdvertisementsOutputDto|null The output DTO for finding advertisements.
     */
    public function addProductToBasket(AddProductInputDto $productToAdd): ?FindAdvertisementsOutputDto
    {
        $response = $this->client->post(
            "/api/public/shop/advertisements",
            [
            "headers" => [
              "Content-Type" => "application/json",
            ],
            RequestOptions::JSON => [
              'organizationUri' => $productToAdd->organizationUri,
              'orderId' => $productToAdd->orderId,
              'latitude' => $productToAdd->latitude,
              'longitude' => $productToAdd->longitude,
              'productId' => $productToAdd->productId,
              'orderQuantity' => $productToAdd->orderQuantity,
              'options' => $productToAdd->options,
              'schedules' => $productToAdd->schedules,
              'metadatas' => $productToAdd->metadatas,
              'customerUri' => $productToAdd->customerUri,
              'isFreeTrial' => $productToAdd->isFreeTrial
            ]
      ]
        );

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            FindAdvertisementsOutputDto::class,
            'json'
        );
    }

    /**
     * Clears the basket for a given customer.
     *
     * @param string $customerId The ID of the customer.
     * @throws SherlException If an error occurs during the request.
     * @return bool Whether the basket was cleared successfully.
     */
    public function clearBasket(string $customerId): bool
    {
        $response = $this->client->post(
            "/api/shop/baskets/clear",
            [
            "headers" => [
              "Content-Type" => "application/json",
            ],
            RequestOptions::JSON => [
              'customerId' => $customerId
            ]
      ]
        );

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return filter_var($response->getBody()->getContents(), FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Adds a comment to the basket.
     *
     * @param string $comment The comment to be added to the basket.
     * @throws SherlException If an error occurs during the request.
     * @return OrderDto The associated OrderDto object updated.
     */
    public function addCommentToBasket(string $comment): OrderDto
    {
        $response = $this->client->post(
            "/api/shop/baskets/comment",
            [
            "headers" => [
              "Content-Type" => "application/json",
            ],
            RequestOptions::JSON => [
              'comment' => $comment
            ]
      ]
        );

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            OrderDto::class,
            'json'
        );
    }

    /**
     * Retrieves the customer basket.
     *
     * @param string $customerUri The URI of the customer.
     * @throws SherlException If an error occurs during the request.
     * @return bool The associated OrderDto object.
     */
    public function getCustomerBasket(string $customerUri): bool
    {
        $response = $this->client->get(
            "/api/shop/baskets",
            [
            "headers" => [
              "Content-Type" => "application/json",
            ],
            RequestOptions::JSON => [
              'customerUri' => $customerUri
            ]
      ]
        );

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            OrderDto::class,
            'json'
        );
    }


    /**
     * Remove an item from the basket.
     *
     * @param string $itemId The ID of the item to be removed.
     * @throws SherlException If an error occurs during the request.
     * @return bool Returns true if the item was successfully removed, otherwise false.
     */
    public function removeItemFromBasket(string $itemId): bool
    {
        $response = $this->client->delete(
            "/api/shop/baskets/remove/$itemId",
            [
            "headers" => [
              "Content-Type" => "application/json",
            ],
      ]
        );

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            OrderDto::class,
            'json'
        );
    }

    /**
     * Add a discount code to the basket.
     *
     * @param string $code The discount code to add.
     * @throws SherlException If an error occurs during the request.
     * @return OrderDto The updated order object.
     */
    public function addDiscountCodeToBasket(string $code): OrderDto
    {
        $response = $this->client->post(
            "/api/shop/baskets/set-discount-code",
            [
            "headers" => [
              "Content-Type" => "application/json",
            ],

            RequestOptions::JSON => [
              'code' => $code
            ]
      ]
        );

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            OrderDto::class,
            'json'
        );
    }

    /**
     * Adds a sponsor code to the basket.
     *
     * @param string $code The sponsor code to add.
     * @throws SherlException If an error occurs during the request.
     * @return OrderDto The updated OrderDto object.
     */
    public function addSponsorCodeToBasket(string $code): OrderDto
    {
        $response = $this->client->post(
            "/api/shop/baskets/set-sponsorship-code",
            [
            "headers" => [
              "Content-Type" => "application/json",
            ],

            RequestOptions::JSON => [
              'code' => $code
            ]
      ]
        );

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            OrderDto::class,
            'json'
        );
    }

    /**
     * Validates and pays the shop basket.
     *
     * @param ShopBasketValidateAndPayInputDto $validation the input data for validation and payment
     * @throws SherlException If an error occurs during the request.
     * @return OrderDto the updated order object.
     */
    public function validateAndPayBasket(ShopBasketValidateAndPayInputDto $validation): OrderDto
    {
        $response = $this->client->post(
            "/api/shop/baskets/validate-and-pay",
            [
            "headers" => [
              "Content-Type" => "application/json",
            ],

            RequestOptions::JSON => [
              'orderId' => $validation->orderId,
              'customerUri' => $validation->customerUri,
              'meansOfPayment' => $validation->meansOfPayment
            ]
      ]
        );

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            OrderDto::class,
            'json'
        );
    }

    /**
     * Validates the payment basket using the provided input data.
     *
     * @param ShopBasketValidatePaymentInputDto $validation The input data for validating the payment basket.
     * @throws SherlException If an error occurs during the request.
     * @return OrderDto The order data after the payment basket is validated.
     */
    public function validatePaymentBasket(ShopBasketValidatePaymentInputDto $validation): OrderDto
    {
        $response = $this->client->post(
            "/api/shop/baskets/validate-and-pay",
            [
            "headers" => [
              "Content-Type" => "application/json",
            ],

            RequestOptions::JSON => [
              'orderId' => $validation->orderId,
              'customerUri' => $validation->customerUri
            ]
      ]
        );

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            OrderDto::class,
            'json'
        );
    }

    // DISCOUNT

    /**
     * Creates a discount using the provided discount parameters.
     *
     * @param DiscountParameterDto $discountParameter The discount parameters.
     * @throws SherlException If an error occurs during the request.
     * @return DiscountDto|null The created discount.
     */
    public function createDiscount(DiscountParameterDto $discountParameter): ?DiscountDto
    {
        $response = $this->client->post(
            "/api/shop/discounts",
            [
            "headers" => [
              "Content-Type" => "application/json",
            ],
            RequestOptions::JSON => [
              'id' => $discountParameter->id,
              'name' => $discountParameter->name,
              'availableFrom' => $discountParameter->availableFrom,
              'availableUntil' => $discountParameter->availableUntil,
              'enabled' => $discountParameter->enabled,
              'highlight' => $discountParameter->highlight,
              'cumulative' => $discountParameter->cumulative,
              'discountType' => $discountParameter->discountType,
              'code' => $discountParameter->code,
              'percentage' => $discountParameter->percentage,
              'amount' => $discountParameter->amount,
              'quantity' => $discountParameter->quantity,
              'translaquantityPerUsertions' => $discountParameter->quantityPerUser,
              'customers' => $discountParameter->customers,
              'visibleToPublic' => $discountParameter->visibleToPublic,
              'productRestrictions' => $discountParameter->productRestrictions,
              'dateRestrictions' => $discountParameter->dateRestrictions,
            ]
      ]
        );

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            DiscountDto::class,
            'json'
        );
    }

    /**
     * Updates a discount.
     *
     * @param string $discountId The ID of the discount to update.
     * @param DiscountParameterDto $discountParameter The parameters for the discount.
     * @throws SherlException If an error occurs during the request.
     * @return DiscountDto The updated discount.
     */
    public function updateDiscount(string $discountId, DiscountParameterDto $discountParameter): ?DiscountDto
    {


        $response = $this->client->put(
            "/api/shop/discounts/$discountId",
            [
            "headers" => [
              "Content-Type" => "application/json",
            ],
            RequestOptions::JSON => [
              'id' => $discountParameter->id,
              'name' => $discountParameter->name,
              'availableFrom' => $discountParameter->availableFrom,
              'availableUntil' => $discountParameter->availableUntil,
              'enabled' => $discountParameter->enabled,
              'highlight' => $discountParameter->highlight,
              'cumulative' => $discountParameter->cumulative,
              'discountType' => $discountParameter->discountType,
              'code' => $discountParameter->code,
              'percentage' => $discountParameter->percentage,
              'amount' => $discountParameter->amount,
              'quantity' => $discountParameter->quantity,
              'translaquantityPerUsertions' => $discountParameter->quantityPerUser,
              'customers' => $discountParameter->customers,
              'visibleToPublic' => $discountParameter->visibleToPublic,
              'productRestrictions' => $discountParameter->productRestrictions,
              'dateRestrictions' => $discountParameter->dateRestrictions,
            ]
      ]
        );

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            DiscountDto::class,
            'json'
        );
    }

    /**
     * Deletes a discount by its ID.
     *
     * @param string $discountId The ID of the discount to delete.
     * @throws SherlException If an error occurs during the request.
     * @return DiscountDto The deleted discount.
     */
    public function deleteDiscount(string $discountId): ?DiscountDto
    {
        $response = $this->client->delete(
            "/api/shop/discounts/$discountId",
            [
            "headers" => [
              "Content-Type" => "application/json",
            ],
            RequestOptions::JSON => []
      ]
        );

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            DiscountDto::class,
            'json'
        );
    }

    /**
     * Finds a single discount by the given parameters.
     *
     * @param DiscountFilterInputDto $filter The filter parameters for the discount.
     * @throws SherlException If an error occurs during the request.
     * @return DiscountDto The output DTO representing the discount.
     */
    public function findOneDiscountByParams(DiscountFilterInputDto $filter): ?DiscountDto
    {
        $response = $this->client->get(
            "/api/shop/advertisements/",
            [
            "headers" => [
              "Content-Type" => "application/json",
            ],
            RequestOptions::JSON => [
              "id" => $filter->id,
              "uri" => $filter->uri,
              "name" => $filter->name,
              "ownerUri" => $filter->ownerUri,
              "ownerUris" => $filter->ownerUris,
              "consumerId" => $filter->consumerId,
              "validFor" => $filter->validFor,
              "enabled" => $filter->enabled,
              "isSubscription" => $filter->isSubscription,
              "public" => $filter->public,
              "visibleToPublic" => $filter->visibleToPublic,
              "highlight" => $filter->highlight,
              "cumulative" => $filter->cumulative,
              "discountType" => $filter->discountType,
              "code" => $filter->code,
              "toCode" => $filter->toCode,
              "noCode" => $filter->noCode,
              "percentage" => $filter->percentage,
              "amount" => $filter->amount,
              "quantity" => $filter->quantity,
              "quantityPerUser" => $filter->quantityPerUser,
              "customerUri" => $filter->customerUri,
              "productUris" => $filter->productUris,
              "noProduct" => $filter->noProduct,
              "productRestrictions" => $filter->productRestrictions,
              "dateRestrictions" => $filter->dateRestrictions,
              "toDate" => $filter->toDate,
              "toMe" => $filter->toMe,
              "createdAt" => $filter->createdAt,
              "updatedAt" => $filter->updatedAt,
              "offPeakHours" => $filter->offPeakHours,
              "toValidate" => $filter->toValidate,
              "availableFrom" => $filter->availableFrom,
              "availableUntil" => $filter->availableUntil,
            ]

      ]
        );

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            DiscountDto::class,
            'json'
        );
    }

    /**
     * Retrieves a discount by its ID.
     *
     * @param string $discountId The ID of the discount to retrieve.
     * @throws SherlException If the request to retrieve the discount fails.
     * @return DiscountDto|null The discount information, or null if it does not exist.
     */
    public function getDiscountById(string $discountId): ?DiscountDto
    {
        $response = $this->client->get(
            "/api/shop/discounts/$discountId",
            [
            "headers" => [
              "Content-Type" => "application/json",
            ],
      ]
        );

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            DiscountDto::class,
            'json'
        );
    }

    /**
     * Retrieves a paginated list of discounts based on the provided filter.
     *
     * @param DiscountFilterInputDto $filter The filter to apply to the discounts.
     * @throws SherlException If an error occurs during the request.
     * @return DiscountPaginatedResultOutputDto The paginated list of discounts.
     */
    public function getDiscountsWithFilter(DiscountFilterInputDto $filter): ?DiscountPaginatedResultOutputDto
    {
        $response = $this->client->get(
            "/api/shop/advertisements/",
            [
            "headers" => [
              "Content-Type" => "application/json",
            ],
            RequestOptions::JSON => [
              "id" => $filter->id,
              "uri" => $filter->uri,
              "name" => $filter->name,
              "ownerUri" => $filter->ownerUri,
              "ownerUris" => $filter->ownerUris,
              "consumerId" => $filter->consumerId,
              "validFor" => $filter->validFor,
              "enabled" => $filter->enabled,
              "isSubscription" => $filter->isSubscription,
              "public" => $filter->public,
              "visibleToPublic" => $filter->visibleToPublic,
              "highlight" => $filter->highlight,
              "cumulative" => $filter->cumulative,
              "discountType" => $filter->discountType,
              "code" => $filter->code,
              "toCode" => $filter->toCode,
              "noCode" => $filter->noCode,
              "percentage" => $filter->percentage,
              "amount" => $filter->amount,
              "quantity" => $filter->quantity,
              "quantityPerUser" => $filter->quantityPerUser,
              "customerUri" => $filter->customerUri,
              "productUris" => $filter->productUris,
              "noProduct" => $filter->noProduct,
              "productRestrictions" => $filter->productRestrictions,
              "dateRestrictions" => $filter->dateRestrictions,
              "toDate" => $filter->toDate,
              "toMe" => $filter->toMe,
              "createdAt" => $filter->createdAt,
              "updatedAt" => $filter->updatedAt,
              "offPeakHours" => $filter->offPeakHours,
              "toValidate" => $filter->toValidate,
              "availableFrom" => $filter->availableFrom,
              "availableUntil" => $filter->availableUntil,
            ]

      ]
        );

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            DiscountPaginatedResultOutputDto::class,
            'json'
        );
    }

    /**
     * Retrieves public discounts with filter.
     *
     * @param DiscountPublicFilterInputDto $filter The filter to apply to the discounts.
     * @throws SherlException If an error occurs while retrieving the discounts.
     * @return DiscountPaginatedResultOutputDto|null The paginated result of public discounts.
     */

    public function getPublicDiscountsWithFilter(DiscountPublicFilterInputDto $filter): ?DiscountPaginatedResultOutputDto
    {
        $response = $this->client->get(
            "/api/shop/advertisements/",
            [
            "headers" => [
              "Content-Type" => "application/json",
            ],
            RequestOptions::JSON => [
              "ownerUri" => $filter->ownerUri,
              "availableFrom" => $filter->availableFrom,
              "availableUntil" => $filter->availableUntil,
            ]

      ]
        );

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            DiscountPaginatedResultOutputDto::class,
            'json'
        );
    }

    /**
     * Validates a discount code for a given product.
     *
     * @param string $code The discount code to validate.
     * @param string $productUri The URI of the product to validate the discount code for.
     * @throws SherlException If there is an error validating the discount code.
     * @return bool Returns true if the discount code is valid, false if it is not valid.
     */
    public function validateDiscountCode(string $code, string $productUri): ?bool
    {
        $response = $this->client->post(
            "/api/shop/discounts/validate-code",
            [
            "headers" => [
              "Content-Type" => "application/json",
            ],
            RequestOptions::JSON => [
              "code" => $code,
              "productUri" => $productUri,
            ]
      ]
        );

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return filter_var($response->getBody()->getContents(), FILTER_VALIDATE_BOOLEAN);
    }

    // INVOICE

    /**
     * Sends a link to paid online for a given invoice ID.
     *
     * @param string $invoiceId The ID of the invoice.
     * @throws SherlException If an error occurs during the request.
     * @return OrderDto The updated OrderDto object.
     */
    public function sendLinkToPaidOnline(string $invoiceId): OrderDto
    {
        $response = $this->client->post(
            "/api/shop/invoices/$invoiceId/send-link-to-payed-online/",
            [
            "headers" => [
              "Content-Type" => "application/json",
            ],
      ]
        );

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            OrderDto::class,
            'json'
        );
    }

    // LOYALTY

    /**
     * Retrieves a loyalty card belonging to the current user.
     *
     * @param LoyaltyCardFindByDto $filter The filter to apply when searching for the loyalty card.
     * @throws SherlException If an error occurs during the request.
     * @return LoyaltySearchResultDto The loyalty card belonging to the current user..
     */
    public function getLoyaltiesCardToMe(LoyaltyCardFindByDto $filter): LoyaltySearchResultDto
    {
        $response = $this->client->get(
            "/api/shop/loyalties/to-me",
            [
            "headers" => [
              "Content-Type" => "application/json",
            ],
            RequestOptions::JSON => [
              "id" => $filter->id,
              "uri" => $filter->uri,
              "ownerUri" => $filter->ownerUri,
              "ownerUris" => $filter->ownerUris,
              "enabled" => $filter->enabled,
              "itemsPerPage" => $filter->itemsPerPage,
              "page" => $filter->page,

            ]

      ]
        );

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            LoyaltySearchResultDto::class,
            'json'
        );
    }

    /**
     * Retrieves the loyalty card for a given organization.
     *
     * @param string $organizationId The ID of the organization.
     * @throws SherlException If an error occurs during the API call.
     * @return LoyaltyCardDto The loyalty card DTO for the organization.
     */
    public function getOrganizationLoyaltyCard(string $organizationId): LoyaltyCardDto
    {
        $response = $this->client->get(
            "/api/shop/loyalties/organizations/$organizationId",
            [
            "headers" => [
              "Content-Type" => "application/json",
            ],
      ]
        );

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            LoyaltyCardDto::class,
            'json'
        );
    }

    /**
     * Updates a loyalty card.
     *
     * @param string $cardId The ID of the loyalty card to update.
     * @param ShopLoyaltyCardUpdateInputDto $updateInfo The updated information for the loyalty card.
     * @throws SherlException If an error occurs during the request.
     * @return LoyaltyCardDto The updated loyalty card.
     */
    public function updateLoyaltyCard(string $cardId, ShopLoyaltyCardUpdateInputDto $updateInfo): LoyaltyCardDto
    {
        $response = $this->client->get(
            "/api/shop/loyalties/$cardId",
            [
            "headers" => [
              "Content-Type" => "application/json",
            ],
            RequestOptions::JSON => [
              "amount" => $updateInfo->amount,
              "discountType" => $updateInfo->discountType,
              "percentage" => $updateInfo->percentage,
              "enabled" => $updateInfo->enabled
            ]

      ]
        );

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            LoyaltyCardDto::class,
            'json'
        );
    }

    // ORDER

    /**
     * Retrieves orders based on the provided filter.
     *
     * @param OrderFindInputDto $filter The filter to apply when retrieving orders.
     * @throws SherlException If an error occurs during the request.
     * @return OrderFindOutputDto The result of the operation.
     */
    public function getOrders(OrderFindInputDto $filter): OrderFindOutputDto
    {
        $response = $this->client->get(
            "/api/shop/orders",
            [
            "headers" => [
              "Content-Type" => "application/json",
            ],
            RequestOptions::JSON => [
              "id" => $filter->id,
              "type" => $filter->type,
              "q" => $filter->q,
              "date" => $filter->date,
              "dateRangeMin" => $filter->dateRangeMin,
              "dateRangeMax" => $filter->dateRangeMax,
              "scheduleDateRangeMin" => $filter->scheduleDateRangeMin,
              "scheduleDateRangeMax" => $filter->scheduleDateRangeMax,
              "orderNumber" => $filter->orderNumber,
              "orderStatus" => $filter->orderStatus,
              "orderStatusTab" => $filter->orderStatusTab,
              "customerId" => $filter->customerId,
              "customerName" => $filter->customerName,
              "meansOfPayment" => $filter->meansOfPayment,
              "serviceType" => $filter->serviceType,
              "amount" => $filter->amount,
              "filterByUsage" => $filter->filterByUsage,
              "sort" => $filter->sort,

            ]

      ]
        );

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            OrderDto::class,
            'json'
        );
    }


    /**
     * Retrieves a list of orders for a specific organization.
     *
     * @param string $organisationId The ID of the organization.
     * @param OrderFindInputDto $filter The filter to apply to the orders.
     * @throws SherlException If the request fails.
     * @return OrderFindOutputDto The list of orders that match the filter.
     */
    public function getOrganizationOrders(string $organisationId, OrderFindInputDto $filter): OrderFindOutputDto
    {
        $response = $this->client->get(
            "/api/shop/orders/list-to/$organisationId",
            [
            "headers" => [
              "Content-Type" => "application/json",
            ],
            RequestOptions::JSON => [
              "id" => $filter->id,
              "type" => $filter->type,
              "q" => $filter->q,
              "date" => $filter->date,
              "dateRangeMin" => $filter->dateRangeMin,
              "dateRangeMax" => $filter->dateRangeMax,
              "scheduleDateRangeMin" => $filter->scheduleDateRangeMin,
              "scheduleDateRangeMax" => $filter->scheduleDateRangeMax,
              "orderNumber" => $filter->orderNumber,
              "orderStatus" => $filter->orderStatus,
              "orderStatusTab" => $filter->orderStatusTab,
              "customerId" => $filter->customerId,
              "customerName" => $filter->customerName,
              "meansOfPayment" => $filter->meansOfPayment,
              "serviceType" => $filter->serviceType,
              "amount" => $filter->amount,
              "filterByUsage" => $filter->filterByUsage,
              "sort" => $filter->sort,
            ]

      ]
        );

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            OrderDto::class,
            'json'
        );
    }

    /**
     * Updates the status of an order.
     *
     * @param string $id The ID of the order.
     * @param OrderStatus $status The new status of the order.
     * @throws SherlException If the request to update the order status fails.
     * @return OrderFindOutputDto The updated order.
     */
    public function updateOrderStatus(string $id, OrderStatus $status): OrderFindOutputDto
    {
        $response = $this->client->get(
            "/api/shop/orders/$id/status/" . $status->value,
            [
            "headers" => [
              "Content-Type" => "application/json",
            ],

      ]
        );

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            OrderDto::class,
            'json'
        );
    }

    /**
     * Cancels an order.
     *
     * @param string $orderId The ID of the order to cancel.
     * @param CancelOrderInputDto $cancelOrderDates The cancellation details.
     * @throws SherlException If an error occurs during the request.
     * @return OrderDto The updated order object.
     */
    public function cancelOrder(string $orderId, CancelOrderInputDto $cancelOrderDates): OrderDto
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
        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            OrderDto::class,
            'json'
        );
    }

    /**
     * Retrieves an order by its ID.
     *
     * @param string $orderId The ID of the order to retrieve.
     * @throws SherlException If an error occurs during the request.
     * @return OrderDto The order object.
     */
    public function getOrder(string $orderId): OrderDto
    {
        $response = $this->client->get("/api/shop/orders/{$orderId}");

        if ($response->getStatusCode() != 200) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            OrderDto::class,
            'json'
        );
    }

    // PRODUCT

    /**
     * Adds a product category.
     *
     * @param ShopProductCategoryCreateInputDto $category The category to be added.
     * @throws SherlException If an error occurs during the request.
     * @return ProductCategoryDto The added category.
     */
    public function addCategoryOrganization(ShopProductCategoryCreateInputDto $category): ProductCategoryDto
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

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            ProductCategoryDto::class,
            'json'
        );
    }

    /**
     * Adds a comment on a product.
     *
     * @param AddCommentOnProductDto $productComment The product comment to be added.
     * @throws SherlException If the API request fails.
     * @return CommentDto The comment that was added.
     */
    public function addCommentOnProduct(AddCommentOnProductDto $productComment): CommentDto
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

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            CommentDto::class,
            'json'
        );
    }

    /**
     * Adds an option to a product.
     *
     * @param string $productId The ID of the product to add the option to.
     * @param mixed $option The option to add to the product.
     * @throws SherlException If an error occurs during the request.
     * @return ProductOutputDto The updated product with the added option.
     */
    public function addOptionToProduct(string $productId, mixed $option): ProductOutputDto
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

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            ProductOutputDto::class,
            'json'
        );
    }

    /**
     * Adds a like to a product.
     *
     * @param string $productId The ID of the product to like.
     * @throws SherlException If the HTTP request fails.
     * @return int The number of likes on the product.
     */
    public function addLikeToProduct(string $productId): int
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

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return filter_var($response->getBody()->getContents(), FILTER_VALIDATE_INT);
    }

    /**
     * Increments the number of views for a given product ID.
     *
     * @param string $productId The ID of the product.
     * @throws SherlException If the API request fails.
     * @return int The number of product views.
     */
    public function addProductViews(string $productId): int
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

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return filter_var($response->getBody()->getContents(), FILTER_VALIDATE_INT);
    }

    /**
     * Adds a subcategory to a category.
     *
     * @param string $categoryId The ID of the category.
     * @param ShopProductSubCategoryCreateInputDto $subCategory The subcategory to be added.
     * @throws SherlException If an error occurs during the request.
     * @return ProductCategoryDto The output category.
     */
    public function addSubCategoryToCategory(string $categoryId, ShopProductSubCategoryCreateInputDto $subCategory): ProductCategoryDto
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

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            ProductCategoryDto::class,
            'json'
        );
    }

    /**
     * Deletes a category by its ID.
     *
     * @param string $categoryId The ID of the category to delete.
     * @throws SherlException If an error occurs during the request.
     * @return ProductCategoryDto The deleted category.
     */
    public function deleteCategory(string $categoryId): ProductCategoryDto
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

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            ProductCategoryDto::class,
            'json'
        );
    }

    /**
     * Removes a product option.
     *
     * @param string $productId The ID of the product.
     * @param string $optionId The ID of the option.
     * @throws SherlException If an error occurs during the request.
     * @return ProductOutputDto The updated product.
     */
    public function removeProductOption(string $productId, string $optionId): ProductOutputDto
    {
        $response = $this->client->delete(
            "/api/shop/products/$productId/options/$optionId",
            [
            "headers" => [
              "Content-Type" => "application/json",
            ],
            RequestOptions::QUERY => [
              "categoryId" => $productId,
              "optionId" => $optionId
            ]
      ]
        );

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            ProductOutputDto::class,
            'json'
        );
    }


    /**
     * Updates a category.
     *
     * @param string $categoryId The ID of the category to update.
     * @param ShopProductCategoryCreateInputDto $updatedCategory The updated category data.
     * @throws SherlException If an error occurs while updating the category.
     * @return ProductCategoryDto The updated category.
     */
    public function updateCategory(string $categoryId, ShopProductCategoryCreateInputDto $updatedCategory): ProductCategoryDto
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

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            ProductCategoryDto::class,
            'json'
        );
    }

    /**
     * Retrieves the categories of shop products based on the provided filters.
     *
     * @param ShopProductCategoryFindByQueryDto $filters The filters to apply when searching for categories.
     * @throws SherlException If an error occurs during the request.+   * @return ProductCategoryDto The output DTO containing the categories.
     */
    public function getCategories(ShopProductCategoryFindByQueryDto $filter): ProductCategoryDto
    {
        $response = $this->client->get(
            "/api/shop/products/categories/all",
            [
            "headers" => [
              "Content-Type" => "application/json",
            ],
            RequestOptions::JSON => [
              "organizationId" => $filter->organizationId,
              "depth" => $filter->depth,
            ]
      ]
        );

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            ProductCategoryDto::class,
            'json'
        );
    }

    /**
     * Retrieves a category by its ID.
     *
     * @param string $categoryId The ID of the category.
     * @throws SherlException If the API request fails.
     * @return ProductCategoryDto The category object.
     */
    public function getCategoryById(string $categoryId): ProductCategoryDto
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

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            ProductCategoryDto::class,
            'json'
        );
    }

    /**
     * Retrieves the categories for a given organization.
     *
     * @param string $organizationId The ID of the organization.
     * @throws SherlException If the API request fails.
     * @return ProductCategoryDto The categories for the organization.
     */
    public function getOrganizationCategories(string $organizationId): ProductCategoryDto
    {
        $response = $this->client->get(
            "/api/shop/products/categories",
            [
            "headers" => [
              "Content-Type" => "application/json",
            ],
            RequestOptions::QUERY => ["organizationId" => $organizationId]
      ]
        );

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            ProductCategoryDto::class,
            'json'
        );
    }

    /**
     * Retrieves the sub-categories of an organization's category.
     *
     * @param string $categoryId The ID of the category.
     * @throws SherlException If the API request fails.
     * @return ProductCategoryDto The sub-category found.
     */
    public function getOrganizationSubCategories(string $categoryId): ProductCategoryDto
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

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            ProductCategoryDto::class,
            'json'
        );
    }

    /**
     * Retrieves the comments for a specific product.
     *
     * @param string $productId The ID of the product.
     * @param FindProductCommentsInputDto $filters The filters to apply when retrieving the comments.
     * @throws SherlException If the API request fails.
     * @return ProductCommentsResult The pagianated result containing the comments for the product.
     */
    public function getProductComments(string $productId, FindProductCommentsInputDto $filters): ProductCommentsResult
    {
        $response = $this->client->get(
            "/api/shop/products/$productId/comments",
            [
            "headers" => [
              "Content-Type" => "application/json",
            ],
            RequestOptions::QUERY => ["productId" => $productId],
            RequestOptions::JSON => [
              "page" => $filters->page,
              "itemsPerPage" => $filters->itemsPerPage,
              "productId" => $filters->productId,
              "personId" => $filters->personId,
              "organizationUri" => $filters->organizationUri,
              "sort" => $filters->sort,
            ]
      ]
        );

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            ProductCommentsResult::class,
            'json'
        );
    }

    /**
     * Retrieves the number of likes for a given product.
     *
     * @param string $productId The ID of the product.
     * @throws SherlException If the API request fails.
     * @return int The number of likes for the product.
     */
    public function getProductLikes(string $productId): int
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

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return filter_var($response->getBody()->getContents(), FILTER_VALIDATE_INT);
    }

    /**
     * Retrieves the number of views for a specific product.
     *
     * @param string $productId The ID of the product.
     * @throws SherlException If the API request fails.
     * @return int The number of views for the product.
     */
    public function getProductViews(string $productId): int
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

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return filter_var($response->getBody()->getContents(), FILTER_VALIDATE_INT);
    }

    /**
     * Retrieves a product by its ID.
     *
     * @param string $productId The ID of the product to retrieve.
     * @throws SherlException If the API request fails.
     * @return ProductResponseDto The product found.
     */
    public function getProduct(string $productId): ProductResponseDto
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

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            ProductResponseDto::class,
            'json'
        );
    }

    /**
     * Retrieves a paginated list of products based on the given filters.
     *
     * @param ProductFindByDto $filters The filters to apply when searching for products.
     * @throws SherlException If the API request fails.
     * @return ProductPaginatedResultDto The paginated result containing the products that match the filters.
     */
    public function getProducts(ProductFindByDto $filters): ProductPaginatedResultDto
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

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            ProductPaginatedResultDto::class,
            'json'
        );
    }

    /**
     * Retrieves the public categories and subcategories based on the provided filters.
     *
     * @param PublicCategoryAndSubCategoryFindByDto $filters The filters to apply for retrieving the categories and subcategories.
     * @throws SherlException If the API request fails.
     * @return array Returns an array of PublicCategoryResponseDto objects representing the categories and subcategories.
     */
    public function getPublicCategoriesAndSub(PublicCategoryAndSubCategoryFindByDto $filters): array
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

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            'array<Sherl\Sdk\Shop\Category\Dto\PublicCategoryResponseDto>',
            'json'
        );
    }

    /**
     * Retrieves an array of public categories from the API.
     *
     * @throws SherlException if the API request fails
     * @return array An array of PublicCategoryResponseDto objects
     */
    public function getPublicCategories(): array
    {
        $response = $this->client->get(
            "/api/public/shop/products/categories",
            [
            "headers" => [
              "Content-Type" => "application/json",
            ],
      ]
        );

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            'array<\Sherel\Sdk\Shop\Category\Dto\PublicCategoryResponseDto>',
            'json'
        );
    }

    /**
     * Retrieves a public category by its slug.
     *
     * @param string $slug The slug of the category.
     * @throws SherlException If the API request fails.
     * @return PublicCategoryResponseDto The response DTO for the public category.
     */
    public function getPublicCategoryBySlug(string $slug): PublicCategoryResponseDto
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

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            PublicCategoryResponseDto::class,
            'json'
        );
    }

    /**
     * Retrieves a public product by its slug.
     *
     * @param string $slug The slug of the product.
     * @throws SherlException If the API request fails.
     * @return PublicProductResponseDto The response DTO of the product.
     */
    public function getPublicProductBySlug(string $slug): PublicProductResponseDto
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

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            PublicProductResponseDto::class,
            'json'
        );
    }

    /**
     * Retrieves a public product by its ID.
     *
     * @param string $id The ID of the product.
     * @throws SherlException If the API request fails.
     * @return PublicProductResponseDto The public product response DTO.
     */
    public function getPublicProduct(string $id): PublicProductResponseDto
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

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            PublicProductResponseDto::class,
            'json'
        );
    }

    /**
     * Retrieves public products with filters.
     *
     * @param ProductFindByDto $filters The filters to apply.
     * @throws SherlException If there is an error retrieving the products.
     * @return ProductPaginatedResultDto The paginated result of products.
     */
    public function getPublicProductsWithFilters(ProductFindByDto $filters): ProductPaginatedResultDto
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

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            ProductPaginatedResultDto::class,
            'json'
        );
    }

    /**
     * Retrieves public products based on the given filters.
     *
     * @param ProductFindByDto $filters The filters to apply when retrieving the products.
     * @throws SherlException If the API request fails.
     * @return ProductPaginatedResultDto The paginated result of the retrieved products.
     */
    public function getPublicProducts(ProductFindByDto $filters): ProductPaginatedResultDto
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

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            ProductPaginatedResultDto::class,
            'json'
        );
    }

    /**
     * Retrieves an array of unrestricted categories from the API.
     *
     * @return array Returns an array of unrestricted categories.
     */
    public function getUnrestrictedCategories(): array
    {
        $response = $this->client->get(
            "/api/shop/products/categories/public",
            [
            "headers" => [
              "Content-Type" => "application/json",
            ],
      ]
        );

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            'array<Sherl\Sdk\Shop\Category\ProductCategoryDto>',
            'json'
        );
    }

    // PAYMENT

    /**
     * Deletes a card.
     *
     * @param string $cardId The ID of the card to delete.
     * @throws SherlException If the API request fails.
     * @return PersonOutputDto The updated person data.
     */
    public function deleteCard(string $cardId): PersonOutputDto
    {
        $response = $this->client->delete("/api/shop/payments/card/{$cardId}");

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            PersonOutputDto::class,
            'json'
        );
    }
    /**
     * Requests credentials to add a credit card.
     *
     * @return CreditCardDto The credit card data.
     * @throws SherlException If there is an error in the API request.
     */
    public function requestCredentialsToAddCard(): CreditCardDto
    {
        $response = $this->client->post("/api/shop/payments/request-credentials-to-add-card");

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            CreditCardDto::class,
            'json'
        );
    }
    /**
     * Saves a card with the specified card ID and token.
     *
     * @param string $cardId The ID of the card to be saved.
     * @param string $token The token associated with the card.
     * @throws SherlException If there is an error while saving the card.
     * @return PersonOutputDto The updated person data.
     */
    public function saveCard(string $cardId, string $token): PersonOutputDto
    {
        $response = $this->client->post(
            "/api/shop/payments/card/{$cardId}/default",
            [
            RequestOptions::JSON => ['id' => $cardId, 'token' => $token]
      ]
        );

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            PersonOutputDto::class,
            'json'
        );
    }
    /**
     * Sets the default card for a person.
     *
     * @param string $cardId The ID of the card to set as default.
     * @throws SherlException If the API request fails.
     * @return PersonOutputDto The updated person information.
     */
    public function setDefaultCard(string $cardId): PersonOutputDto
    {
        $response = $this->client->post("/api/shop/payments/card/{$cardId}/default");

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            PersonOutputDto::class,
            'json'
        );
    }
    /**
     * Validates a credit card.
     *
     * @param string $cardId The ID of the credit card to be validated.
     * @throws SherlException If the API request fails.
     * @return CreditCardDto The validated CreditCardDto object.
     */
    public function validateCard(string $cardId): CreditCardDto
    {
        $response = $this->client->get("/api/shop/payments/validate-card/{$cardId}");

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            CreditCardDto::class,
            'json'
        );
    }
    // PAYOUT

    /**
     * Generates a payout by making a POST request to "/api/shop/generate-payout".
     *
     * @throws SherlException If the API request fails.
     * @return array An array of PayoutDto objects.
     */
    public function generatePayout(): array
    {
        $response = $this->client->post("/api/shop/generate-payout");

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            'array<Sherl\Sdk\Shop\Payout\Dto\PayoutDto>',
            'json'
        );
    }
    /**
     * Submit a payout and return the PayoutDto.
     *
     * @throws SherlException if the response status code is >= 400
     * @return PayoutDto The submitted PayoutDto.
     */
    public function submitPayout(): PayoutDto
    {
        $response = $this->client->post("/api/shop/submit-payout");

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            PayoutDto::class,
            'json'
        );
    }
    // PICTURE

    /**
     * Adds a picture to a product.
     *
     * @param string $productId The ID of the product.
     * @param string $mediaId The ID of the media.
     * @throws SherlException If the API request fails.
     * @return ProductResponseDto The updated product data.
     */
    public function addPictureToProduct(string $productId, string $mediaId): ProductResponseDto
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

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            ProductResponseDto::class,
            'json'
        );
    }
    /**
     * Removes a picture from a product.
     *
     * @param string $productId The ID of the product.
     * @param string $mediaId The ID of the picture to be removed.
     * @throws SherlException If the API request fails.
     * @return ProductResponseDto The updated product.
     */
    public function removePictureToProduct(string $productId, string $mediaId): ProductResponseDto
    {
        $response = $this->client->delete(
            "/api/shop/products/{$productId}/pictures/{$mediaId}"
        );

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            ProductResponseDto::class,
            'json'
        );
    }
    // SUBSCRIPTION

    /**
     * Cancels a subscription.
     *
     * @param string $subscriptionId The ID of the subscription to cancel.
     * @throws SherlException If the API request fails.
     * @return SubscriptionDto The subscription that was cancelled.
     */
    public function cancelSubscription(string $subscriptionId): SubscriptionDto
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

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            SubscriptionDto::class,
            'json'
        );
    }
    /**
     * Retrieves a subscription using the provided filters.
     *
     * @param SubscriptionFindOnByDto $filters The filters to apply when searching for a subscription.
     * @throws SherlException If an error occurs during the request.
     * @return SubscriptionDto The retrieved subscription.
     */
    public function getSubscriptionFindOneBy(SubscriptionFindOnByDto $filters): SubscriptionDto
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

        if ($response->getStatusCode() >= 400) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            SubscriptionDto::class,
            'json'
        );
    }
}
