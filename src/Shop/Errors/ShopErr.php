<?php

namespace Sherl\Sdk\Shop\Errors;

class ShopErr
{
    // ADVERTISEMENT
    public const FETCH_ADVERTISEMENT_FAILED = 'advertisement/fetch-failed';
    public const ADVERTISEMENT_NOT_FOUND = 'advertisement/not-found';
    public const UPDATE_ADVERTISEMENT_FAILED = 'advertisement/update-failed';
    public const DELETE_ADVERTISEMENT_FAILED = 'advertisement/delete-failed';
    public const CREATE_ADVERTISEMENT_FAILED = 'advertisement/creation-failed';

    // DISCOUNT
    public const POST_FAILED = 'discount/post-discount-failed'; // TODO: fix naming
    public const FETCH_DISCOUNT_FAILED = 'discount/order/fetch-discount-failed';
    public const DISCOUNT_NOT_FOUND = 'discount/order/discount-not-found';
    public const UPDATE_DISCOUNT_FAILED = 'discount/update-discount-failed';
    public const DELETE_DISCOUNT_FAILED = 'discount/delete-discount-failed';
    public const VALIDATE_DISCOUNT_CODE_FAILED = 'discount/validation-discount-code-failed';

    // INVOICE
    public const SEND_INVOICE_FAILED = 'invoice/send-failed';

    // LOYALTY
    public const FETCH_LOYALTY_FAILED = 'loyalty/fetch-loyalty-failed';
    public const UPDATE_LOYALTY_FAILED = 'loyalty/update-loyalty-failed';

    // ORDER
    public const FETCH_ORDER_FAILED = 'order/fetch-failed';
    public const BAD_REQUEST = 'order/bad-request';
    public const ORDER_NOT_FOUND = 'order/not-found';
    public const BASKET_FETCH_FAILED = 'order/basket-fetch-failed';
    public const BASKET_ADD_FAILED = 'order/basket-add-failed';
    public const BASKET_REMOVE_FAILED = 'order/basket-remove-failed';
    public const BASKET_CLEAR_FAILED = 'order/basket-clear-failed';
    public const BASKET_COMMENT_FAILED = 'order/basket-comment-failed';
    public const BASKET_VALIDATE_PAY_FAILED = 'order/basket-validate-pay-failed';
    public const BASKET_VALIDATE_PENDING_FAILED = 'order/basket-validate-pending-failed';
    public const BASKET_DISCOUNT_CODE_FAILED = 'order/basket-discount-code-failed';
    public const BASKET_SPONSOR_CODE_FAILED = 'order/basket-sponsor-code-failed';
    public const BASKET_ALREADY_PAYED = 'order/basket-already-payed';
    public const BASKET_ORDER_NOT_VALIDATED = 'order/basket-order-not-validated';
    public const NO_DEFAULT_CARD = 'order/no-default-card';
    public const PAYOUT_FAILED = 'order/payout-failed';
    public const GENERATE_PAYOUT_FAILED = 'order/generate-payout-failed';
    public const NOT_ALLOWED = 'order/not-allowed';
    public const ALREADY_CHANGED = 'order/already-updated';
    public const CANCEL_ORDER_FAILED = 'order/cancel-order-failed';

    // PAYMENT
    public const REQUEST_CREDENTIALS_FAILED = 'payment/request-credentials-failed';
    public const VALIDATE_CARD_FAILED = 'payment/validate-card-failed';
    public const SAVE_CARD_FAILED = 'payment/save-card-failed';
    public const SET_DEFAULT_CARD_FAILED = 'payment/set-default-card-failed';
    public const DELETE_CARD_FAILED = 'payment/delete-card-failed';
    public const SECURE_3D_CARD_FAILED = 'payment/secure-3d-card-failed';

