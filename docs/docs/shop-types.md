---
id: shop-types
title: Shop types
---

### Wallet

## WalletOutputDto

|    Fields    |  Type  |       Description       |
| :----------: | :----: | :---------------------: |
|  **userId**  | string |  The user's unique ID.  |
| **walletId** | string | The wallet's unique ID. |

## RibDto

|   Fields   |  Type  |                  Description                  |
| :--------: | :----: | :-------------------------------------------: |
|  **iban**  | string | The International Bank Account Number (IBAN). |
|  **bic**   | string |        The Bank Identifier Code (BIC).        |
| **ibanId** | string |   Optional unique identifier for the IBAN.    |

## AddRibBodyDto

|  Fields  |  Type  |                  Description                  |
| :------: | :----: | :-------------------------------------------: |
| **iban** | string | The International Bank Account Number (IBAN). |
| **bic**  | string |        The Bank Identifier Code (BIC).        |

### Subscription

## SubscriptionFindOnByDto

|     Fields      |  Type   |                          Description                          |
| :-------------: | :-----: | :-----------------------------------------------------------: |
|     **id**      | string  |       Optional unique identifier for the subscription.        |
|     **uri**     | string  |               Optional URI of the subscription.               |
|    **name**     | string  |              Optional name of the subscription.               |
|  **ownerUri**   | string  |            Optional URI of the subscription owner.            |
| **consumerId**  | string  |    Optional consumer ID associated with the subscription.     |
| **actionFrom**  | string  |    Optional start date/time of the subscription activity.     |
| **activeUntil** | string  |     Optional end date/time of the subscription activity.      |
|  **activeFor**  | string  |    Optional duration for which the subscription is active.    |
|   **enabled**   | boolean | Optional flag indicating whether the subscription is enabled. |
|  **sourceUri**  | string  |           Optional source URI of the subscription.            |

## SubscriptionOutputDto

