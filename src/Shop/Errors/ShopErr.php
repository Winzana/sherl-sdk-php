<?php

namespace Sherl\Sdk\Shop\Errors;

class ShopErr
{
    // ADVERTISEMENT
    public const CREATION_FAILED = 'advertisement/creation-failed';
    public const CREATION_FAILED_FORBIDDEN = 'advertisement/creation-failed-forbidden';
    public const UPDATE_FAILED = 'advertisement/update-failed';
    public const UPDATE_FAILED_FORBIDDEN = 'advertisement/update-failed-forbidden';
    public const DELETE_FAILED = 'advertisement/delete-failed';
    public const DELETE_FAILED_FORBIDDEN = 'advertisement/delete-failed-forbidden';
    public const GET_ADVERTISEMENT_BY_ID_FAILED = 'advertisement/get-advertisement-by-id-failed';
    public const GET_ADVERTISEMENT_BY_ID_FAILED_FORBIDDEN = 'advertisement/get-advertisement-by-id-failed-forbidden';
    public const GET_ADVERTISEMENTS_FAILED = 'advertisement/get-advertisements-failed';
    public const GET_ADVERTISEMENTS_FAILED_FORBIDDEN = 'advertisement/get-advertisements-failed-forbidden';
    public const GET_PUBLIC_ADVERTISEMENTS_FAILED = 'advertisement/get-public-advertisements-failed';
    public const GET_PUBLIC_ADVERTISEMENTS_FAILED_FORBIDDEN = 'advertisement/get-public-advertisements-failed-forbidden';
    public const ADVERTISEMENT_NOT_FOUND = 'advertisement/not-found';

    // BASKET
    public const GET_BASKET_FAILED = 'basket/get-basket-failed';
    public const GET_BASKET_FAILED_FORBIDDEN = 'basket/get-basket-failed-forbidden';
    public const BASKET_ADD_FAILED = 'basket/basket-add-failed';
    public const BASKET_ADD_FAILED_FORBIDDEN = 'basket/add-failed-forbidden';
    public const BASKET_REMOVE_FAILED = 'basket/basket-remove-failed';
    public const BASKET_REMOVE_FAILED_FORBIDDEN = 'basket/remove-product-failed-forbidden';
    public const BASKET_CLEAR_FAILED = 'basket/basket-clear-failed';
    public const BASKET_CLEAR_FAILED_FORBIDDEN = 'basket/clear-failed-forbidden';
    public const BASKET_COMMENT_FAILED = 'basket/basket-comment-failed';
    public const BASKET_COMMENT_FAILED_FORBIDDEN = 'basket/basket-comment-failed-forbidden';
    public const VALIDATE_AND_PAY_BASKET_FAILED = 'basket/validate-and-pay-basket-failed';
    public const VALIDATE_AND_PAY_BASKET_FAILED_FORBIDDEN = 'basket/validate-and-pay-basket-failed-forbidden';
    public const BASKET_VALIDATE_PENDING_FAILED = 'basket/basket-validate-pending-failed';
    public const BASKET_VALIDATE_PENDING_FAILED_FORBIDDEN = 'basket/validate-pending-basket-failed-forbidden';
    public const BASKET_DISCOUNT_CODE_FAILED = 'basket/basket-discount-code-failed';
    public const BASKET_DISCOUNT_CODE_FAILED_FORBIDDEN = 'basket/apply-discount-code-failed-forbidden';
    public const BASKET_SPONSOR_CODE_FAILED = 'basket/apply-sponsor-discount-code-failed';
    public const BASKET_SPONSOR_CODE_FAILED_FORBIDDEN = 'basket/apply-sponsor-discount-code-failed-forbidden';
    public const BASKET_ALREADY_PAYED = 'basket/basket-already-payed';
    public const BASKET_ORDER_NOT_VALIDATED = 'basket/basket-order-not-validated';
    public const NO_DEFAULT_CARD = 'basket/no-default-card';
    public const CUSTOMER_NOT_FOUND = 'basket/customer-not-found';
    public const SPONSOR_CODE_NOT_FOUND = 'basket/sponsor-discount-code-not-found';
    public const CODE_NOT_FOUND = 'basket/discount-code-not-found';
    public const PRODUCT_NOT_FOUND = 'basket/product-not-found';