    // PRODUCT
    public const PRODUCTS_FETCH_FAILED = 'product/product-fetch-failed';
    public const CATEGORIES_FETCH_FAILED = 'product/categories-fetch-failed';
    public const PRODUCT_NOT_FOUND = 'product/product-not-found';
    public const CATEGORY_NOT_FOUND = 'product/category-not-found';
    public const SUB_CATEGORIES_NOT_FOUND = 'product/sub-categories-not-found';
    public const PRODUCT_VIEWS_FAILED = 'product/get-product-views-failed';
    public const ADD_PRODUCT_VIEWS_FAILED = 'product/add-product-views-failed';
    public const ADD_PRODUCT_LIKES_FAILED = 'product/add-product-likes-failed';
    public const GET_PRODUCT_LIKES_FAILED = 'product/get-product-likes-failed';
    public const COMMENT_PRODUCT_FAILED = 'product/add-comment-failed';
    public const ADD_OPTION_FAILED = 'product/add-option-failed';
    public const REMOVE_OPTION_FAILED = 'product/remove-option-failed';
    public const ADD_PICTURE_PRODUCT_FAILED = 'product/add-picture-failed';
    public const REMOVE_PICTURE_PRODUCT_FAILED = 'product/remove-picture-failed';
    public const GET_PRODUCT_COMMENTS_FAILED = 'product/get-product-comments-failed';
    public const ADD_CATEGORY_TO_ORGANIZATION_FAILED = 'product/add-category-organization-failed';
    public const GET_ORGANIZATION_CATEGORIES_FAILED = 'product/get-organization-categories-failed';
    public const GET_ORGANIZATION_SUBCATEGORIES_FAILED = 'product/get-organization-subcategories-failed';
    public const ADD_SUBCATEGORY_FAILED = 'product/add-subcategory-failed';
    public const DELETE_CATEGORY_FAILED = 'product/delete-category-failed';
    public const UPDATE_CATEGORY_FAILED = 'product/update-category-failed';
    public const GET_UNRESTRICTED_CATEGORIES_FAILED = 'product/get-unrestricted-categories-failed';

    // SUBSCRIPTION
    public const FETCH_SUBSCRIPTION_FAILED = 'subscription/fetch-failed';
    public const CANCEL_SUBSCRIPTION_FAILED = 'subscription/cancel-failed';

