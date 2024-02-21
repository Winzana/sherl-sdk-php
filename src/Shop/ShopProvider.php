<?php

namespace Sherl\Sdk\Shop;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

use Psr\Http\Message\ResponseInterface;
use Sherl\Sdk\Common\SerializerFactory;

// ERRORS MANAGEMENT
use Sherl\Sdk\Common\Error\SherlException;
use Sherl\Sdk\Common\Error\ErrorFactory;
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
            $response = $this->client->post("/api/shop/advertisements", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::JSON => $createAdvertisement
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                AdvertisementDto::class,
                'json'
            );
        } catch (\Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::CREATION_ADVERTISEMENT_FORBIDDEN);
                }
            }
            throw $this->errorFactory->create(ShopErr::CREATION_ADVERTISEMENT_FAILED);
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
        try {
            $response = $this->client->put("/api/shop/advertisements/$advertisementId", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::JSON => $updateAdvertisement,
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                AdvertisementDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::UPDATE_ADVERTISEMENT_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ShopErr::ADVERTISEMENT_NOT_FOUND);
                }
            }
            throw $this->errorFactory->create(ShopErr::UPDATE_ADVERTISEMENT_FAILED);
        }
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
        try {
            $response = $this->client->delete("/api/shop/advertisements/$advertisementId", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::QUERY => $advertisementId

            ]);
            return filter_var($response->getBody()->getContents(), FILTER_VALIDATE_BOOLEAN);
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::DELETE_ADVERTISEMENT_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ShopErr::ADVERTISEMENT_NOT_FOUND);
                }
            }
            throw $this->errorFactory->create(ShopErr::DELETE_ADVERTISEMENT_FAILED);
        }
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
        try {
            $response = $this->client->get("/api/shop/advertisements/$advertisementId", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::QUERY => $advertisementId

            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                AdvertisementDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::GET_ADVERTISEMENT_BY_ID_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ShopErr::ADVERTISEMENT_NOT_FOUND);
                }
            }
            throw $this->errorFactory->create(ShopErr::GET_ADVERTISEMENT_BY_ID_FAILED);
        }
    }

    /**
     * Retrieves advertisements based on the provided filter.
     *
     * @param FindAdvertisementInputDto $filters The filter to apply when retrieving advertisements.
     * @throws SherlException If there is an error retrieving the advertisements.
     * @return FindAdvertisementsOutputDto|null The retrieved advertisements.
     */
    public function getAdvertisements(FindAdvertisementInputDto $filters): ?FindAdvertisementsOutputDto
    {
        try {
            $response = $this->client->get("/api/shop/advertisements", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::QUERY => $filters
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                FindAdvertisementsOutputDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::GET_ADVERTISEMENTS_FORBIDDEN);
                }
            }
            throw $this->errorFactory->create(ShopErr::GET_ADVERTISEMENTS_FAILED);
        }
    }

    /**
     * Retrieves public advertisements based on the given filters.
     *
     * @param FindAdvertisementInputDto $filters The filter to apply when retrieving advertisements.
     * @throws SherlException If there is an error retrieving the advertisements.
     * @return FindAdvertisementsOutputDto|null The output DTO containing the retrieved advertisements.
     */
    public function getPublicAdvertisements(FindAdvertisementInputDto $filters): ?FindAdvertisementsOutputDto
    {
        try {
            $response = $this->client->get("/api/public/shop/advertisements", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::QUERY => $filters
            ]);


            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                FindAdvertisementsOutputDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::GET_PUBLIC_ADVERTISEMENTS_FORBIDDEN);
                }
            }
            throw $this->errorFactory->create(ShopErr::GET_PUBLIC_ADVERTISEMENTS_FAILED);
        }
    }


    // BASKET

    /**
     * Adds a product to the basket.
     *
     * @param AddProductInputDto $productToAdd The product to add to the basket.
     * @throws SherlException If an error occurs during the request.
     * @return OrderDto|null The updated Order.
     */
    public function addProductToBasket(AddProductInputDto $productToAdd): ?OrderDto
    {
        try {
            $response = $this->client->post("/api/public/shop/advertisements", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::JSON => $productToAdd
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                OrderDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::BASKET_ADD_FORBIDDEN);
                }
            }
            throw $this->errorFactory->create(ShopErr::BASKET_ADD_FAILED);
        }
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
        try {
            $response = $this->client->post("/api/shop/baskets/clear", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::JSON => $customerId

            ]);
            return filter_var($response->getBody()->getContents(), FILTER_VALIDATE_BOOLEAN);
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::BASKET_CLEAR_FORBIDDEN);
                }
            }
            throw $this->errorFactory->create(ShopErr::BASKET_CLEAR_FAILED);
        }
    }

    /**
     * Adds a comment to the basket.
     *
     * @param string $comment The comment to be added to the basket.
     * @throws SherlException If an error occurs during the request.
     * @return OrderDto|null The associated OrderDto object updated.
     */
    public function addCommentToBasket(string $comment): ?OrderDto
    {
        try {
            $response = $this->client->post("/api/shop/baskets/comment", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::JSON => $comment

            ]);
            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                OrderDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::BASKET_COMMENT_FORBIDDEN);
                }
            }
            throw $this->errorFactory->create(ShopErr::BASKET_COMMENT_FAILED);
        }
    }

    // TODO: not in SDK JS
    /**
     * Retrieves the customer basket.
     *
     * @param string $customerUri The URI of the customer.
     * @throws SherlException If an error occurs during the request.
     * @return OrderDto|null The associated OrderDto object.
     */
    public function getCustomerBasket(string $customerUri): ?OrderDto
    {
        try {
            $response = $this->client->get("/api/shop/baskets", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::QUERY =>  $customerUri

            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                OrderDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::GET_BASKET_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ShopErr::CUSTOMER_NOT_FOUND);
                }
            }
            throw $this->errorFactory->create(ShopErr::BASKET_COMMENT_FAILED);
        }
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
        try {
            $response = $this->client->delete("/api/shop/baskets/remove/$itemId", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
            ]);
            return filter_var($response->getBody()->getContents(), FILTER_VALIDATE_BOOLEAN);
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::BASKET_REMOVE_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ShopErr::PRODUCT_NOT_FOUND);
                }
            }
            throw $this->errorFactory->create(ShopErr::BASKET_REMOVE_FAILED);
        }
    }

    /**
     * Add a discount code to the basket.
     *
     * @param string $code The discount code to add.
     * @throws SherlException If an error occurs during the request.
     * @return OrderDto|null The updated order object.
     */
    public function addDiscountCodeToBasket(string $code): ?OrderDto
    {
        try {
            $response = $this->client->post("/api/shop/baskets/set-discount-code", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::JSON =>  $code
            ]);
            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                OrderDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::BASKET_DISCOUNT_CODE_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ShopErr::CODE_NOT_FOUND);
                }
            }
            throw $this->errorFactory->create(ShopErr::BASKET_DISCOUNT_CODE_FAILED);
        }
    }

    /**
     * Adds a sponsor code to the basket.
     *
     * @param string $code The sponsor code to add.
     * @throws SherlException If an error occurs during the request.
     * @return OrderDto|null The updated OrderDto object.
     */
    public function addSponsorCodeToBasket(string $code): ?OrderDto
    {
        try {
            $response = $this->client->post("/api/shop/baskets/set-sponsorship-code", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::JSON => $code
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                OrderDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::BASKET_SPONSOR_CODE_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ShopErr::SPONSOR_CODE_NOT_FOUND);
                }
            }
            throw $this->errorFactory->create(ShopErr::BASKET_SPONSOR_CODE_FAILED);
        }
    }

    /**
     * Validates and pays the shop basket.
     *
     * @param ShopBasketValidateAndPayInputDto $validation the input data for validation and payment
     * @throws SherlException If an error occurs during the request.
     * @return OrderDto|null the updated order object.
     */
    public function validateAndPayBasket(ShopBasketValidateAndPayInputDto $validation): ?OrderDto
    {
        try {
            $response = $this->client->post("/api/shop/baskets/validate-and-pay", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::QUERY => $validation
            ]);
            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                OrderDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::VALIDATE_AND_PAY_BASKET_FORBIDDEN);
                    case 460:
                        throw $this->errorFactory->create(ShopErr::NO_DEFAULT_CARD);
                    case 461:
                        throw $this->errorFactory->create(ShopErr::BASKET_ORDER_NOT_VALIDATED);
                    case 462:
                        throw $this->errorFactory->create(ShopErr::BASKET_ALREADY_PAYED);
                }
            }
            throw $this->errorFactory->create(ShopErr::VALIDATE_AND_PAY_BASKET_FAILED);
        }
    }

    /**
     * Validates the payment basket using the provided input data.
     *
     * @param ShopBasketValidatePaymentInputDto $validation The input data for validating the payment basket.
     * @throws SherlException If an error occurs during the request.
     * @return OrderDto|null The order data after the payment basket is validated.
     */
    public function validatePaymentBasket(ShopBasketValidatePaymentInputDto $validation): ?OrderDto
    {
        try {
            $response = $this->client->post("/api/shop/baskets/validate-and-pay", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::JSON => $validation
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                OrderDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::BASKET_VALIDATE_PENDING_FORBIDDEN);
                }
            }
            throw $this->errorFactory->create(ShopErr::BASKET_VALIDATE_PENDING_FAILED);
        }
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
        try {
            $response = $this->client->post("/api/shop/discounts", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::JSON => $discountParameter
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                DiscountDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::CREATE_DISCOUNT_FORBIDDEN);
                }
            }
            throw $this->errorFactory->create(ShopErr::CREATE_DISCOUNT_FAILED);
        }
    }

    /**
     * Updates a discount.
     *
     * @param string $discountId The ID of the discount to update.
     * @param DiscountParameterDto $discountParameter The parameters for the discount.
     * @throws SherlException If an error occurs during the request.
     * @return DiscountDto|null The updated discount.
     */
    public function updateDiscount(string $discountId, DiscountParameterDto $discountParameter): ?DiscountDto
    {
        try {
            $response = $this->client->put("/api/shop/discounts/$discountId", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::JSON => $discountParameter
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                DiscountDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::UPDATE_DISCOUNT_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ShopErr::DISCOUNT_NOT_FOUND);
                }
                throw $this->errorFactory->create(ShopErr::UPDATE_DISCOUNT_FAILED);
            }
        }
        return null;
    }

    /**
     * Deletes a discount by its ID.
     *
     * @param string $discountId The ID of the discount to delete.
     * @throws SherlException If an error occurs during the request.
     * @return DiscountDto|null The deleted discount.
     */
    public function deleteDiscount(string $discountId): ?DiscountDto
    {
        try {
            $response = $this->client->delete("/api/shop/discounts/$discountId", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
            ]);
            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                DiscountDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::DELETE_DISCOUNT_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ShopErr::DISCOUNT_NOT_FOUND);
                }
                throw $this->errorFactory->create(ShopErr::DELETE_DISCOUNT_FAILED);
            }
        }
        return null;
    }

    /**
     * Finds a single discount by the given parameters.
     *
     * @param DiscountFilterInputDto $filters The filter parameters for the discount.
     * @throws SherlException If an error occurs during the request.
     * @return DiscountDto|null The output DTO representing the discount.
     */
    public function getDiscountByParams(DiscountFilterInputDto $filters): ?DiscountDto
    {
        try {
            $response = $this->client->get("/api/shop/advertisements", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::QUERY => $filters,
            ]);
            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                DiscountDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::GET_DISCOUNTS_BY_PARAMS_FORBIDDEN);
                }
                throw $this->errorFactory->create(ShopErr::GET_DISCOUNTS_BY_PARAMS_FAILED);
            }
        }
        return null;
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
        try {
            $response = $this->client->get("/api/shop/discounts/$discountId", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                DiscountDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::GET_DISCOUNT_BY_ID_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ShopErr::DISCOUNT_NOT_FOUND);
                }
                throw $this->errorFactory->create(ShopErr::GET_DISCOUNT_BY_ID_FAILED);
            }
        }
        return null;
    }

    /**
     * Retrieves a paginated list of discounts based on the provided filters.
     *
     * @param DiscountFilterInputDto $filters The filter to apply to the discounts.
     * @throws SherlException If an error occurs during the request.
     * @return DiscountPaginatedResultOutputDto|null The paginated list of discounts.
     */
    public function getDiscountsWithFilter(DiscountFilterInputDto $filters): ?DiscountPaginatedResultOutputDto
    {
        try {
            $response = $this->client->get("/api/shop/discounts", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::JSON => $filters
            ]);
            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                DiscountPaginatedResultOutputDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::GET_DISCOUNTS_FORBIDDEN);
                }
                throw $this->errorFactory->create(ShopErr::GET_DISCOUNTS_FAILED);
            }
        }
        return null;
    }

    /**
     * Retrieves public discounts with filters.
     *
     * @param DiscountPublicFilterInputDto $filters The filter to apply to the discounts.
     * @throws SherlException If an error occurs while retrieving the discounts.
     * @return DiscountPaginatedResultOutputDto|null The paginated result of public discounts.
     */

    public function getPublicDiscountsWithFilter(DiscountPublicFilterInputDto $filters): ?DiscountPaginatedResultOutputDto
    {
        try {
            $response = $this->client->get("/api/public/shop/discounts", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::QUERY => $filters
            ]);
            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                DiscountPaginatedResultOutputDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::GET_PUBLIC_DISCOUNTS_FORBIDDEN);
                }
                throw $this->errorFactory->create(ShopErr::GET_PUBLIC_DISCOUNTS_FAILED);
            }
        }
        return null;
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
        try {
            $response = $this->client->post("/api/shop/discounts/validate-code", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::JSON => [
                "code" => $code,
                "productUri" => $productUri,
              ]
            ]);
            return filter_var($response->getBody()->getContents(), FILTER_VALIDATE_BOOLEAN);
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::VALIDATE_DISCOUNT_CODE_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ShopErr::VALIDATE_DISCOUNT_CODE_FORBIDDEN);
                }
                throw $this->errorFactory->create(ShopErr::VALIDATE_DISCOUNT_CODE_FAILED);
            }
        }
        return null;
    }

    // INVOICE

    /**
     * Sends a link to paid online for a given invoice ID.
     *
     * @param string $invoiceId The ID of the invoice.
     * @throws SherlException If an error occurs during the request.
     * @return OrderDto|null The updated OrderDto object.
     */
    public function sendLinkToPaidOnline(string $invoiceId): ?OrderDto
    {
        try {
            $response = $this->client->post("/api/shop/invoices/$invoiceId/send-link-to-payed-online/", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
            ]);
            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                OrderDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::SEND_INVOICE_LINK_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ShopErr::INVOICE_ID_NOT_FOUND);
                }
                throw $this->errorFactory->create(ShopErr::SEND_INVOICE_LINK_FAILED);
            }
        }
        return null;
    }

    // LOYALTY

    /**
     * Retrieves a loyalty card belonging to the current user.
     *
     * @param LoyaltyCardFindByDto $filters The filter to apply when searching for the loyalty card.
     * @throws SherlException If an error occurs during the request.
     * @return LoyaltySearchResultDto|null The loyalty card belonging to the current user..
     */
    public function getLoyaltiesCardToMe(LoyaltyCardFindByDto $filters): ?LoyaltySearchResultDto
    {
        try {
            $response = $this->client->get("/api/shop/loyalties/to-me", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::QUERY => $filters
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                LoyaltySearchResultDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::GET_USER_CARD_LOYALTIES_FORBIDDEN);
                }
                throw $this->errorFactory->create(ShopErr::GET_USER_CARD_LOYALTIES_FAILED);
            }
        }
        return null;
    }

    /**
     * Retrieves the loyalty card for a given organization.
     *
     * @param string $organizationId The ID of the organization.
     * @throws SherlException If an error occurs during the API call.
     * @return LoyaltyCardDto|null The loyalty card DTO for the organization.
     */
    public function getOrganizationLoyaltyCard(string $organizationId): ?LoyaltyCardDto
    {
        try {
            $response = $this->client->get("/api/shop/loyalties/organizations/$organizationId", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                LoyaltyCardDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::GET_ORGANIZATION_LOYALTY_CARD_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ShopErr::ORGANIZATION_ID_NOT_FOUND);
                }
                throw $this->errorFactory->create(ShopErr::GET_ORGANIZATION_LOYALTY_CARD_FAILED);
            }
        }
        return null;
    }

    /**
     * Updates a loyalty card.
     *
     * @param string $cardId The ID of the loyalty card to update.
     * @param ShopLoyaltyCardUpdateInputDto $updateInfo The updated information for the loyalty card.
     * @throws SherlException If an error occurs during the request.
     * @return LoyaltyCardDto|null The updated loyalty card.
     */
    public function updateLoyaltyCard(string $cardId, ShopLoyaltyCardUpdateInputDto $updateInfo): ?LoyaltyCardDto
    {
        try {
            $response = $this->client->get("/api/shop/loyalties/$cardId", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::JSON => $updateInfo
            ]);
            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                LoyaltyCardDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::UPDATE_LOYALTY_CARD_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ShopErr::LOYALTY_CARD_NOT_FOUND);
                }
                throw $this->errorFactory->create(ShopErr::UPDATE_LOYALTY_CARD_FAILED);
            }
        }
        return null;
    }

    // ORDER

    /**
     * Retrieves orders based on the provided filters.
     *
     * @param OrderFindInputDto $filters The filter to apply when retrieving orders.
     * @throws SherlException If an error occurs during the request.
     * @return OrderFindOutputDto|null The result of the operation.
     */
    public function getOrders(OrderFindInputDto $filters): ?OrderFindOutputDto
    {
        try {
            $response = $this->client->get("/api/shop/orders", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::JSON => $filters
            ]);
            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                OrderFindOutputDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::GET_ORDERS_WITH_FILTER_FORBIDDEN);
                }
                throw $this->errorFactory->create(ShopErr::GET_ORDERS_WITH_FILTER_FAILED);
            }
        }
        return null;
    }


    /**
     * Retrieves a list of orders for a specific organization.
     *
     * @param string $organisationId The ID of the organization.
     * @param OrderFindInputDto $filters The filter to apply to the orders.
     * @throws SherlException If the request fails.
     * @return OrderFindOutputDto|null The list of orders that match the filters.
     */
    public function getOrganizationOrders(string $organisationId, OrderFindInputDto $filters): ?OrderFindOutputDto
    {
        try {
            $response = $this->client->get("/api/shop/orders/list-to/$organisationId", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::JSON => $filters,
            ]);
            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                OrderFindOutputDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::GET_ORGANIZATION_ORDERS_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ShopErr::ORGANIZATION_NOT_FOUND);
                }
                throw $this->errorFactory->create(ShopErr::GET_ORGANIZATION_ORDERS_FAILED);
            }
        }
        return null;
    }

    /**
     * Updates the status of an order.
     *
     * @param string $id The ID of the order.
     * @param OrderStatus $status The new status of the order.
     * @throws SherlException If the request to update the order status fails.
     * @return OrderFindOutputDto|null The updated order.
     */
    public function updateOrderStatus(string $id, OrderStatus $status): ?OrderFindOutputDto
    {
        try {
            $status = $status->value;
            $response = $this->client->put("/api/shop/orders/$id/status/$status", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                OrderFindOutputDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 400:
                        throw $this->errorFactory->create(ShopErr::BAD_REQUEST);
                    case 401:
                        throw $this->errorFactory->create(ShopErr::NOT_ALLOWED);
                    case 403:
                        throw $this->errorFactory->create(ShopErr::UPDATE_ORDER_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ShopErr::ORDER_NOT_FOUND);
                    case 409:
                        throw $this->errorFactory->create(ShopErr::ALREADY_CHANGED);
                }
                throw $this->errorFactory->create(ShopErr::UPDATE_ORDER_FAILED);
            }
        }
        return null;
    }

    /**
     * Cancels an order.
     *
     * @param string $orderId The ID of the order to cancel.
     * @param CancelOrderInputDto $cancelOrderDates The cancellation details.
     * @throws SherlException If an error occurs during the request.
     * @return OrderDto|null The updated order object.
     */
    public function cancelOrder(string $orderId, CancelOrderInputDto $cancelOrderDates): ?OrderDto
    {
        try {
            $response = $this->client->post("/api/shop/orders/$orderId/cancel", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::JSON => $cancelOrderDates,
            ]);
            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                OrderDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 400:
                        throw $this->errorFactory->create(ShopErr::BAD_REQUEST);
                    case 401:
                        throw $this->errorFactory->create(ShopErr::NOT_ALLOWED);
                    case 403:
                        throw $this->errorFactory->create(ShopErr::CANCEL_ORDER_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ShopErr::ORDER_NOT_FOUND);
                    case 409:
                        throw $this->errorFactory->create(ShopErr::ALREADY_CHANGED);
                }
                throw $this->errorFactory->create(ShopErr::GET_ORGANIZATION_ORDERS_FAILED);
            }
        }
        return null;
    }

    /**
     * Retrieves an order by its ID.
     *
     * @param string $orderId The ID of the order to retrieve.
     * @throws SherlException If an error occurs during the request.
     * @return OrderDto|null The order object.
     */
    public function getOrder(string $orderId): ?OrderDto
    {
        try {
            $response = $this->client->get("/api/shop/orders/$orderId", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
            ]);
            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                OrderDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::GET_ORDER_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ShopErr::ORDER_NOT_FOUND);
                }
                throw $this->errorFactory->create(ShopErr::GET_ORDER_FAILED);
            }
        }
        return null;
    }

    // PRODUCT

    /**
     * Adds a product category.
     *
     * @param ShopProductCategoryCreateInputDto $category The category to be added.
     * @throws SherlException If an error occurs during the request.
     * @return ProductCategoryDto|null The added category.
     */
    public function addCategoryOrganization(ShopProductCategoryCreateInputDto $category): ?ProductCategoryDto
    {
        try {
            $response = $this->client->post("/api/shop/products/categories", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::JSON =>  $category
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ProductCategoryDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::ADD_CATEGORY_TO_ORGANIZATION_FORBIDDEN);
                }
                throw $this->errorFactory->create(ShopErr::ADD_CATEGORY_TO_ORGANIZATION_FAILED);
            }
        }
        return null;
    }

    /**
     * Adds a comment on a product.
     *
     * @param AddCommentOnProductDto $productComment The product comment to be added.
     * @throws SherlException If the API request fails.
     * @return CommentDto|null The comment that was added.
     */
    public function addCommentOnProduct(AddCommentOnProductDto $productComment): ?CommentDto
    {
        try {
            $response = $this->client->post("/api/shop/products/comments", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::JSON => $productComment
            ]);


            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                CommentDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::ADD_COMMENT_ON_PRODUCT_FORBIDDEN);
                }
                throw $this->errorFactory->create(ShopErr::ADD_COMMENT_ON_PRODUCT_FAILED);
            }
        }
        return null;
    }

    /**
     * Adds an option to a product.
     *
     * @param string $productId The ID of the product to add the option to.
     * @param mixed $option The option to add to the product.
     * @throws SherlException If an error occurs during the request.
     * @return ProductOutputDto|null The updated product with the added option.
     */
    public function addOptionToProduct(string $productId, mixed $option): ?ProductOutputDto
    {
        try {
            $response = $this->client->post("/api/shop/products/$productId/options", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::JSON => $option
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ProductOutputDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::ADD_OPTION_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ShopErr::PRODUCT_NOT_FOUND);
                }
                throw $this->errorFactory->create(ShopErr::ADD_OPTION_FAILED);
            }
        }
        return null;
    }

    /**
     * Adds a like to a product.
     *
     * @param string $productId The ID of the product to like.
     * @throws SherlException If the HTTP request fails.
     * @return int|null The number of likes on the product.
     */
    public function addLikeToProduct(string $productId): ?int
    {
        try {
            $response = $this->client->post("/api/shop/products/$productId/like", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
            ]);

            $likes = filter_var($response->getBody()->getContents(), FILTER_VALIDATE_INT);
            return ($likes !== false) ? $likes : null;
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::ADD_OPTION_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ShopErr::PRODUCT_NOT_FOUND);
                }
                throw $this->errorFactory->create(ShopErr::ADD_OPTION_FAILED);
            }
        }
        return null;
    }

    /**
     * Increments the number of views for a given product ID.
     *
     * @param string $productId The ID of the product.
     * @throws SherlException If the API request fails.
     * @return int|null The number of product views.
     */
    public function addProductViews(string $productId): ?int
    {
        try {
            $response = $this->client->post("/api/shop/products/$productId/views", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::QUERY => $productId
            ]);
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::ADD_PRODUCT_VIEWS_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ShopErr::PRODUCT_NOT_FOUND);
                }
                throw $this->errorFactory->create(ShopErr::ADD_PRODUCT_VIEWS_FAILED);
            }
        }
        return null;
    }

    /**
     * Adds a subcategory to a category.
     *
     * @param string $categoryId The ID of the category.
     * @param ShopProductSubCategoryCreateInputDto $subCategory The subcategory to be added.
     * @throws SherlException If an error occurs during the request.
     * @return ProductCategoryDto|null The output category.
     */
    public function addSubCategoryToCategory(string $categoryId, ShopProductSubCategoryCreateInputDto $subCategory): ?ProductCategoryDto
    {
        try {
            $response = $this->client->post("/api/shop/products/categories/$categoryId", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::JSON =>  $subCategory
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ProductCategoryDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::ADD_SUBCATEGORY_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ShopErr::CATEGORY_NOT_FOUND);
                }
                throw $this->errorFactory->create(ShopErr::ADD_SUBCATEGORY_FAILED);
            }
        }
        return null;
    }

    /**
     * Deletes a category by its ID.
     *
     * @param string $categoryId The ID of the category to delete.
     * @throws SherlException If an error occurs during the request.
     * @return ProductCategoryDto|null The deleted category.
     */
    public function deleteCategory(string $categoryId): ?ProductCategoryDto
    {
        try {
            $response = $this->client->delete("/api/shop/products/categories/$categoryId", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ProductCategoryDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::DELETE_CATEGORY_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ShopErr::CATEGORY_NOT_FOUND);
                }
                throw $this->errorFactory->create(ShopErr::DELETE_CATEGORY_FAILED);
            }
        }
        return null;
    }

    /**
     * Removes a product option.
     *
     * @param string $productId The ID of the product.
     * @param string $optionId The ID of the option.
     * @throws SherlException If an error occurs during the request.
     * @return ProductOutputDto|null The updated product.
     */
    public function removeProductOption(string $productId, string $optionId): ?ProductOutputDto
    {
        try {
            $response = $this->client->delete("/api/shop/products/$productId/options/$optionId", [
              "headers" => [
                "Content-Type" => "application/json",
              ]
            ]);


            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ProductOutputDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::REMOVE_OPTION_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ShopErr::OPTION_OR_PRODUCT_NOT_FOUND);
                }
                throw $this->errorFactory->create(ShopErr::REMOVE_OPTION_FAILED);
            }
        }
        return null;
    }


    /**
     * Updates a category.
     *
     * @param string $categoryId The ID of the category to update.
     * @param ShopProductCategoryCreateInputDto $updatedCategory The updated category data.
     * @throws SherlException If an error occurs while updating the category.
     * @return ProductCategoryDto|null The updated category.
     */
    public function updateCategory(string $categoryId, ShopProductCategoryCreateInputDto $updatedCategory): ?ProductCategoryDto
    {
        try {
            $response = $this->client->put("/api/shop/products/categories/$categoryId", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::JSON => $updatedCategory
            ]);


            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ProductCategoryDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::UPDATE_CATEGORY_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ShopErr::CATEGORY_NOT_FOUND);
                }
                throw $this->errorFactory->create(ShopErr::UPDATE_CATEGORY_FAILED);
            }
        }
        return null;
    }

    /**
     * Retrieves the categories of shop products based on the provided filters.
     *
     * @param ShopProductCategoryFindByQueryDto $filters The filters to apply when searching for categories.
     * @throws SherlException If an error occurs during the request.
     * @return ProductCategoryDto|null The output DTO containing the categories.
     */
    public function getCategories(ShopProductCategoryFindByQueryDto $filters): ?ProductCategoryDto
    {
        try {
            $response = $this->client->get("/api/shop/products/categories/all", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::QUERY => $filters
            ]);


            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ProductCategoryDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::GET_CATEGORIES_FORBIDDEN);
                }
                throw $this->errorFactory->create(ShopErr::GET_CATEGORIES_FAILED);
            }
        }
        return null;
    }

    /**
     * Retrieves a category by its ID.
     *
     * @param string $categoryId The ID of the category.
     * @throws SherlException If the API request fails.
     * @return ProductCategoryDto|null The category object.
     */
    public function getCategoryById(string $categoryId): ?ProductCategoryDto
    {
        try {
            $response = $this->client->get("/api/shop/products/categories/$categoryId", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ProductCategoryDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::GET_CATEGORY_BY_ID_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ShopErr::CATEGORY_NOT_FOUND);
                }
                throw $this->errorFactory->create(ShopErr::GET_CATEGORY_BY_ID_FAILED);
            }
        }
        return null;
    }

    /**
     * Retrieves the categories for a given organization.
     *
     * @param string $organizationId The ID of the organization.
     * @throws SherlException If the API request fails.
     * @return ProductCategoryDto|null The categories for the organization.
     */
    public function getOrganizationCategories(string $organizationId): ?ProductCategoryDto
    {
        try {
            $response = $this->client->get("/api/shop/products/categories", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::QUERY =>  $organizationId
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ProductCategoryDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::GET_ORGANIZATION_CATEGORIES_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ShopErr::ORGANIZATION_NOT_FOUND);
                }
                throw $this->errorFactory->create(ShopErr::GET_ORGANIZATION_CATEGORIES_FAILED);
            }
        }
        return null;
    }

    /**
     * Retrieves the sub-categories of an organization's category.
     *
     * @param string $categoryId The ID of the category.
     * @throws SherlException If the API request fails.
     * @return ProductCategoryDto|null The sub-category found.
     */
    public function getOrganizationSubCategories(string $categoryId): ?ProductCategoryDto
    {
        try {
            $response = $this->client->get("/api/shop/products/categories/$categoryId", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
            ]);


            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ProductCategoryDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::GET_ORGANIZATION_SUBCATEGORIES_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ShopErr::ORGANIZATION_NOT_FOUND);
                }
                throw $this->errorFactory->create(ShopErr::GET_ORGANIZATION_SUBCATEGORIES_FAILED);
            }
        }
        return null;
    }

    /**
     * Retrieves the comments for a specific product.
     *
     * @param string $productId The ID of the product.
     * @param FindProductCommentsInputDto $filters The filters to apply when retrieving the comments.
     * @throws SherlException If the API request fails.
     * @return ProductCommentsResult|null The pagianated result containing the comments for the product.
     */
    public function getProductComments(string $productId, FindProductCommentsInputDto $filters): ?ProductCommentsResult
    {
        try {
            $response = $this->client->get("/api/shop/products/$productId/comments", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::JSON => $filters
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ProductCommentsResult::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::GET_PRODUCT_COMMENTS_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ShopErr::PRODUCT_NOT_FOUND);
                }
            }
            throw $this->errorFactory->create(ShopErr::GET_PRODUCT_COMMENTS_FAILED);
        }
    }

    /**
     * Retrieves the number of likes for a given product.
     *
     * @param string $productId The ID of the product.
     * @throws SherlException If the API request fails.
     * @return int|null The number of likes for the product.
     */
    public function getProductLikes(string $productId): ?int
    {
        try {
            $response = $this->client->get("/api/shop/products/$productId/like", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
            ]);


            $likes = filter_var($response->getBody()->getContents(), FILTER_VALIDATE_INT);
            return ($likes !== false) ? $likes : null;
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::GET_PRODUCT_LIKES_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ShopErr::PRODUCT_NOT_FOUND);
                }
                throw $this->errorFactory->create(ShopErr::GET_PRODUCT_LIKES_FAILED);
            }
        }
        return null;
    }

    /**
     * Retrieves the number of views for a specific product.
     *
     * @param string $productId The ID of the product.
     * @throws SherlException If the API request fails.
     * @return int|null The number of views for the product.
     */
    public function getProductViews(string $productId): ?int
    {
        try {
            $response = $this->client->get("/api/shop/products/$productId/views", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
            ]);

            $views = filter_var($response->getBody()->getContents(), FILTER_VALIDATE_INT);
            return ($views !== false) ? $views : null;
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::GET_PRODUCT_VIEWS_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ShopErr::PRODUCT_NOT_FOUND);
                }
                throw $this->errorFactory->create(ShopErr::GET_PRODUCT_VIEWS_FAILED);
            }
        }
        return null;
    }

    /**
     * Retrieves a product by its ID.
     *
     * @param string $productId The ID of the product to retrieve.
     * @throws SherlException If the API request fails.
     * @return ProductResponseDto|null The product found.
     */
    public function getProduct(string $productId): ?ProductResponseDto
    {
        try {
            $response = $this->client->get("/api/shop/products/$productId", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
            ]);


            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ProductResponseDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::GET_PUBLIC_PRODUCT_BY_ID_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ShopErr::PRODUCT_NOT_FOUND);
                }
                throw $this->errorFactory->create(ShopErr::GET_PUBLIC_PRODUCT_BY_ID_FAILED);
            }
        }
        return null;
    }

    /**
     * Retrieves a paginated list of products based on the given filters.
     *
     * @param ProductFindByDto $filters The filters to apply when searching for products.
     * @throws SherlException If the API request fails.
     * @return ProductPaginatedResultDto|null The paginated result containing the products that match the filters.
     */
    public function getProducts(ProductFindByDto $filters): ?ProductPaginatedResultDto
    {
        try {
            $response = $this->client->get("/api/shop/products", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::JSON => $filters
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ProductPaginatedResultDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::GET_PRODUCTS_FORBIDDEN);
                }
                throw $this->errorFactory->create(ShopErr::GET_PRODUCTS_FAILED);
            }
        }
        return null;
    }

    /**
     * Retrieves the public categories and subcategories based on the provided filters.
     *
     * @param PublicCategoryAndSubCategoryFindByDto $filters The filters to apply for retrieving the categories and subcategories.
     * @throws SherlException If the API request fails.
     * @return PublicCategoryResponseDto|null Returns an PublicCategoryResponseDto of PublicCategoryResponseDto objects representing the categories and subcategories.
     */
    public function getPublicCategoriesAndSub(PublicCategoryAndSubCategoryFindByDto $filters): ?PublicCategoryResponseDto
    {
        try {
            $response = $this->client->get("/api/public/shop/products/categories-and-subcategories", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::JSON => $filters
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                PublicCategoryResponseDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::GET_PUBLIC_CATEGORIES_AND_SUBS_FORBIDDEN);
                }
                throw $this->errorFactory->create(ShopErr::GET_PUBLIC_CATEGORIES_AND_SUBS_FAILED);
            }
        }
        return null;
    }

    /**
     * Retrieves an array of public categories from the API.
     *
     * @throws SherlException if the API request fails
     * @return PublicCategoryResponseDto|null An PublicCategoryResponseDto of PublicCategoryResponseDto objects
     */
    public function getPublicCategories(): ?PublicCategoryResponseDto
    {
        try {
            $response = $this->client->get("/api/public/shop/products/categories", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                PublicCategoryResponseDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::GET_PUBLIC_CATEGORIES_FORBIDDEN);
                }
                throw $this->errorFactory->create(ShopErr::GET_PUBLIC_CATEGORIES_FAILED);
            }
        }
        return null;
    }

    /**
     * Retrieves a public category by its slug.
     *
     * @param string $slug The slug of the category.
     * @throws SherlException If the API request fails.
     * @return PublicCategoryResponseDto|null The response DTO for the public category.
     */
    public function getPublicCategoryBySlug(string $slug): ?PublicCategoryResponseDto
    {
        try {
            $response = $this->client->get("/api/public/shop/products/categories/find-one-by-slug/$slug", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                PublicCategoryResponseDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::GET_PUBLIC_CATEGORY_BY_SLUG_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ShopErr::SLUG_CATEGORY_NOT_FOUND);
                }
                throw $this->errorFactory->create(ShopErr::GET_PUBLIC_CATEGORY_BY_SLUG_FAILED);
            }
        }
        return null;
    }

    /**
     * Retrieves a public product by its slug.
     *
     * @param string $slug The slug of the product.
     * @throws SherlException If the API request fails.
     * @return PublicProductResponseDto|null The response DTO of the product.
     */
    public function getPublicProductBySlug(string $slug): ?PublicProductResponseDto
    {
        try {
            $response = $this->client->get("/api/public/shop/products/find-one-by-slug/$slug", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                PublicProductResponseDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::GET_PUBLIC_PRODUCT_BY_SLUG_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ShopErr::SLUG_PRODUCT_NOT_FOUND);
                }
                throw $this->errorFactory->create(ShopErr::GET_PUBLIC_PRODUCT_BY_SLUG_FAILED);
            }
        }
        return null;
    }

    /**
     * Retrieves a public product by its ID.
     *
     * @param string $id The ID of the product.
     * @throws SherlException If the API request fails.
     * @return PublicProductResponseDto|null The public product response DTO.
     */
    public function getPublicProduct(string $id): ?PublicProductResponseDto
    {
        try {
            $response = $this->client->get("/api/public/shop/products/$id", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
            ]);
            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                PublicProductResponseDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::GET_PUBLIC_PRODUCTS_WITH_FILTERS_FORBIDDEN);
                }
                throw $this->errorFactory->create(ShopErr::GET_PUBLIC_PRODUCTS_WITH_FILTERS_FAILED);
            }
            return null;
        }
    }

    /**
     * Retrieves public products with filters.
     *
     * @param ProductFindByDto $filters The filters to apply.
     * @throws SherlException If there is an error retrieving the products.
     * @return ProductPaginatedResultDto|null The paginated result of products.
     */
    public function getPublicProductsWithFilters(ProductFindByDto $filters): ?ProductPaginatedResultDto
    {
        try {
            $response = $this->client->get("/api/shop/products/public", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::QUERY => $filters
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ProductPaginatedResultDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::GET_PUBLIC_PRODUCTS_WITH_FILTERS_FORBIDDEN);
                }
                throw $this->errorFactory->create(ShopErr::GET_PUBLIC_PRODUCTS_WITH_FILTERS_FAILED);
            }
        }
        return null;
    }

    /**
     * Retrieves products based on the given filters.
     *
     * @param ProductFindByDto $filters The filters to apply when retrieving the products.
     * @throws SherlException If the API request fails.
     * @return ProductPaginatedResultDto|null The paginated result of the retrieved products.
     */
    public function getProductsWithFilters(ProductFindByDto $filters): ?ProductPaginatedResultDto
    {
        try {
            $response = $this->client->get("/api/public/shop/products", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::QUERY =>  $filters
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ProductPaginatedResultDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::GET_PRODUCTS_WITH_FILTERS_FORBIDDEN);
                }
                throw $this->errorFactory->create(ShopErr::GET_PRODUCTS_WITH_FILTERS_FAILED);
            }
        }
        return null;
    }

    /**
     * Retrieves an array of unrestricted categories from the API.
     *
     * @return PublicCategoryResponseDto|null Returns an PublicCategoryResponseDto of unrestricted categories.
     * @throws SherlException If the API request fails.
     */
    public function getUnrestrictedCategories(): ?PublicCategoryResponseDto
    {
        try {
            $response = $this->client->get("/api/shop/products/categories/public", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
            ]);
            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                PublicCategoryResponseDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::GET_UNRESTRICTED_CATEGORIES_FORBIDDEN);
                }
                throw $this->errorFactory->create(ShopErr::GET_UNRESTRICTED_CATEGORIES_FAILED);
            }
        }
        return null;
    }

    // PAYMENT

    /**
     * Deletes a card.
     *
     * @param string $cardId The ID of the card to delete.
     * @throws SherlException If the API request fails.
     * @return PersonOutputDto|null The updated person data.
     */
    public function deleteCard(string $cardId): ?PersonOutputDto
    {
        try {

            $response = $this->client->delete("/api/shop/payments/card/$cardId", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                PersonOutputDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::DELETE_CARD_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ShopErr::CARD_NOT_FOUND);
                }
                throw $this->errorFactory->create(ShopErr::DELETE_CARD_FAILED);
            }
        }
        return null;
    }
    /**
     * Requests credentials to add a credit card.
     *
     * @return CreditCardDto|null The credit card data.
     * @throws SherlException If there is an error in the API request.
     */
    public function requestCredentialsToAddCard(): ?CreditCardDto
    {
        try {
            $response = $this->client->post("/api/shop/payments/request-credentials-to-add-card", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
            ]);
            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                CreditCardDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::REQUEST_CREDENTIALS_CARD_FORBIDDEN);
                }
                throw $this->errorFactory->create(ShopErr::REQUEST_CREDENTIALS_CARD_FAILED);
            }
        }
        return null;
    }
    /**
     * Saves a card with the specified card ID and token.
     *
     * @param string $cardId The ID of the card to be saved.
     * @param string $token The token associated with the card.
     * @throws SherlException If there is an error while saving the card.
     * @return PersonOutputDto|null The updated person data.
     */
    public function saveCard(string $cardId, string $token): ?PersonOutputDto
    {
        try {
            $response = $this->client->post("/api/shop/payments/card/$cardId/default", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::JSON => $token
            ]);
            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                PersonOutputDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::SAVE_CARD_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ShopErr::CARD_NOT_FOUND);
                }
                throw $this->errorFactory->create(ShopErr::SAVE_CARD_FAILED);
            }
        }
        return null;
    }
    /**
     * Sets the default card for a person.
     *
     * @param string $cardId The ID of the card to set as default.
     * @throws SherlException If the API request fails.
     * @return PersonOutputDto|null The updated person information.
     */
    public function setDefaultCard(string $cardId): ?PersonOutputDto
    {
        try {
            $response = $this->client->post("/api/shop/payments/card/$cardId/default", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                PersonOutputDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::SET_DEFAULT_CARD_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ShopErr::CARD_NOT_FOUND);
                }
                throw $this->errorFactory->create(ShopErr::SET_DEFAULT_CARD_FAILED);
            }
        }
        return null;
    }

    /**
     * Validates a credit card.
     *
     * @param string $cardId The ID of the credit card to be validated.
     * @throws SherlException If the API request fails.
     * @return CreditCardDto|null The validated CreditCardDto object.
     */
    public function validateCard(string $cardId): ?CreditCardDto
    {
        try {
            $response = $this->client->get("/api/shop/payments/validate-card/$cardId", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                CreditCardDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::VALIDATE_CARD_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ShopErr::CARD_NOT_FOUND);
                }
                throw $this->errorFactory->create(ShopErr::VALIDATE_CARD_FAILED);
            }
        }
        return null;
    }
    // PAYOUT

    /**
     * Generates a payout by making a POST request to "/api/shop/generate-payout".
     *
     * @throws SherlException If the API request fails.
     * @return PayoutDto|null An array of PayoutDto objects.
     */
    public function generatePayout(): ?PayoutDto
    {
        try {
            $response = $this->client->post("/api/shop/generate-payout", [
              "headers" => [
                "Content-Type" => "application/json",
              ]
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                PayoutDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::GENERATE_PAYOUT_FORBIDDEN);
                }
                throw $this->errorFactory->create(ShopErr::GENERATE_PAYOUT_FAILED);
            }
        }
        return null;
    }
    /**
     * Submit a payout and return the PayoutDto.
     *
     * @throws SherlException if the response status code is >= 400
     * @return PayoutDto|null The submitted PayoutDto.
     */
    public function submitPayout(): ?PayoutDto
    {
        try {
            $response = $this->client->post("/api/shop/submit-payout", [
              "headers" => [
                "Content-Type" => "application/json",
              ]
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                PayoutDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::SUBMIT_PAYOUT_FORBIDDEN);
                }
                throw $this->errorFactory->create(ShopErr::SUBMIT_PAYOUT_FAILED);
            }
        }
        return null;
    }
    // PICTURE

    /**
     * Adds a picture to a product.
     *
     * @param string $productId The ID of the product.
     * @param string $mediaId The ID of the media.
     * @throws SherlException If the API request fails.
     * @return ProductResponseDto|null The updated product data.
     */
    public function addPictureToProduct(string $productId, string $mediaId): ?ProductResponseDto
    {
        try {
            $response = $this->client->post("/api/shop/products/$productId/pictures/$mediaId", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ProductResponseDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::ADD_PICTURE_PRODUCT_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ShopErr::PRODUCT_OR_MEDIA_NOT_FOUND);
                }
                throw $this->errorFactory->create(ShopErr::ADD_PICTURE_PRODUCT_FAILED);
            }
        }
        return null;
    }

    /**
     * Removes a picture from a product.
     *
     * @param string $productId The ID of the product.
     * @param string $mediaId The ID of the picture to be removed.
     * @throws SherlException If the API request fails.
     * @return ProductResponseDto|null The updated product.
     */
    public function removePictureToProduct(string $productId, string $mediaId): ?ProductResponseDto
    {
        try {
            $response = $this->client->delete("/api/shop/products/$productId/pictures/$mediaId", [
                "headers" => [
                    "Content-Type" => "application/json",
                  ],
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                ProductResponseDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::REMOVE_PICTURE_PRODUCT_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ShopErr::PRODUCT_OR_MEDIA_NOT_FOUND);
                }
                throw  $this->errorFactory->create(ShopErr::REMOVE_PICTURE_PRODUCT_FAILED);
            }
        }
        return null;
    }
    // SUBSCRIPTION

    /**
     * Cancels a subscription.
     *
     * @param string $subscriptionId The ID of the subscription to cancel.
     * @throws SherlException If the API request fails.
     * @return SubscriptionDto|null The subscription that was cancelled.
     */
    public function cancelSubscription(string $subscriptionId): ?SubscriptionDto
    {
        try {
            $response = $this->client->post("/api/shop/subscriptions/$subscriptionId/cancel", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                SubscriptionDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::CANCEL_SUBSCRIPTION_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(ShopErr::SUBSCRIPTION_NOT_FOUND);
                }
                throw $this->errorFactory->create(ShopErr::CANCEL_SUBSCRIPTION_FAILED);
            }
        }
        return null;
    }
    /**
     * Retrieves a subscription using the provided filters.
     *
     * @param SubscriptionFindOnByDto $filters The filters to apply when searching for a subscription.
     * @throws SherlException If an error occurs during the request.
     * @return SubscriptionDto|null The retrieved subscription.
     */
    public function getSubscriptionFindOneBy(SubscriptionFindOnByDto $filters): ?SubscriptionDto
    {
        try {
            $response = $this->client->get("/api/shop/subscriptions/find-one-by", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::JSON => $filters,
            ]);
            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                SubscriptionDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();
                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(ShopErr::FIND_ONE_SUBSCRIPTION_WITH_FILTER_FORBIDDEN);
                }
                throw $this->errorFactory->create(ShopErr::FIND_ONE_SUBSCRIPTION_WITH_FILTER_FAILED);
            }
        }
        return null;
    }
}