    // DISCOUNT
    public const CREATE_DISCOUNT_FAILED = 'discount/create-discount-failed';
    public const CREATE_DISCOUNT_FAILED_FORBIDDEN = 'discount/create-discount-failed-forbidden';
    public const DELETE_DISCOUNT_FAILED = 'discount/delete-discount-failed';
    public const DELETE_DISCOUNT_FAILED_FORBIDDEN = 'discount/delete-discount-failed-forbidden';
    public const GET_DISCOUNTS_BY_PARAMS_FAILED = 'discount/get-discount-by-params-failed';
    public const GET_DISCOUNTS_BY_PARAMS_FAILED_FORBIDDEN = 'discount/get-discount-by-params-failed-forbidden';
    public const GET_DISCOUNT_BY_ID_FAILED = 'discount/get-discount-by-id-failed';
    public const GET_DISCOUNT_BY_ID_FAILED_FORBIDDEN = 'discount/get-discount-by-id-failed-forbidden';
    public const GET_DISCOUNTS_FAILED = 'discount/get-dicounts-failed';
    public const GET_DISCOUNTS_FAILED_FORBIDDEN = 'discount/get-dicounts-failed-forbidden';
    public const GET_PUBLIC_DISCOUNTS_FAILED = 'discount/get-public-discount-failed';
    public const GET_PUBLIC_DISCOUNTS_FAILED_FORBIDDEN = 'discount/get-public-discount-failed-forbidden';
    public const UPDATE_DISCOUNT_FAILED = 'discount/update-discount-failed';
    public const UPDATE_DISCOUNT_FAILED_FORBIDDEN = 'discount/update-discount-failed-forbidden';
    public const VALIDATE_DISCOUNT_CODE_FAILED = 'discount/validate-discount-code-failed';
    public const VALIDATE_DISCOUNT_CODE_FAILED_FORBIDDEN = 'discount/validate-discount-code-failed-forbidden';
    public const DISCOUNT_NOT_FOUND = 'discount/not-found';
    public const DISCOUNT_CODE_NOT_FOUND = 'discount/code-not-found';

    // INVOICE
    public const SEND_INVOICE_LINK_FAILED = 'loyalty/send-failed';
    public const SEND_INVOICE_LINK_FAILED_FORBIDDEN = 'loyalty/send-failed-forbidden';
    public const INVOICE_ID_NOT_FOUND = 'loyalty/invoice-id-not-found';

    // LOYALTY
    public const GET_USER_CARD_LOYALTIES_FAILED = 'loyalty/get-user-card-loyalties-failed';
    public const GET_USER_CARD_LOYALTIES_FAILED_FORBIDDEN = 'loyalty/get-user-card-loyalties-failed-forbidden';
    public const UPDATE_LOYALTY_CARD_FAILED = 'loyalty/update-loyalty-card-failed';
    public const UPDATE_LOYALTY_CARD_FAILED_FORBIDDEN = 'loyalty/update-loyalty-card-failed-forbidden';
    public const GET_ORGANIZATION_LOYALTY_CARD_FAILED = 'loyalty/get-organization-loyalty-card-by-id-failed';
    public const GET_ORGANIZATION_LOYALTY_CARD_FAILED_FORBIDDEN = 'loyalty/get-organization-loyalty-card-by-id-failed-forbidden';
    public const ORGANIZATION_ID_NOT_FOUND = 'loyalty/organization-id-not-found';
    public const LOYALTY_CARD_NOT_FOUND = 'loyalty/loyalty-card-not-found';

    // ORDER
    public const CANCEL_ORDER_FAILED = 'order/cancel-order-failed';
    public const CANCEL_ORDER_FAILED_FORBIDDEN = 'order/cancel-order-failed-forbidden';
    public const GET_ORDER_FAILED = 'order/get-order-failed';
    public const GET_ORDER_FAILED_FORBIDDEN = 'order/get-order-failed-forbidden';
    public const GET_ORDERS_WITH_FILTER_FAILED = 'order/get-orders-with-filter-failed';
    public const GET_ORDERS_WITH_FILTER_FAILED_FORBIDDEN = 'order/get-orders-with-filter-failed-forbidden';
    public const GET_ORGANIZATION_ORDERS_FAILED = 'order/get-organization-orders-failed';
    public const GET_ORGANIZATION_ORDERS_FAILED_FORBIDDEN = 'order/get-organization-orders-failed-forbidden';
    public const UPDATE_ORDER_FAILED = 'order/update-order-failed';
    public const UPDATE_ORDER_FAILED_FORBIDDEN = 'order/update-order-failed-forbidden';
    public const ORDER_NOT_FOUND = 'order/order-not-found';
    public const ORGANIZATION_NOT_FOUND = 'order/organization-not-found';
    public const BAD_REQUEST = 'order/bad-request';
    public const NOT_ALLOWED = 'order/not-allowed';
    public const ALREADY_CHANGED = 'order/already-changed';

