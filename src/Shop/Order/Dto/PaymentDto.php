<?php

namespace Sherl\Sdk\Shop\Order\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Person\Dto\PersonOutputDto;

class PaymentDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $uri;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $consumerId;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $customerUri;

    /**
     * @var PersonOutputDto
     * @Serializer\Type("Sherl\Sdk\Person\Dto\PersonOutputDto")
     */
    public $customer;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $organizationUri;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $createdAt;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $updatedAt;

    /** MANGOPAY */

    /**
     * @var string
     * @see https://mangopay.com/docs/endpoints/
     * @Serializer\Type("string")
     */
    public $Id;

    /**
     * @var integer
     * @see https://mangopay.com/docs/endpoints/
     * @Serializer\Type("integer")
     */
    public $CreationDate;

    /**
     * @var string
     * @see https://mangopay.com/docs/endpoints/
     * @Serializer\Type("string")
     */
    public $Tag;

    /**
     * @var mixed
     * @see https://mangopay.com/docs/endpoints/
     * @Serializer\Type("mixed")
     */
    public $DebitedFunds;

    /**
     * @var mixed
     * @see https://mangopay.com/docs/endpoints/
     * @Serializer\Type("mixed")
     */
    public $CreditedFunds;

    /**
     * @var mixed
     * @see https://mangopay.com/docs/endpoints/
     * @Serializer\Type("mixed")
     */
    public $Fees;

    /**
     * @var string
     * @see https://mangopay.com/docs/endpoints/
     * @Serializer\Type("string")
     */
    public $DebitedWalletId;

    /**
     * @var string
     * @see https://mangopay.com/docs/endpoints/
     * @Serializer\Type("string")
     */
    public $CreditedWalletId;

    /**
     * @var string
     * @see https://mangopay.com/docs/endpoints/
     * @Serializer\Type("string")
     */
    public $AuthorId;

    /**
     * @var string
     * @see https://mangopay.com/docs/endpoints/
     * @Serializer\Type("string")
     */
    public $CreditedUserId;

    /**
     * @var string
     * @see https://mangopay.com/docs/endpoints/
     * @Serializer\Type("string")
     */
    public $Nature;

    /**
     * @var string
     * @see https://mangopay.com/docs/endpoints/
     * @Serializer\Type("string")
     */
    public $Status;

    /**
     * @var string
     * @see https://mangopay.com/docs/endpoints/
     * @Serializer\Type("string")
     */
    public $PaymentStatus;

    /**
     * @var integer
     * @see https://mangopay.com/docs/endpoints/
     * @Serializer\Type("integer")
     */
    public $ExecutionDate;

    /**
     * @var string
     * @see https://mangopay.com/docs/endpoints/
     * @Serializer\Type("string")
     */
    public $ResultCode;

    /**
     * @var string
     * @see https://mangopay.com/docs/endpoints/
     * @Serializer\Type("string")
     */
    public $ResultMessage;

    /**
     * @var string
     * @see https://mangopay.com/docs/endpoints/
     * @Serializer\Type("string")
     */
    public $Type;

    /**
     * @var string
     * @see https://mangopay.com/docs/endpoints/
     * @Serializer\Type("string")
     */
    public $PaymentType;

    /**
     * @var string
     * @see https://mangopay.com/docs/endpoints/
     * @Serializer\Type("string")
     */
    public $ExecutionType;

    /** STRIPE */

    /**
     * @var string
     * @see https://stripe.com/docs/
     * @Serializer\Type("string")
     */
    public $object;

    /**
     * @var float
     * @see https://stripe.com/docs/
     * @Serializer\Type("float")
     */
    public $amount;

    /**
     * @var float
     * @see https://stripe.com/docs/
     *    * @Serializer\Type("float")
     */
    public $amount_refunded;

    /**
     * @var mixed
     * @see https://stripe.com/docs/
     * @Serializer\Type("mixed")
     */
    public $application;

    /**
     * @var mixed
     * @see https://stripe.com/docs/
     * @Serializer\Type("mixed")
     */
    public $application_fee;

    /**
     * @var mixed
     * @see https://stripe.com/docs/
     * @Serializer\Type("mixed")
     */
    public $application_fee_amount;

    /**
     * @var float
     * @see https://stripe.com/docs/
     * @Serializer\Type("float")
     */
    public $balance_transaction;

    /**
     * @var mixed
     * @see https://stripe.com/docs/
     * @Serializer\Type("mixed")
     */
    public $billing_details;

    /**
     * @var boolean
     * @see https://stripe.com/docs/
     * @Serializer\Type("boolean")
     */
    public $captured;

    /**
     * @var int
     * @see https://stripe.com/docs/
     * @Serializer\Type("integer")
     */
    public $created;

    /**
     * @var string
     * @see https://stripe.com/docs/
     * @Serializer\Type("string")
     */
    public $currency;

    /**
     * @var string
     * @see https://stripe.com/docs/
     * @Serializer\Type("string")
     */
    public $description;

    /**
     * @var boolean
     * @see https://stripe.com/docs/
     * @Serializer\Type("boolean")
     */
    public $disputed;

    /**
     * @var mixed
     * @see https://stripe.com/docs/
     * @Serializer\Type("mixed")
     */
    public $failure_code;

    /**
     * @var mixed
     * @see https://stripe.com/docs/
     * @Serializer\Type("mixed")
     */
    public $failure_message;

    /**
     * @var mixed
     * @see https://stripe.com/docs/
     * @Serializer\Type("mixed")
     */
    public $fraud_details;

    /**
     * @var mixed
     * @see https://stripe.com/docs/
     * @Serializer\Type("mixed")
     */
    public $invoice;

    /**
     * @var boolean
     * @see https://stripe.com/docs/
     * @Serializer\Type("boolean")
     */
    public $livemode;

    /**
     * @var array<string,mixed>
     * @Serializer\Type("array<string,mixed>")
     */
    public $metadata;

    /**
     * @var mixed
     * @see https://stripe.com/docs/
     * @Serializer\Type("mixed")
     */
    public $on_behalf_of;

    /**
     * @var mixed
     * @see https://stripe.com/docs/
     * @Serializer\Type("mixed")
     */
    public $order;

    /**
     * @var mixed
     * @see https://stripe.com/docs/
     * @Serializer\Type("mixed")
     */
    public $outcome;

    /**
     * @var boolean
     * @see https://stripe.com/docs/
     * @Serializer\Type("boolean")
     */
    public $paid;

    /**
     * @var mixed
     * @see https://stripe.com/docs/
     * @Serializer\Type("mixed")
     */
    public $payment_intent;

    /**
     * @var string
     * @see https://stripe.com/docs/
     * @Serializer\Type("string")
     */
    public $payment_method;

    /**
     * @var string
     * @see https://stripe.com/docs/
     * @Serializer\Type("mixed")
     */
    public $payment_method_details;

    /**
     * @var mixed
     * @see https://stripe.com/docs/
     * @Serializer\Type("mixed")
     */
    public $receipt_email;

    /**
     * @var mixed
     * @see https://stripe.com/docs/
     * @Serializer\Type("mixed")
     */
    public $receipt_number;

    /**
     * @var string
     * @see https://stripe.com/docs/
     * @Serializer\Type("string")
     */
    public $receipt_url;

    /**
     * @var boolean
     * @see https://stripe.com/docs/
     * @Serializer\Type("boolean")
     */
    public $refunded;

    /**
     * @var mixed
     * @see https://stripe.com/docs/
     * @Serializer\Type("mixed")
     */
    public $refunds;

    /**
     * @var mixed
     * @see https://stripe.com/docs/
     * @Serializer\Type("mixed")
     */
    public $review;

    /**
     * @var mixed
     * @see https://stripe.com/docs/
     * @Serializer\Type("mixed")
     */
    public $shipping;

    /**
     * @var mixed
     * @see https://stripe.com/docs/
     * @Serializer\Type("mixed")
     */
    public $source_transfer;

    /**
     * @var mixed
     * @see https://stripe.com/docs/
     * @Serializer\Type("mixed")
     */
    public $statement_descriptor;

    /**
     * @var mixed
     * @see https://stripe.com/docs/
     * @Serializer\Type("mixed")
     */
    public $statement_descriptor_suffix;

    /**
     * @var string
     * @see https://stripe.com/docs/
     * @Serializer\Type("string")
     */
    public $status;

    /**
     * @var mixed
     * @see https://stripe.com/docs/
     * @Serializer\Type("mixed")
     */
    public $transfer_data;

    /**
     * @var mixed
     * @see https://stripe.com/docs/
     * @Serializer\Type("mixed")
     */
    public $transfer_group;

    /**
     * @var string
     * @see https://stripe.com/docs/
     * @Serializer\Type("string")
     */
    public $source;
}
