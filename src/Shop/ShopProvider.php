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

use Sherl\Sdk\Shop\Basket\Dto\AddProductInputDto;
use Sherl\Sdk\Shop\Discount\Dto\DiscountFilterInputDto;
use Sherl\Sdk\Shop\Discount\Dto\DiscountPublicFilterInputDto;
use Sherl\Sdk\Shop\Discount\Dto\DiscountOutputDto;
use Sherl\Sdk\Shop\Discount\Dto\DiscountParameterDto;
use Sherl\Sdk\Shop\Discount\Dto\DiscountPaginatedResultOutputDto;

use Sherl\Sdk\Shop\Loyalty\Dto\LoyaltyCardDto;
use Sherl\Sdk\Shop\Loyalty\Dto\LoyaltyCardFindByDto;
use Sherl\Sdk\Shop\Loyalty\Dto\OrderResponse;
use Sherl\Sdk\Shop\Loyalty\Dto\ShopBasketValidateAndPayInputDto;
use Sherl\Sdk\Shop\Loyalty\Dto\ShopBasketValidatePaymentInputDto;

use Sherl\Sdk\Shop\Loyalty\Dto\LoyaltySearchResultOutputDto;
use Sherl\Sdk\Shop\Loyalty\Dto\ShopLoyaltyCardUpdateInputDto;


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

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            FindAdvertisementsOutputDto::class,
            'json'
        );
    }

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

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlShopException($response);
        }

        return filter_var($response->getBody()->getContents(), FILTER_VALIDATE_BOOLEAN);

    }

    public function commentBasket(string $comment): bool
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

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
          $response->getBody()->getContents(),
          OrderResponse::class,
          'json'
      );
    }

    public function getBasket(string $customerUri): bool
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

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
          $response->getBody()->getContents(),
          OrderResponse::class,
          'json'
      );
    }

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

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
          $response->getBody()->getContents(),
          OrderResponse::class,
          'json'
      );
    }

    public function addDiscountCodeToBasket(string $code): bool
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

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
          $response->getBody()->getContents(),
          OrderResponse::class,
          'json'
      );
    }

    public function addSponsorCodeToBasket(string $code): bool
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

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
          $response->getBody()->getContents(),
          OrderResponse::class,
          'json'
      );
    }

    public function validateAndPayBasket(ShopBasketValidateAndPayInputDto $validation): bool
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

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
          $response->getBody()->getContents(),
          OrderResponse::class,
          'json'
      );
    }

    public function validatePaymentBasket(ShopBasketValidatePaymentInputDto $validation): bool
    {
        $response = $this->client->post(
            "/api/shop/baskets/validate-and-pay",
            [
            "headers" => [
              "Content-Type" => "application/json",
            ],

            RequestOptions::JSON => [
              'orderId' => $validation->orderId,
              'customerUri' => $validation->customerUri            ]
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

    // Discount
    public function createDiscount(DiscountParameterDto $discountParameter): ?DiscountOutputDto
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

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            DiscountOutputDto::class,
            'json'
        );
    }

    public function updateDiscount(string $discountId,  DiscountParameterDto $discountParameter): ?DiscountOutputDto
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

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            DiscountOutputDto::class,
            'json'
        );
    }

    public function deleteDiscount(string $discountId): ?DiscountOutputDto
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

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
          $response->getBody()->getContents(),
          DiscountOutputDto::class,
          'json'
      );
    }

    public function findOneDiscountByParams(DiscountFilterInputDto $filter): ?DiscountOutputDto
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

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            DiscountOutputDto::class,
            'json'
        );
    }

    public function getDiscountById(string $discountId): ?DiscountOutputDto
    {
        $response = $this->client->get(
            "/api/shop/discounts/$discountId",
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
            DiscountOutputDto::class,
            'json'
        );
    }

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

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlShopException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            DiscountPaginatedResultOutputDto::class,
            'json'
        );
}

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

    if ($response->getStatusCode() >= 300) {
        return $this->throwSherlShopException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
        $response->getBody()->getContents(),
        DiscountPaginatedResultOutputDto::class,
        'json'
    );
}

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

    if ($response->getStatusCode() >= 300) {
        return $this->throwSherlShopException($response);
    }

    return filter_var($response->getBody()->getContents(), FILTER_VALIDATE_BOOLEAN);
}

// Invoice
public function sendLinkToPaidOnline(string $invoiceId): bool
{
    $response = $this->client->post(
        "/api/shop/invoices/$invoiceId/send-link-to-payed-online/",
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
      OrderResponse::class,
      'json'
  );
}

// Loyalty
public function getLoyaltiesCardToMe(LoyaltyCardFindByDto $filter): ?LoyaltySearchResultOutputDto
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
                      "ownerUri" => $filter->ownerUri,
                      "owner" => $filter->owner,
                      "discountType" => $filter->discountType,
                      "percentage" => $filter->percentage,
                      "amount" => $filter->amount,
                      "amountUsed" => $filter->amountUsed,
                      "rewards" => $filter->rewards,
                      "enabled" => $filter->enabled,
                      "consumerId" => $filter->consumerId,
                      "createdAt" => $filter->createdAt,
                      "updatedAt" => $filter->updatedAt,
                    ]

  ]
    );

    if ($response->getStatusCode() >= 300) {
        return $this->throwSherlShopException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
        $response->getBody()->getContents(),
        LoyaltySearchResultOutputDto::class,
        'json'
    );
}

public function getOrganizationLoyaltyCard(STRING $organizationId): ?LoyaltyCardDto
{
    $response = $this->client->get(
        "/api/shop/loyalties/organizations/$organizationId",
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
        LoyaltyCardDto::class,
        'json'
    );
}
public function updateLoyaltyCard(string $cardId, ShopLoyaltyCardUpdateInputDto $updateInfo): ?LoyaltyCardDto
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

    if ($response->getStatusCode() >= 300) {
        return $this->throwSherlShopException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
        $response->getBody()->getContents(),
        LoyaltyCardDto::class,
        'json'
    );
}
}