    // PAYMENT
    public const DELETE_CARD_FAILED = 'payment/delete-card-failed';
    public const DELETE_CARD_FAILED_FORBIDDEN = 'payment/delete-card-failed-forbidden';
    public const REQUEST_CREDENTIALS_CARD_FAILED = 'payment/request-credentials-failed';
    public const REQUEST_CREDENTIALS_CARD_FAILED_FORBIDDEN = 'payment/request-credentials-failed-forbidden';
    public const SAVE_CARD_FAILED = 'payment/save-card-failed';
    public const SAVE_CARD_FAILED_FORBIDDEN = 'payment/save-card-failed-forbidden';
    public const SET_DEFAULT_CARD_FAILED = 'payment/set-default-card-failed';
    public const SET_DEFAULT_CARD_FAILED_FORBIDDEN = 'payment/set-default-card-failed-forbidden';
    public const VALIDATE_CARD_FAILED = 'payment/validate-card-failed';
    public const VALIDATE_CARD_FAILED_FORBIDDEN = 'payment/validate-card-failed-forbidden';
    public const CARD_NOT_FOUND = 'payment/card-not-found';

    // PAYOUT
    public const GENERATE_PAYOUT_FAILED = 'payout/generate-payout-failed';
    public const GENERATE_PAYOUT_FAILED_FORBIDDEN = 'payout/generate-payout-failed-forbidden';
    public const SUBMIT_PAYOUT_FAILED = 'payout/submit-payout-failed';
    public const SUBMIT_PAYOUT_FAILED_FORBIDDEN = 'payout/submit-payout-failed-forbidden';

    // PICTURE
    public const ADD_PICTURE_PRODUCT_FAILED = 'product/add-picture-failed';
    public const ADD_PICTURE_PRODUCT_FAILED_FORBIDDEN = 'product/add-picture-failed-forbidden';
    public const REMOVE_PICTURE_PRODUCT_FAILED = 'product/remove-picture-failed';
    public const REMOVE_PICTURE_PRODUCT_FAILED_FORBIDDEN = 'product/remove-picture-failed-forbidden';
    public const PRODUCT_OR_MEDIA_NOT_FOUND = 'product/product-or-media-not-found';