    /**
     * @var array<string, string>
     */
    public static $errors = [
      // ADVERTISEMENT
      self::FETCH_ADVERTISEMENT_FAILED => 'Failed to fetch advertisements',
      self::ADVERTISEMENT_NOT_FOUND => 'Failed to fetch advertisement. Advertisement not found',
      self::UPDATE_ADVERTISEMENT_FAILED => 'Update advertisement failed',
      self::DELETE_ADVERTISEMENT_FAILED => 'Delete advertisement failed',
      self::CREATE_ADVERTISEMENT_FAILED => 'Create advertisement failed',

      // DISCOUNT
      self::FETCH_DISCOUNT_FAILED => 'Failed to fetch discount API',
      self::DISCOUNT_NOT_FOUND => 'Discount not found',
      self::POST_FAILED => 'Post discount failed', // TODO: fix naming
      self::UPDATE_DISCOUNT_FAILED => 'Update discount failed',
      self::DELETE_DISCOUNT_FAILED => 'Delete discount failed',
      self::VALIDATE_DISCOUNT_CODE_FAILED => 'Validate discount code failed',

      // INVOICE
      self::SEND_INVOICE_FAILED => 'Send invoice failed',

      // LOYALTY
      self::FETCH_LOYALTY_FAILED => 'Failed to fetch loyalty API',
      self::UPDATE_LOYALTY_FAILED => 'Update loyalty failed',

      // ORDER
      self::FETCH_ORDER_FAILED => 'Failed to fetch order API',
      self::ORDER_NOT_FOUND => 'Order not found',
      self::BASKET_FETCH_FAILED => 'Failed to fetch basket API',
      self::BASKET_ADD_FAILED => 'Failed to add product to basket',
      self::BASKET_REMOVE_FAILED => 'Failed to remove product from basket',
      self::BASKET_CLEAR_FAILED => 'Failed to clear basket',
      self::BASKET_COMMENT_FAILED => 'Failed to comment basket',
      self::BASKET_VALIDATE_PAY_FAILED => 'Failed to validate and pay',
      self::BASKET_VALIDATE_PENDING_FAILED => 'Failed to validate pending payment',
      self::BASKET_DISCOUNT_CODE_FAILED => 'Failed to set discount code',
      self::BASKET_SPONSOR_CODE_FAILED => 'Failed to set sponsorship code',
      self::BASKET_ALREADY_PAYED => 'Order already payed',
      self::BASKET_ORDER_NOT_VALIDATED => 'Basket order not validated',
      self::NO_DEFAULT_CARD => 'Not have default card',
      self::PAYOUT_FAILED => 'Failed to payout',
      self::GENERATE_PAYOUT_FAILED => 'Failed to generate payout',
      self::CANCEL_ORDER_FAILED => 'Failed to cancel order',
      self::NOT_ALLOWED => 'Not allowed',
      self::ALREADY_CHANGED => 'Order already update',

      // PAYMENT
      self::REQUEST_CREDENTIALS_FAILED => 'Failed to request credentials',
      self::VALIDATE_CARD_FAILED => 'Failed to validate card',
      self::SAVE_CARD_FAILED => 'Failed to save card',
      self::SET_DEFAULT_CARD_FAILED => 'Failed to set default card',
      self::DELETE_CARD_FAILED => 'Failed to delete card',
      self::SECURE_3D_CARD_FAILED => 'Failed to secure 3d card',

      // PRODUCT
      self::PRODUCTS_FETCH_FAILED => 'Failed to fetch products API',
      self::CATEGORIES_FETCH_FAILED => 'Failed to fetch categories API',
      self::PRODUCT_NOT_FOUND => 'Product not found',
      self::CATEGORY_NOT_FOUND => 'Category not found',
      self::SUB_CATEGORIES_NOT_FOUND => 'Sub categories not found',
      self::PRODUCT_VIEWS_FAILED => 'Failed to get product views',
      self::ADD_PRODUCT_VIEWS_FAILED => 'Failed to add product views',
      self::ADD_PRODUCT_LIKES_FAILED => 'Failed to add like to product',
      self::GET_PRODUCT_LIKES_FAILED => 'Failed to get product likes',
      self::COMMENT_PRODUCT_FAILED => 'Failed to add comment to product',
      self::ADD_OPTION_FAILED => 'Failed to add option to product',
      self::REMOVE_OPTION_FAILED => 'Failed to remove option from product',
      self::ADD_PICTURE_PRODUCT_FAILED => 'Failed to add picture to product',
      self::REMOVE_PICTURE_PRODUCT_FAILED => 'Failed to remove picture from product',
      self::GET_PRODUCT_COMMENTS_FAILED => 'Failed to get product comments',
      self::ADD_CATEGORY_TO_ORGANIZATION_FAILED => 'Failed to add category to organization',
      self::GET_ORGANIZATION_CATEGORIES_FAILED => "Failed to get organization's categories",
      self::ADD_SUBCATEGORY_FAILED => 'Failed to add subcategory to category',
      self::DELETE_CATEGORY_FAILED => 'Failed to delete category',
      self::UPDATE_CATEGORY_FAILED => 'Failed to update category',
      self::GET_ORGANIZATION_SUBCATEGORIES_FAILED => "Failed to get organization's subcategories",
      self::GET_UNRESTRICTED_CATEGORIES_FAILED => 'Failed to get unrestricted categories',

      // SUBSCRIPTION
      self::FETCH_SUBSCRIPTION_FAILED => 'Failed to fetch subscription API',
      self::CANCEL_SUBSCRIPTION_FAILED => 'Failed to cancel subscription',
    ];
}