|     Fields      |                       Type                        |                     Description                      |
| :-------------: | :-----------------------------------------------: | :--------------------------------------------------: |
|     **id**      |                      string                       |       Unique identifier for the subscription.        |
|     **uri**     |                      string                       |               URI of the subscription.               |
|    **name**     |                      string                       |              Name of the subscription.               |
|  **ownerUri**   |                      string                       |            URI of the subscription owner.            |
| **consumerId**  |                      string                       |    Consumer ID associated with the subscription.     |
| **activeFrom**  |                       Date                        |  Optional start date of the subscription activity.   |
| **activeUntil** |                       Date                        |   Optional end date of the subscription activity.    |
|  **frequency**  |     [OfferFrequencyEnum](#OfferFrequencyEnum)     |    Optional frequency of the subscription offer.     |
|   **status**    | [SubscriptionStatusEnum](#SubscriptionStatusEnum) |         Optional status of the subscription.         |
|   **enabled**   |                      boolean                      | Flag indicating whether the subscription is enabled. |
| **disabledAt**  |                       Date                        |       Date when the subscription was disabled.       |
|  **sourceUri**  |                      string                       |           Source URI of the subscription.            |
|    **offer**    |               [OfferDto](#OfferDto)               |   Optional offer associated with the subscription.   |
| **contextUri**  |                      string                       |           Context URI of the subscription.           |
|  **metadatas**  |               array<string, mixed>                |      Metadata associated with the subscription.      |
|  **createdAt**  |                       Date                        |          Creation date of the subscription.          |

## SubscriptionStatus

| Key      | Value | Description                                |
| :------- | :---: | :----------------------------------------- |
| NEW      |   0   | Status of new subscription                 |
| ACTIVE   |  100  | Status when subscription has been active   |
| FINISHED |  200  | Status when subscription has been finished |
| ERROR    |  300  | Status when subscription is error          |

### Payout

## PayoutDto

|       Fields        |         Type          |                       Description                        |
| :-----------------: | :-------------------: | :------------------------------------------------------: |
|       **id**        |        string         |            Unique identifier for the payout.             |
|       **uri**       |        string         |                    URI of the payout.                    |
|   **consumerId**    |        string         |         Consumer ID associated with the payout.          |
| **organizationUri** |        string         |      URI of the organization related to the payout.      |
|    **orderUris**    |       string[]        |        Array of order URIs related to the payout.        |
|     **amount**      |         float         |               Total amount of the payout.                |
|    **payoutId**     |        string         |        Unique identifier for the payout process.         |
|    **AuthorId**     |        string         |            Author's ID related to the payout.            |
|     **UserId**      |        string         |          User's ID associated with the payout.           |
|  **BankAccountId**  |        string         |             Bank account ID for the payout.              |
| **DebitedWalletId** |        string         |             ID of the wallet being debited.              |
|   **BankWireRef**   |        string         |                   Bank wire reference.                   |
|     **Status**      |        string         |              Optional status of the payout.              |
|      **Type**       |        string         |               Optional type of the payout.               |
|     **Nature**      |        string         |              Optional nature of the payout.              |
|   **PaymentType**   |        string         |              Optional type of the payment.               |
|  **ResultMessage**  |        string         |        Optional message about the payout result.         |
|  **DebitedFunds**   | [MoneyDto](#MoneyDto) | Object containing currency and amount of debited funds.  |
|      **Fees**       | [MoneyDto](#MoneyDto) |      Object containing currency and amount of fees.      |
|  **CreditedFunds**  | [MoneyDto](#MoneyDto) | Object containing currency and amount of credited funds. |
|    **createdAt**    |         Date          |          Optional creation date of the payout.           |
|    **updatedAt**    |         Date          |           Optional update date of the payout.            |

## MoneyDto

|    Fields    |  Type  |  Description   |
| :----------: | :----: | :------------: |
| **Currency** | string | currency funds |
|  **Amount**  | float  | Amount number  |

### Payment

## CreditCardDto

|         Fields          |  Type   |                       Description                        |
| :---------------------: | :-----: | :------------------------------------------------------: |
|         **Id**          | string  |          Unique identifier of the credit card.           |
|         **Tag**         | string  |          A tag associated with the credit card.          |
|    **CreationDate**     | integer |      Timestamp of when the credit card was created.      |
|       **UserId**        | string  | Identifier of the user associated with this credit card. |
|      **AccessKey**      | string  |             Access key for the credit card.              |
| **PreregistrationData** | string  |        Data used for preregistration of the card.        |
|  **RegistrationData**   | string  |         Data used for registration of the card.          |
|       **CardId**        | string  |                 Identifier of the card.                  |
|      **CardType**       | string  |                 Type of the credit card.                 |
| **CardRegistrationURL** | string  |                URL for card registration.                |
|     **ResultCode**      | string  |    Code indicating the result of the last operation.     |
|    **ResultMessage**    | string  |   Message describing the result of the last operation.   |
|      **Currency**       | string  |            Currency associated with the card.            |
|       **Status**        | string  |            Current status of the credit card.            |

### Product

## CategoryOutputDto

|       Fields        |                  Type                   |                        Description                        |
| :-----------------: | :-------------------------------------: | :-------------------------------------------------------: |
|       **id**        |                 string                  |            Unique identifier of the category.             |
|       **uri**       |                 string                  |                   URI of the category.                    |
|    **taxeValue**    |                  flat                   |          Tax value associated with the category.          |
|   **consumerId**    |                 string                  | Identifier of the consumer associated with this category. |
|    **parentUri**    |                 string                  |                URI of the parent category.                |
|      **name**       |                 string                  |                   Name of the category.                   |
| **organizationUri** |                 string                  |  URI of the organization associated with this category.   |
|    **createdAt**    |                 string                  |        Timestamp of when the category was created.        |
|    **updatedAt**    |                 string                  |     Timestamp of when the category was last updated.      |
|  **subCategories**  | [CategoryOutputDto](#CategoryOutputDto) |                  Array of subcategories.                  |

## ProductResponseDto

|       Fields        |             Type              |                       Description                       |
| :-----------------: | :---------------------------: | :-----------------------------------------------------: |
|    **isEnable**     |            boolean            |        Indicates whether the product is enabled.        |
|       **id**        |            string             |            Unique identifier of the product.            |
|       **uri**       |            string             |                   URI of the product.                   |
|   **consumerId**    |            string             | Identifier of the consumer associated with the product. |
|      **name**       |            string             |                  Name of the product.                   |
|     **slogan**      |            string             |                 Slogan of the product.                  |
|   **description**   |            string             |               Description of the product.               |
|   **categoryUri**   |            string             |             URI of the product's category.              |
|     **offers**      |     [OfferDto](#OfferDto)     |      Array of offers associated with the product.       |
|    **metadatas**    | [MetadatasDto](#MetadatasDto) |          Metadata associated with the product.          |
|     **options**     |    [OptionDto](#OptionDto)    |       Array of options available for the product.       |
| **organizationUri** |            string             |  URI of the organization associated with the product.   |
|    **createdAt**    |            string             |       Timestamp of when the product was created.        |
|    **updatedAt**    |            string             |     Timestamp of when the product was last updated.     |
|    **category**     |             null              |    Category of the product. (Currently set to null)     |

## MetadatasDto

|       Fields        |  Type  |                  Description                   |
| :-----------------: | :----: | :--------------------------------------------: |
| **degreeOfAlcohol** | string | Degree of alcohol associated with the product. |

## ItemDto

|        Fields        |  Type  |           Description            |
| :------------------: | :----: | :------------------------------: |
|       **name**       | string |        Name of the item.         |
| **priceTaxIncluded** | float  | Price of the item, tax included. |

## PublicProductResponseDto

|       Fields        |                          Type                           |                         Description                         |
| :-----------------: | :-----------------------------------------------------: | :---------------------------------------------------------: |
|       **id**        |                         string                          |              Unique identifier of the product.              |
|       **uri**       |                         string                          |                     URI of the product.                     |
|   **consumerId**    |                         string                          |   Identifier of the consumer associated with the product.   |
|      **type**       |           [ShopProductType](#ShopProductType)           |    Type of the product as defined in `ShopProductType`.     |
|    **parentUri**    |                         string                          |             URI of the parent product, if any.              |
|     **parent**      |  [PublicProductResponseDto](#PublicProductResponseDto)  | The parent product's public response object, if applicable. |
|      **name**       |                         string                          |                    Name of the product.                     |
|      **slug**       |                         string                          |     Slug used in a human-readable URL for the product.      |
|     **slogan**      |                         string                          |                   Slogan of the product.                    |
|   **description**   |                         string                          |                 Description of the product.                 |
|   **categoryUri**   |                         string                          |           URI of the product's primary category.            |
|  **categoryUris**   |                        string[]                         |         Array of URIs for the product's categories.         |
|    **category**     | [PublicCategoryResponseDto](#PublicCategoryResponseDto) |       The primary category's public response object.        |
|   **categories**    | [PublicCategoryResponseDto](#PublicCategoryResponseDto) |         Array of public category response objects.          |
|    **isEnable**     |                         boolean                         |          Indicates whether the product is enabled.          |
|     **offers**      |                  [OfferDto](#OfferDto)                  |        Array of offers associated with the product.         |
|    **metadatas**    |                          mixed                          |            Metadata associated with the product.            |
|     **options**     |                [OptionDto] (#OptionDto)                 |         Array of options available for the product.         |
| **organizationUri** |                         string                          |    URI of the organization associated with the product.     |
|    **isCustom**     |                         boolean                         |          Indicates whether the product is custom.           |
|     **photos**      |            [ImageObjectDto](#ImageObjectDto)            |     Array of image objects associated with the product.     |
|  **restrictions**   |                      array<string>                      |          Restrictions associated with the product.          |
|    **createdAt**    |                          Date                           |                Creation date of the product.                |
|    **updatedAt**    |                          Date                           |           Date when the product was last updated.           |

## ShopProductOptionCreateInputDto

|      Fields      |                                    Type                                     |                         Description                          |
| :--------------: | :-------------------------------------------------------------------------: | :----------------------------------------------------------: |
|      **id**      |                                   string                                    |          Unique identifier for the product option.           |
|     **name**     |                                   string                                    |                 Name of the product option.                  |
|    **items**     | [ShopProductOptionItemCreateInputDto](#ShopProductOptionItemCreateInputDto) |      Optional array of items under this product option.      |
|   **required**   |                                   boolean                                   |     Optional flag indicating if the option is required.      |
|   **rangeMin**   |                                    float                                    |         Minimum range value for the product option.          |
|   **enabled**    |                                   boolean                                   |      Optional flag indicating if the option is enabled.      |
| **translations** |     [ProductOptionItemTranslationDto](#ProductOptionItemTranslationDto)     |        Optional array of translations for the option.        |
|   **multiple**   |                                   boolean                                   | Optional flag indicating if multiple selections are allowed. |

## ShopProductOptionItemCreateInputDto

|        Fields        |  Type   |                 Description                  |
| :------------------: | :-----: | :------------------------------------------: |
|       **name**       | string  |       Name of the product option item.       |
| **priceTaxIncluded** |  float  |      Price of the item, including tax.       |
|     **enabled**      | boolean | Flag indicating whether the item is enabled. |

## OptionDto

|      Fields      |                                Type                                 |                    Description                     |
| :--------------: | :-----------------------------------------------------------------: | :------------------------------------------------: |
|      **id**      |                               string                                |         Unique identifier for the option.          |
|     **name**     |                               string                                |                Name of the option.                 |
|    **items**     |                   [OptionItemDto](#OptionItemDto)                   |     Optional array of items under this option.     |
|   **required**   |                               boolean                               |        Indicates if the option is required.        |
|   **multiple**   |                               boolean                               |   Indicates if multiple selections are allowed.    |
|   **rangeMin**   |                                float                                |        Minimum range value for the option.         |
|   **rangeMax**   |                                float                                |    Optional maximum range value for the option.    |
|   **enabled**    |                               boolean                               | Optional flag indicating if the option is enabled. |
| **translations** | [ProductOptionItemTranslationDto](#ProductOptionItemTranslationDto) |   Optional array of translations for the option.   |

## OptionItemDto

|        Fields        |                                Type                                 |                     Description                     |
| :------------------: | :-----------------------------------------------------------------: | :-------------------------------------------------: |
|       **name**       |                               string                                |              Name of the option item.               |
| **priceTaxIncluded** |                                float                                |          Price of the item, including tax.          |
|    **available**     |                               boolean                               |  Indicates if the item is available for selection.  |
|     **enabled**      |                               boolean                               |    Flag indicating whether the item is enabled.     |
|   **translations**   | [ProductOptionItemTranslationDto](#ProductOptionItemTranslationDto) | Optional array of translations for the option item. |

## ProductOptionItemTranslationDto

|  Fields  |  Type  |                  Description                  |
| :------: | :----: | :-------------------------------------------: |
| **lang** | string |      Language code for the translation.       |
| **name** | string | Optional translated name of the product item. |

## OfferDto

|        Fields        |                      Type                       |                   Description                   |
| :------------------: | :---------------------------------------------: | :---------------------------------------------: |
|  **priceDiscount**   |                      float                      |   Discount on the regular price of the offer.   |
|      **price**       |                      float                      |           Regular price of the offer.           |
| **priceTaxIncluded** |                      float                      |       Price of the offer, including tax.        |
|     **taxRate**      |                      float                      |         Tax rate applied to the offer.          |
|    **frequency**     | [ProductOfferFrequency](#ProductOfferFrequency) | Frequency of the offer (e.g., monthly, yearly). |

## ProductOfferFrequency

| Key     |   Value   | Description       |
| :------ | :-------: | :---------------- |
| ONCE    |  "once"   | Frequency once    |
| MONTHLY | "monthly" | Frequency monthly |
| YEARLY  | "yearly"  | Frequency yearly  |

## PublicCategoryResponseDto

|       Fields        |                          Type                           |                       Description                        |
| :-----------------: | :-----------------------------------------------------: | :------------------------------------------------------: |
|       **id**        |                         string                          |            Unique identifier of the category.            |
|       **uri**       |                         string                          |                   URI of the category.                   |
|   **consumerId**    |                         string                          | Identifier of the consumer associated with the category. |
|    **parentUri**    |                         string                          |               URI of the parent category.                |
|    **globalUri**    |                         string                          |               Global URI of the category.                |
|     **parent**      | [PublicCategoryResponseDto](#PublicCategoryResponseDto) |               Parent category information.               |
|      **color**      |                         string                          |           Color associated with the category.            |
|      **name**       |                         string                          |                  Name of the category.                   |
|      **slug**       |                         string                          |        Slug used for URL-friendly identification.        |
|    **taxeValue**    |                          float                          |         Tax value associated with the category.          |
|    **position**     |                         integer                         |            Position or order of the category.            |
| **organizationUri** |                         string                          |  URI of the organization associated with the category.   |
|  **subCategories**  | [PublicCategoryResponseDto](#PublicCategoryResponseDto) |                 Array of subcategories.                  |
|    **createdAt**    |                          Date                           |           Date when the category was created.            |
|    **updatedAt**    |                          Date                           |         Date when the category was last updated.         |
|   **aggCategory**   |                         string                          |             Aggregated category information.             |
|       **is**        |                         boolean                         |       Boolean field (purpose needs clarification).       |

## ShopProductType

|   Key   |   Value   | Description                                       |
| :-----: | :-------: | :------------------------------------------------ |
| CREDIT  | "CREDIT"  | Represents a credit-type product.                 |
| DEFAULT | "DEFAULT" | Default product type.                             |
|  ROOM   |  "ROOM"   | Represents a room-type product.                   |
|   TIP   |   "TIP"   | Represents a tip or gratuity-type product.        |
| SERVICE | "SERVICE" | Represents a service-type product.                |
|  PLAN   |  "PLAN"   | Represents a plan or subscription-type product.   |
|  QUOTA  |  "QUOTA"  | Represents a quota-type product.                  |
| REFUND  | "REFUND"  | Represents a refund or credit note-type product . |

## ProductFindByDto

|         Fields          |                   Type                    |                          Description                           |
| :---------------------: | :---------------------------------------: | :------------------------------------------------------------: |
|         **ids**         |                 string[]                  |             Optional array of product identifiers.             |
|     **externalIds**     |                 string[]                  |        Optional array of external product identifiers.         |
| **excludedExternalIds** |                 string[]                  |           Optional array of external IDs to exclude.           |
| **externalIdentifier**  |                  string                   |          Optional external identifier for a product.           |
|         **uri**         |                  string                   |                  Optional URI of the product.                  |
|    **versionNumber**    |                  integer                  |            Optional version number of the product.             |
|        **slug**         |                  string                   |                 Optional slug for the product.                 |
|      **parentUri**      |                  string                   |              Optional URI of the parent product.               |
|   **organizationUri**   |                  string                   | Optional URI of the organization associated with the product.  |
|  **organizationSlug**   |                  string                   | Optional slug of the organization associated with the product. |
|         **id**          |                  string                   |           Optional unique identifier of the product.           |
|        **name**         |                  string                   |                 Optional name of the product.                  |
|     **categoryUri**     |                  string                   |            Optional URI of the product's category.             |
|    **categoryUris**     |                 string[]                  |        Optional array of category URIs for the product.        |
|     **consumerId**      |                  string                   |       Optional consumer ID associated with the product.        |
|          **q**          |                  string                   |         Optional query string for searching products.          |
|      **isEnable**       |                  boolean                  |           Optional flag to filter enabled products.            |
|      **languages**      |                 string[]                  |    Optional array of languages associated with the product.    |
|    **placeForward**     |                  boolean                  |          Optional flag to indicate place forwarding.           |
| **strictPlaceForward**  |                  boolean                  |       Optional flag to indicate strict place forwarding.       |
|      **geopoint**       |                  string                   |                  Optional geolocation point.                   |
|      **distance**       |                   float                   |         Optional distance filter for product location.         |
|     **withinHours**     |                  boolean                  |  Optional filter for products available within certain hours.  |
|      **startDate**      |                  string                   |         Optional start date for product availability.          |
|       **endDate**       |                  string                   |          Optional end date for product availability.           |
|  **displayAllVersion**  |                  boolean                  |      Optional flag to display all versions of a product.       |
|   **includeDeleted**    |                  boolean                  |           Optional flag to include deleted products.           |
|  **isUpdatedByHuman**   |                  boolean                  |      Optional flag to filter products updated by humans.       |
|         **tag**         |        [ProductTags](#ProductTags)        |                     Optional product tag.                      |
|        **tags**         |                  integer                  |       Optional numeric tags associated with the product.       |
|     **displayMode**     | [ProductDisplayMode](#ProductDisplayMode) |             Optional display mode of the product.              |
|        **type**         |    [ProductTypeEnum](#ProductTypeEnum)    |                 Optional type of the product.                  |
|       **noBind**        |                  boolean                  |  Optional flag indicating if the product should not be bound.  |
|     **uriOfPanels**     |                 string[]                  | Optional array of URIs of panels associated with the product.  |
|        **panel**        |                  string                   |          Optional panel associated with the product.           |

## ProductTags

|        Key         |        Value         | Description            |
| :----------------: | :------------------: | :--------------------- |
|    BACK_OFFICE     |    "BACK_OFFICE"     | Tag back office.       |
| BACK_OFFICE_RESYNC | "BACK_OFFICE_RESYNC" | Tag back office resync |

## ProductDisplayMode

|   Key   |   Value   | Description   |
| :-----: | :-------: | :------------ |
| DEFAULT | "default" | Mode default. |
|  LIST   |  "list"   | Mode list.    |
|   MAP   |   "map"   | Mode map.     |

## ProductTypeEnum

|   Key   |   Value   |                   Description                    |
| :-----: | :-------: | :----------------------------------------------: |
| CREDIT  | "CREDIT"  |        Represents a credit-type product.         |
| DEFAULT | "DEFAULT" |        Default type for general products.        |
|  ROOM   |  "ROOM"   |   Represents a room or accommodation product.    |
|   TIP   |   "TIP"   |    Represents a tip or gratuity-type product.    |
| SERVICE | "SERVICE" |        Represents a service-type product.        |
|  PLAN   |  "PLAN"   | Represents a subscription or plan-type product.  |
|  QUOTA  |  "QUOTA"  |    Represents a quota or limit-type product.     |
| REFUND  | "REFUND"  | Represents a refund or credit note-type product. |
|  EVENT  |  "EVENT"  |        Represents an event-type product.         |

## PublicCategoryAndSubCategoryFindByDto

|        Fields        |  Type   |                             Description                             |
| :------------------: | :-----: | :-----------------------------------------------------------------: |
|        **q**         | string  |           Optional query string for searching categories.           |
| **organizationSlug** | string  |    Optional slug of the organization associated with categories.    |
|  **organizationId**  | string  | Optional identifier of the organization associated with categories. |
| **organizationUri**  | string  |    Optional URI of the organization associated with categories.     |
|      **depth**       | integer |       Optional depth for the category and subcategory search.       |

## ShopProductCategoryFindByQueryDto

|       Fields       |  Type   |                                   Description                                   |
| :----------------: | :-----: | :-----------------------------------------------------------------------------: |
| **organizationId** | string  | Optional identifier of the organization associated with the product categories. |
|     **depth**      | integer |         Optional depth for searching within product category hierarchy.         |

## AddCommentOnProductDto

|    Fields     |  Type  |                             Description                             |
| :-----------: | :----: | :-----------------------------------------------------------------: |
| **productId** | string | The unique identifier of the product to which the comment is added. |
|  **content**  | string |                     The content of the comment.                     |

## FindProductCommentsInputDto

|       Fields        |  Type  |                                Description                                |
| :-----------------: | :----: | :-----------------------------------------------------------------------: |
|    **productId**    | string | Optional identifier of the product for which comments are being searched. |
|    **personId**     | string |         Optional identifier of the person who made the comments.          |
| **organizationUri** | string |      Optional URI of the organization associated with the comments.       |
|      **sort**       | string |    Optional parameter to determine the sorting order of the comments.     |

## CommentDto

|       Fields        |  Type  |                          Description                          |
| :-----------------: | :----: | :-----------------------------------------------------------: |
|       **id**        | string |               Unique identifier of the comment.               |
|       **uri**       | string |                      URI of the comment.                      |
|   **consumerId**    | string |       Identifier of the consumer who made the comment.        |
|    **productId**    | string |  Optional identifier of the product related to the comment.   |
|    **personId**     | string |    Optional identifier of the person who made the comment.    |
|   **personName**    | string |       Optional name of the person who made the comment.       |
| **organizationUri** | string | Optional URI of the organization associated with the comment. |
|     **content**     | string |                    Content of the comment.                    |
|    **createdAt**    |  Date  |          Optional date when the comment was created.          |
|    **updatedAt**    |  Date  |       Optional date when the comment was last updated.        |

## ShopProductCategoryCreateInputDto

|    Fields     |        Type         |                     Description                     |
| :-----------: | :-----------------: | :-------------------------------------------------: |
|    **id**     |       string        |     Unique identifier for the product category.     |
| **globalUri** |       string        |    Optional global URI for the product category.    |
|   **name**    |       string        |       Optional name of the product category.        |
|   **color**   |       string        |    Optional color associated with the category.     |
| **taxeValue** |        float        |     Tax value applied to the product category.      |
| **position**  |       integer       |     Optional position or order of the category.     |
|    **seo**    | [ISEODto](#ISEODto) |     Optional SEO information for the category.      |
| **isPublic**  |       boolean       | Optional flag indicating if the category is public. |

## ISEODto

|     Fields      |     Type      |                 Description                 |
| :-------------: | :-----------: | :-----------------------------------------: |
|    **title**    |    string     |      Optional title for SEO purposes.       |
| **description** |    string     |   Optional description for SEO purposes.    |
|  **keywords**   |    string     |   Optional keywords for SEO optimization.   |
|   **others**    | array<string> | Optional other SEO-related key-value pairs. |

## ShopProductSubCategoryCreateInputDto

|    Fields     |        Type         |                                Description                                 |
| :-----------: | :-----------------: | :------------------------------------------------------------------------: |
|    **id**     |       string        |               Unique identifier for the product subcategory.               |
| **globalUri** |       string        |              Optional global URI for the product subcategory.              |
|   **color**   |       string        |              Optional color associated with the subcategory.               |
|   **name**    |       string        |                 Optional name of the product subcategory.                  |
|    **seo**    | [ISEODto](#ISEODto) | Optional SEO (Search Engine Optimization) information for the subcategory. |
| **position**  |       integer       |                   Position or order of the subcategory.                    |