    // PRODUCT
    public const ADD_CATEGORY_TO_ORGANIZATION_FAILED = 'product/add-category-organization-failed';
    public const ADD_CATEGORY_TO_ORGANIZATION_FAILED_FORBIDDEN = 'product/add-category-organization-failed-forbidden';
    public const ADD_OPTION_FAILED = 'product/add-option-failed';
    public const ADD_OPTION_FAILED_FORBIDDEN = 'product/add-option-failed-forbidden';
    public const ADD_PRODUCT_LIKE_FAILED = 'product/add-product-likes-failed';
    public const ADD_PRODUCT_LIKE_FAILED_FORBIDDEN = 'product/add-product-likes-failed-forbidden';
    public const ADD_COMMENT_ON_PRODUCT_FAILED = 'product/add-product-comment-failed';
    public const ADD_COMMENT_ON_PRODUCT_FAILED_FORBIDDEN = 'product/add-product-comment-failed-forbidden';
    public const ADD_PRODUCT_VIEWS_FAILED = 'product/add-product-views-failed';
    public const ADD_PRODUCT_VIEWS_FAILED_FORBIDDEN = 'product/add-product-views-failed-forbidden';
    public const ADD_SUBCATEGORY_FAILED = 'product/add-subcategory-failed';
    public const ADD_SUBCATEGORY_FAILED_FORBIDDEN = 'product/add-subcategory-failed-forbidden';
    public const DELETE_CATEGORY_FAILED = 'product/delete-category-failed';
    public const DELETE_CATEGORY_FAILED_FORBIDDEN = 'product/delete-category-failed-forbidden';
    public const GET_CATEGORY_BY_ID_FAILED = 'product/get-category-by-id';
    public const GET_CATEGORY_BY_ID_FAILED_FORBIDDEN = 'product/get-category-by-id-forbidden';
    public const GET_CATEGORIES_FAILED = 'product/get-categories-failed';
    public const GET_CATEGORIES_FAILED_FORBIDDEN = 'product/get-categories-failed-forbidden';
    public const GET_ORGANIZATION_CATEGORIES_FAILED = 'product/get-organization-categories-failed';
    public const GET_ORGANIZATION_CATEGORIES_FAILED_FORBIDDEN = 'product/get-organization-categories-failed-forbidden';
    public const GET_ORGANIZATION_SUBCATEGORIES_FAILED = 'product/get-organization-subcategories-failed';
    public const GET_ORGANIZATION_SUBCATEGORIES_FAILED_FORBIDDEN = 'product/get-organization-subcategories-failed-forbidden';
    public const GET_PRODUCT_COMMENTS_FAILED = 'product/get-product-comments-failed';
    public const GET_PRODUCT_COMMENTS_FAILED_FORBIDDEN = 'product/get-product-comments-failed-forbidden';
    public const GET_PRODUCT_LIKES_FAILED = 'product/get-product-likes-failed';
    public const GET_PRODUCT_LIKES_FAILED_FORBIDDEN = 'product/get-product-likes-failed-forbidden';
    public const GET_PRODUCT_VIEWS_FAILED = 'product/get-product-views-failed';
    public const GET_PRODUCT_VIEWS_FAILED_FORBIDDEN = 'product/get-product-views-failed-forbidden';
    public const GET_PRODUCT_FAILED = 'product/get-product-failed';
    public const GET_PRODUCT_FAILED_FORBIDDEN = 'product/get-product-failed-forbidden';
    public const GET_PRODUCTS_FAILED = 'product/get-products-failed';
    public const GET_PRODUCTS_FAILED_FORBIDDEN = 'product/get-products-failed-forbidden';
    public const GET_PUBLIC_CATEGORIES_AND_SUBS_FAILED = 'product/get-public-categories-and-subs-failed';
    public const GET_PUBLIC_CATEGORIES_AND_SUBS_FAILED_FORBIDDEN = 'product/get-public-categories-and-subs-failed-forbidden';
    public const GET_PUBLIC_CATEGORIES_FAILED = 'product/get-public-categories-failed';
    public const GET_PUBLIC_CATEGORIES_FAILED_FORBIDDEN = 'product/get-public-categories-failed-forbidden';
    public const GET_PUBLIC_CATEGORY_BY_SLUG_FAILED = 'product/get-public-category-by-slug-failed';
    public const GET_PUBLIC_CATEGORY_BY_SLUG_FAILED_FORBIDDEN = 'product/get-public-category-by-slug-failed-forbidden';
    public const GET_PUBLIC_PRODUCT_BY_SLUG_FAILED = 'product/get-public-product-by-slug-failed';
    public const GET_PUBLIC_PRODUCT_BY_SLUG_FAILED_FORBIDDEN = 'product/get-public-product-by-slug-failed-forbidden';
    public const GET_PUBLIC_PRODUCT_BY_ID_FAILED = 'product/get-public-product-by-id-failed';
    public const GET_PUBLIC_PRODUCT_BY_ID_FAILED_FORBIDDEN = 'product/get-public-product-by-id-failed-forbidden';
    public const GET_PUBLIC_PRODUCTS_WITH_FILTERS_FAILED = 'product/get-public-products-with-filters-failed';
    public const GET_PUBLIC_PRODUCTS_WITH_FILTERS_FAILED_FORBIDDEN = 'product/get-public-products-with-filters-failed-forbidden';
    public const GET_UNRESTRICTED_CATEGORIES_FAILED = 'product/get-unrestricted-categories-failed';
    public const GET_UNRESTRICTED_CATEGORIES_FAILED_FORBIDDEN = 'product/get-unrestricted-categories-failed-forbidden';
    public const REMOVE_OPTION_FAILED = 'product/remove-option-failed';
    public const REMOVE_OPTION_FAILED_FORBIDDEN = 'product/remove-option-failed-forbidden';
    public const UPDATE_CATEGORY_FAILED = 'product/update-category-failed';
    public const UPDATE_CATEGORY_FAILED_FORBIDDEN = 'product/update-category-failed-forbidden';
    // public const PRODUCT_NOT_FOUND = 'product/product-not-found';
    public const CATEGORY_NOT_FOUND = 'product/category-not-found';
    public const SLUG_CATEGORY_NOT_FOUND = 'product/slug-category-not-found';
    public const SLUG_PRODUCT_NOT_FOUND = 'product/slug-product-not-found';
    public const OPTION_OR_PRODUCT_NOT_FOUND = 'product/option-or-product-not-found';
    // public const ORGANIZATION_NOT_FOUND = 'product/organization-not-found';

