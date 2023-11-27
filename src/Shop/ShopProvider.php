<?php

namespace Sherl\Sdk\Shop;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

use Psr\Http\Message\ResponseInterface;
use Sherl\Sdk\Common\Error\SherlException;
use Sherl\Sdk\Common\SerializerFactory;
use Sherl\Sdk\Order\Enum\OrderStatus;

use Sherl\Sdk\Person\Dto\PersonOutputDto;

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
use Sherl\Sdk\Shop\Loyalty\Dto\LoyaltySearchResultOutputDto;
use Sherl\Sdk\Shop\Loyalty\Dto\ShopLoyaltyCardUpdateInputDto;

use Sherl\Sdk\Shop\Order\Dto\ShopBasketValidateAndPayInputDto;
use Sherl\Sdk\Shop\Order\Dto\ShopBasketValidatePaymentInputDto;
use Sherl\Sdk\Shop\Order\Dto\CancelOrderInputDto;
use Sherl\Sdk\Order\Dto\OrderOutputDto;
use Sherl\Sdk\Shop\Order\Dto\OrderFindInputDto;
use Sherl\Sdk\Shop\Order\Dto\OrderFindOutputDto;

// PRODUCT

use Sherl\Sdk\Shop\Product\Dto\CommentDto;
use Sherl\Sdk\Shop\Product\Dto\ProductOutputDto;
use Sherl\Sdk\Shop\Product\Dto\ProductResponseDto;
use Sherl\Sdk\Shop\Product\Dto\FindProductCommentsInputDto;
use Sherl\Sdk\Shop\Product\Dto\ProductFindByDto;
use Sherl\Sdk\Shop\Product\Dto\PublicProductResponseDto;
use Sherl\Sdk\Shop\Product\Dto\ProductPaginatedResultDto;

// Categpory (Product)
use Sherl\Sdk\Shop\Category\Dto\CategoryOutputDto;
use Sherl\Sdk\Shop\Category\Dto\ShopProductCategoryCreateInputDto;
use Sherl\Sdk\Shop\Category\Dto\ShopProductSubCategoryCreateInputDto;
use Sherl\Sdk\Shop\Category\Dto\ShopProductCategoryFindByQueryDto;
use Sherl\Sdk\Shop\Category\Dto\PublicCategoryAndSubCategoryFindByDto;
use Sherl\Sdk\Shop\Category\Dto\PublicCategoryResponseDto;

use Sherl\Sdk\Shop\Product\Dto\AddCommentOnProductDto;

// SUBSCRIPTION
use Sherl\Sdk\Shop\Subscription\Dto\SubscriptionOutputDto;
use Sherl\Sdk\Shop\Subscription\Dto\SubscriptionFindOnByDto;

// PAYEMENT
use Sherl\Sdk\Shop\Payment\Dto\CreditCardDto;

// PAYOUT 
use Sherl\Sdk\Shop\Payout\Dto\PayoutDto;

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

  // Advertisements
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
          'metadatas' => $updateAdvertisement->metadatas
        ]
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

  public function addCommentToBasket(string $comment): OrderOutputDto
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
      OrderOutputDto::class,
      'json'
    );
  }

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

    if ($response->getStatusCode() >= 300) {
      return $this->throwSherlShopException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
      $response->getBody()->getContents(),
      OrderOutputDto::class,
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
      OrderOutputDto::class,
      'json'
    );
  }

  public function addDiscountCodeToBasket(string $code): OrderOutputDto
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
      OrderOutputDto::class,
      'json'
    );
  }

  public function addSponsorCodeToBasket(string $code): OrderOutputDto
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
      OrderOutputDto::class,
      'json'
    );
  }

  public function validateAndPayBasket(ShopBasketValidateAndPayInputDto $validation): OrderOutputDto
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
      OrderOutputDto::class,
      'json'
    );
  }

  public function validatePaymentBasket(ShopBasketValidatePaymentInputDto $validation): OrderOutputDto
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

    if ($response->getStatusCode() >= 300) {
      return $this->throwSherlShopException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
      $response->getBody()->getContents(),
      OrderOutputDto::class,
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

  public function updateDiscount(string $discountId, DiscountParameterDto $discountParameter): ?DiscountOutputDto
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
  public function sendLinkToPaidOnline(string $invoiceId): OrderOutputDto
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
      OrderOutputDto::class,
      'json'
    );
  }

  // Loyalty
  public function getLoyaltiesCardToMe(LoyaltyCardFindByDto $filter): ?LoyaltySearchResultOutputDto
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

    if ($response->getStatusCode() >= 300) {
      return $this->throwSherlShopException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
      $response->getBody()->getContents(),
      LoyaltySearchResultOutputDto::class,
      'json'
    );
  }

  public function getOrganizationLoyaltyCard(string $organizationId): ?LoyaltyCardDto
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

  // ORDER

  public function getOrders(OrderFindInputDto $filter): ?OrderFindOutputDto
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

    if ($response->getStatusCode() >= 300) {
      return $this->throwSherlShopException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
      $response->getBody()->getContents(),
      OrderOutputDto::class,
      'json'
    );
  }


  public function getOrganizationOrders(string $organisationId, OrderFindInputDto $filter): ?OrderFindOutputDto
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

    if ($response->getStatusCode() >= 300) {
      return $this->throwSherlShopException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
      $response->getBody()->getContents(),
      OrderOutputDto::class,
      'json'
    );
  }

  public function updateOrderStatus(string $id, OrderStatus $status): ?OrderFindOutputDto
  {
    $response = $this->client->get(
      "/api/shop/orders/$id/status/$status",
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
      OrderOutputDto::class,
      'json'
    );
  }
  // order
  public function cancelOrder(string $orderId, CancelOrderInputDto $cancelOrderDates): ?OrderOutputDto
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
      OrderOutputDto::class,
      'json'
    );
  }

  public function getOrder(string $orderId): ?OrderOutputDto
  {
    $response = $this->client->get("/api/shop/orders/{$orderId}");

    if ($response->getStatusCode() != 200) {
      return $this->throwSherlShopException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
      $response->getBody()->getContents(),
      OrderOutputDto::class,
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

  public function addLikeToProduct(string $productId): ?int
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

    return filter_var($response->getBody()->getContents(), FILTER_VALIDATE_INT);
  }

  public function addProductViews(string $productId): ?int
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

    return filter_var($response->getBody()->getContents(), FILTER_VALIDATE_INT);
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
          "categoryId" => $productId,
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

  public function getCategories(ShopProductCategoryFindByQueryDto $filters): ?CategoryOutputDto
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
        RequestOptions::QUERY => ["organizationId" => $organizationId]
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

  public function getProductLikes(string $productId): ?int
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

    return filter_var($response->getBody()->getContents(), FILTER_VALIDATE_INT);
  }

  public function getProductViews(string $productId): ?int
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

    return filter_var($response->getBody()->getContents(), FILTER_VALIDATE_INT);
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

  public function getPublicProductsWithFilters(ProductFindByDto $filters): ?ProductPaginatedResultDto // TODO: Pagination<ProductResponseDto>
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

  public function getPublicProducts(ProductFindByDto $filters): ?ProductPaginatedResultDto // TODO: Pagination<ProductResponseDto>
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

  //Payment
  public function deleteCard(string $cardId): ?PersonOutputDto
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
  public function saveCard(string $cardId, string $token): ?PersonOutputDto
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
  public function setDefaultCard(string $cardId): ?PersonOutputDto
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