    // SUBSCRIPTION
    public const FIND_ONE_SUBSCRIPTION_WITH_FILTER_FAILED = 'subscription/fetch-failed';
    public const FIND_ONE_SUBSCRIPTION_WITH_FILTER_FAILED_FORBIDDEN = 'subscription/fetch-failed-forbidden';
    public const CANCEL_SUBSCRIPTION_FAILED = 'subscription/cancel-failed';
    public const CANCEL_SUBSCRIPTION_FAILED_FORBIDDEN = 'subscription/cancel-failed-forbidden';
    public const SUBSCRIPTION_NOT_FOUND = 'subscription/not-found';

    /**
     * @var array<string, string>
     */
    public static $errors = [
      // ADVERTISEMENT
      self::CREATION_FAILED => 'Create advertisement failed',
      self::CREATION_FAILED_FORBIDDEN => 'Create advertisement failed, forbidden',
      self::UPDATE_FAILED => 'Update advertisement failed',
      self::UPDATE_FAILED_FORBIDDEN => 'Update advertisement failed, forbidden',
      self::DELETE_FAILED => 'Delete advertisement failed',
      self::DELETE_FAILED_FORBIDDEN => 'Delete advertisement failed, forbidden',
      self::ADVERTISEMENT_NOT_FOUND => 'Advertisement not found',
      self::GET_ADVERTISEMENT_BY_ID_FAILED => 'Get advertisement by id failed',
      self::GET_ADVERTISEMENT_BY_ID_FAILED_FORBIDDEN => 'Get advertisement by id failed forbidden',
      self::GET_ADVERTISEMENTS_FAILED => 'Get advertisements failed',
      self::GET_ADVERTISEMENTS_FAILED_FORBIDDEN => 'Get advertisements failed forbidden',
      self::GET_PUBLIC_ADVERTISEMENTS_FAILED => 'Get public advertisements failed',
      self::GET_PUBLIC_ADVERTISEMENTS_FAILED_FORBIDDEN => 'Get public advertisements failed, forbidden',

      // BASKET
      self::GET_BASKET_FAILED => 'Failed to fetch basket by id',
      self::GET_BASKET_FAILED_FORBIDDEN => 'Failed to fetch basket by id, forbidden',
      self::BASKET_ADD_FAILED => 'Failed to add product to basket',
      self::BASKET_ADD_FAILED_FORBIDDEN => 'Failed to add product to basket, forbidden',
      self::BASKET_REMOVE_FAILED => 'Failed to remove product from basket',
      self::BASKET_REMOVE_FAILED_FORBIDDEN => 'Failed to remove product from basket, forbidden',
      self::BASKET_CLEAR_FAILED => 'Failed to clear basket',
      self::BASKET_CLEAR_FAILED_FORBIDDEN => 'Failed to clear basket, forbidden',
      self::VALIDATE_AND_PAY_BASKET_FAILED => 'Failed to validate and pay basket',
      self::VALIDATE_AND_PAY_BASKET_FAILED_FORBIDDEN => 'Failed to validate and pay basket, forbidden',
      self::BASKET_COMMENT_FAILED => 'Failed to comment basket',
      self::BASKET_COMMENT_FAILED_FORBIDDEN => 'Failed to comment basket, forbidden',
      self::BASKET_VALIDATE_PENDING_FAILED => 'Failed to validate pending payment',
      self::BASKET_VALIDATE_PENDING_FAILED_FORBIDDEN => 'Failed to validate pending payment, forbidden',
      self::BASKET_DISCOUNT_CODE_FAILED => 'Failed to set discount code',
      self::BASKET_DISCOUNT_CODE_FAILED_FORBIDDEN => 'Failed to set discount code, forbidden',
      self::BASKET_SPONSOR_CODE_FAILED => 'Failed to set sponsorship code',
      self::BASKET_SPONSOR_CODE_FAILED_FORBIDDEN => 'Failed to set sponsorship code, forbidden',
      self::BASKET_ALREADY_PAYED => 'Order already payed',
      self::BASKET_ORDER_NOT_VALIDATED => 'Basket order not validated',
      self::NO_DEFAULT_CARD => 'No default car provided',
      self::CUSTOMER_NOT_FOUND => 'Customer not found',
      self::SPONSOR_CODE_NOT_FOUND => 'Sponsor discount code not found',
      self::CODE_NOT_FOUND => 'Discount code not found',

      // DISCOUNT
      self::CREATE_DISCOUNT_FAILED => 'Create discount failed',
      self::CREATE_DISCOUNT_FAILED_FORBIDDEN => 'Create discount failed, forbidden',
      self::DELETE_DISCOUNT_FAILED => 'Delete discount failed',
      self::DELETE_DISCOUNT_FAILED_FORBIDDEN => 'Delete discount failed, forbidden',
      self::GET_DISCOUNTS_BY_PARAMS_FAILED => 'Get discounts by params failed',
      self::GET_DISCOUNTS_BY_PARAMS_FAILED_FORBIDDEN => 'Get discounts by params failed, forbidden',
      self::GET_DISCOUNT_BY_ID_FAILED => 'Get discount by id failed',
      self::GET_DISCOUNT_BY_ID_FAILED_FORBIDDEN => 'Get discount by id failed, forbidden',
      self::GET_DISCOUNTS_FAILED => 'Get discounts failed',
      self::GET_DISCOUNTS_FAILED_FORBIDDEN => 'Get discounts failed, forbidden',
      self::GET_PUBLIC_DISCOUNTS_FAILED => 'Get public discount failed',
      self::GET_PUBLIC_DISCOUNTS_FAILED_FORBIDDEN => 'Get public discount failed, forbidden',
      self::UPDATE_DISCOUNT_FAILED => 'Update discount failed',
      self::UPDATE_DISCOUNT_FAILED_FORBIDDEN => 'Update discount failed, forbidden',
      self::VALIDATE_DISCOUNT_CODE_FAILED => 'Validate discount code failed',
      self::VALIDATE_DISCOUNT_CODE_FAILED_FORBIDDEN => 'Validate discount code failed, forbidden',
      self::DISCOUNT_NOT_FOUND => 'Discount not found',
      self::DISCOUNT_CODE_NOT_FOUND => 'Discount code not found',

      // INVOICE
      self::SEND_INVOICE_LINK_FAILED => 'Failed to send link',
      self::SEND_INVOICE_LINK_FAILED_FORBIDDEN => 'Failed to send link, forbidden',
      self::INVOICE_ID_NOT_FOUND => 'Invoice not found',

      // LOYALTY
      self::GET_USER_CARD_LOYALTIES_FAILED => 'Failed to get user card loyalties',
      self::GET_USER_CARD_LOYALTIES_FAILED_FORBIDDEN => 'Failed to get user card loyalties, forbidden',
      self::UPDATE_LOYALTY_CARD_FAILED => 'Failed to update loyalty card',
      self::UPDATE_LOYALTY_CARD_FAILED_FORBIDDEN => 'Failed to update loyalty card, forbidden',
      self::GET_ORGANIZATION_LOYALTY_CARD_FAILED => 'Failed to get organization loyalty card',
      self::GET_ORGANIZATION_LOYALTY_CARD_FAILED_FORBIDDEN => 'Failed to get organization loyalty card, forbidden',
      self::ORGANIZATION_ID_NOT_FOUND => 'Organization not found',
      self::LOYALTY_CARD_NOT_FOUND => 'Loyalty card not found',

      // ORDER
      self::CANCEL_ORDER_FAILED => 'Failed to cancel order',
      self::CANCEL_ORDER_FAILED_FORBIDDEN => 'Failed to cancel order, forbidden',
      self::GET_ORDER_FAILED => 'Failed to get order',
      self::GET_ORDER_FAILED_FORBIDDEN => 'Failed to get order, forbidden',
      self::GET_ORDERS_WITH_FILTER_FAILED => 'Failed to get orders',
      self::GET_ORDERS_WITH_FILTER_FAILED_FORBIDDEN => 'Failed to get orders, forbidden',
      self::GET_ORGANIZATION_ORDERS_FAILED => 'Failed to get organization orders',
      self::GET_ORGANIZATION_ORDERS_FAILED_FORBIDDEN => 'Failed to get organization orders, forbidden',
      self::UPDATE_ORDER_FAILED => 'Failed to update order',
      self::UPDATE_ORDER_FAILED_FORBIDDEN => 'Failed to update order, forbidden',
      self::ORDER_NOT_FOUND => 'Order not found',
      self::BAD_REQUEST => 'Bad request',
      self::NOT_ALLOWED => 'Not allowed',
      self::ALREADY_CHANGED => 'Already changed',

      // PAYMENT
      self::DELETE_CARD_FAILED => 'Failed to delete card',
      self::DELETE_CARD_FAILED_FORBIDDEN => 'Failed to delete card, forbidden',
      self::REQUEST_CREDENTIALS_CARD_FAILED => 'Failed to request credentials',
      self::REQUEST_CREDENTIALS_CARD_FAILED_FORBIDDEN => 'Failed to request credentials, forbidden',
      self::SAVE_CARD_FAILED => 'Failed to save card',
      self::SAVE_CARD_FAILED_FORBIDDEN => 'Failed to save card, forbidden',
      self::SET_DEFAULT_CARD_FAILED => 'Failed to set default card',
      self::SET_DEFAULT_CARD_FAILED_FORBIDDEN => 'Failed to set default card, forbidden',
      self::VALIDATE_CARD_FAILED => 'Failed to validate card',
      self::VALIDATE_CARD_FAILED_FORBIDDEN => 'Failed to validate card, forbidden',
      self::CARD_NOT_FOUND => 'Card not found',

      // PAYOUT
      self::GENERATE_PAYOUT_FAILED => 'Failed to generate payout',
      self::GENERATE_PAYOUT_FAILED_FORBIDDEN => 'Failed to generate payout, forbidden',
      self::SUBMIT_PAYOUT_FAILED => 'Failed to submit payout',
      self::SUBMIT_PAYOUT_FAILED_FORBIDDEN => 'Failed to submit payout, forbidden',

      // PRODUCT
      self::ADD_CATEGORY_TO_ORGANIZATION_FAILED => 'Failed to add category to organization',
      self::ADD_CATEGORY_TO_ORGANIZATION_FAILED_FORBIDDEN => 'Failed to add category to organization, forbidden',
      self::ADD_OPTION_FAILED => 'Failed to add option to product',
      self::ADD_OPTION_FAILED_FORBIDDEN => 'Failed to add option to product, forbidden',
      self::ADD_PRODUCT_LIKE_FAILED => 'Failed to add like to product',
      self::ADD_PRODUCT_LIKE_FAILED_FORBIDDEN => 'Failed to add like to product, forbidden',
      self::ADD_COMMENT_ON_PRODUCT_FAILED => 'Failed to add comment to product',
      self::ADD_COMMENT_ON_PRODUCT_FAILED_FORBIDDEN => 'Failed to add comment to product, forbidden',
      self::ADD_PRODUCT_VIEWS_FAILED => 'Failed to add product views',
      self::ADD_PRODUCT_VIEWS_FAILED_FORBIDDEN => 'Failed to add product views, forbidden',
      self::ADD_SUBCATEGORY_FAILED => 'Failed to add subcategory to category',
      self::ADD_SUBCATEGORY_FAILED_FORBIDDEN => 'Failed to add subcategory to category, forbidden',
      self::DELETE_CATEGORY_FAILED => 'Failed to delete category',
      self::DELETE_CATEGORY_FAILED_FORBIDDEN => 'Failed to delete category, forbidden',
      self::GET_CATEGORY_BY_ID_FAILED => 'Failed to get category',
      self::GET_CATEGORY_BY_ID_FAILED_FORBIDDEN => 'Failed to get category, forbidden',
      self::GET_CATEGORIES_FAILED => 'Failed to get categories',
      self::GET_CATEGORIES_FAILED_FORBIDDEN => 'Failed to get categories, forbidden',
      self::GET_ORGANIZATION_CATEGORIES_FAILED => "Failed to get organization's categories",
      self::GET_ORGANIZATION_CATEGORIES_FAILED_FORBIDDEN => "Failed to get organization's categories, forbidden",
      self::GET_ORGANIZATION_SUBCATEGORIES_FAILED => "Failed to get organization's subcategories",
      self::GET_ORGANIZATION_SUBCATEGORIES_FAILED_FORBIDDEN => "Failed to get organization's subcategories, forbidden",
      self::GET_PRODUCT_COMMENTS_FAILED => 'Failed to get product comments',
      self::GET_PRODUCT_COMMENTS_FAILED_FORBIDDEN => 'Failed to get product comments, forbidden',
      self::GET_PRODUCT_LIKES_FAILED => 'Failed to get product likes',
      self::GET_PRODUCT_LIKES_FAILED_FORBIDDEN => 'Failed to get product likes, forbidden',
      self::GET_PRODUCTS_FAILED => 'Failed to get products',
      self::GET_PRODUCTS_FAILED_FORBIDDEN => 'Failed to get products, forbidden',
      self::GET_PUBLIC_CATEGORIES_AND_SUBS_FAILED => 'Failed to get public categories and sub-categories',
      self::GET_PUBLIC_CATEGORIES_AND_SUBS_FAILED_FORBIDDEN => 'Failed to get public categories and sub-categories, forbidden',
      self::GET_PUBLIC_CATEGORIES_FAILED => 'Failed to get public categories',
      self::GET_PUBLIC_CATEGORIES_FAILED_FORBIDDEN => 'Failed to get public categories, forbidden',
      self::GET_PUBLIC_CATEGORY_BY_SLUG_FAILED => 'Failed to get public category by slug',
      self::GET_PUBLIC_CATEGORY_BY_SLUG_FAILED_FORBIDDEN => 'Failed to get public category by slug, forbidden',
      self::GET_PUBLIC_PRODUCT_BY_SLUG_FAILED => 'Failed to get public product by slug',
      self::GET_PUBLIC_PRODUCT_BY_SLUG_FAILED_FORBIDDEN => 'Failed to get public product by slug, forbidden',
      self::GET_PUBLIC_PRODUCT_BY_ID_FAILED => 'Failed to get public product by id',
      self::GET_PUBLIC_PRODUCT_BY_ID_FAILED_FORBIDDEN => 'Failed to get public product by id, forbidden',
      self::GET_PUBLIC_PRODUCTS_WITH_FILTERS_FAILED => 'Failed to get public products with filters',
      self::GET_PUBLIC_PRODUCTS_WITH_FILTERS_FAILED_FORBIDDEN => 'Failed to get public products with filters, forbidden',
      self::GET_UNRESTRICTED_CATEGORIES_FAILED => 'Failed to get unrestricted categories',
      self::GET_UNRESTRICTED_CATEGORIES_FAILED_FORBIDDEN => 'Failed to get unrestricted categories, forbidden',
      self::REMOVE_OPTION_FAILED => 'Failed to remove option from product',
      self::REMOVE_OPTION_FAILED_FORBIDDEN => 'Failed to remove option from product, forbidden',
      self::PRODUCT_NOT_FOUND => 'Product not found',
      self::CATEGORY_NOT_FOUND => 'Category not found',
      self::SLUG_CATEGORY_NOT_FOUND => 'Slug category not found',
      self::SLUG_PRODUCT_NOT_FOUND => 'Slug product not found',
      self::OPTION_OR_PRODUCT_NOT_FOUND => 'Option or product not found',
      self::ORGANIZATION_NOT_FOUND => 'Organization not found',

      // SUBSCRIPTION
      self::FIND_ONE_SUBSCRIPTION_WITH_FILTER_FAILED => 'Failed to fetch subscription',
      self::FIND_ONE_SUBSCRIPTION_WITH_FILTER_FAILED_FORBIDDEN => 'Failed to fetch subscription, forbidden',
      self::CANCEL_SUBSCRIPTION_FAILED => 'Failed to cancel subscription',
      self::CANCEL_SUBSCRIPTION_FAILED_FORBIDDEN => 'Failed to cancel subscription, forbidden',
      self::SUBSCRIPTION_NOT_FOUND => 'Subscription not found',
    ];
}
