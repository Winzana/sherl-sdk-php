<?php

namespace Sherl\Sdk\Order\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Order\Dto\Payment\CreditedFundsOutputDto;
use Sherl\Sdk\Order\Dto\Payment\DebitedFundsOutputDto;
use Sherl\Sdk\Order\Dto\Payment\FeesOutputDto;
use Sherl\Sdk\Order\Dto\BillingDetailsOutputDto;
use Sherl\Sdk\Order\Dto\RefundOutputDto;
use Sherl\Sdk\Order\Dto\PaymentMethodDetailsOutputDto;

use Sherl\Sdk\Person\Dto\PersonOutputDto;

class PaymentOutputDto
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
  public $Id;

  /**
   * @var integer
   * @Serializer\Type("integer")
   */
  public $CreationDate;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $Tag;

  /**
   * @var DebitedFundsOutputDto
   * @Serializer\Type("Sherl\Sdk\Order\Dto\Payment\DebitedFundsOutputDto")
   */
  public $DebitedFunds;

  /**
   * @var CreditedFundsOutputDto
   * @Serializer\Type("Sherl\Sdk\Order\Dto\Payment\CreditedFundsOutputDto")
   */
  public $CreditedFunds;

  /**
   * @var FeesOutputDto
   * @Serializer\Type("Sherl\Sdk\Order\Dto\Payment\FeesOutputDto")
   */
  public $Fees;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $DebitedWalletId;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $CreditedWalletId;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $AuthorId;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $CreditedUserId;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $Nature;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $Status;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $PaymentStatus;

  /**
   * @var integer
   * @Serializer\Type("integer")
   */
  public $ExecutionDate;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $ResultCode;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $ResultMessage;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $Type;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $PaymentType;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $ExecutionType;

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

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $object;

  /**
   * @var float
   * @Serializer\Type("float")
   */
  public $amount;

  /**
   * @var float
   * @Serializer\Type("float")
   */
  public $amount_refunded;

  /**
   * @var mixed
   * @Serializer\Type("mixed")
   */
  public $application;

  /**
   * @var mixed
   * @Serializer\Type("mixed")
   */
  public $application_fee;

  /**
   * @var mixed
   * @Serializer\Type("mixed")
   */
  public $application_fee_amount;

  /**
   * @var float
   * @Serializer\Type("float")
   */
  public $balance_transaction;

  /**
   * @var BillingDetailsOutputDto
   * @Serializer\Type("Sherl\Sdk\Order\Dto\BillingDetailsOutputDto")
   */
  public $billing_details;

  /**
   * @var boolean
   * @Serializer\Type("boolean")
   */
  public $captured;

  /**
   * @var integer
   * @Serializer\Type("integer")
   */
  public $created;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $currency;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $description;

  /**
   * @var boolean
   * @Serializer\Type("boolean")
   */
  public $disputed;

  /**
   * @var mixed
   * @Serializer\Type("mixed")
   */
  public $failure_code;

  /**
   * @var mixed
   * @Serializer\Type("mixed")
   */
  public $failure_message;

  /**
   * @var mixed
   * @Serializer\Type("mixed")
   */
  public $fraud_details;

  /**
   * @var mixed
   * @Serializer\Type("mixed")
   */
  public $invoice;

  /**
   * @var boolean
   * @Serializer\Type("boolean")
   */
  public $livemode;

  /**
   * @var array
   * @Serializer\Type("array")
   */
  public $metadata;

  /**
   * @var mixed
   * @Serializer\Type("mixed")
   */
  public $on_behalf_of;

  /**
   * @var mixed
   * @Serializer\Type("mixed")
   */
  public $order;

  /**
   * @var mixed
   * @Serializer\Type("mixed")
   */
  public $outcome;

  /**
   * @var boolean
   * @Serializer\Type("boolean")
   */
  public $paid;

  /**
   * @var mixed
   * @Serializer\Type("mixed")
   */
  public $payment_intent;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $payment_method;

  /**
   * @var PaymentMethodDetailsOutputDto
   * @Serializer\Type("Sherl\Sdk\Order\Dto\PaymentMethodDetailsOutputDto")
   */
  public $payment_method_details;

  /**
   * @var mixed
   * @Serializer\Type("mixed")
   */
  public $receipt_email;

  /**
   * @var mixed
   * @Serializer\Type("mixed")
   */
  public $receipt_number;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $receipt_url;

  /**
   * @var boolean
   * @Serializer\Type("boolean")
   */
  public $refunded;

  /**
   * @var RefundOutputDto
   * @Serializer\Type("Sherl\Sdk\Order\Dto\RefundOutputDto")
   */
  public $refunds;

  /**
   * @var mixed
   * @Serializer\Type("mixed")
   */
  public $review;

  /**
   * @var mixed
   * @Serializer\Type("mixed")
   */
  public $shipping;

  /**
   * @var mixed
   * @Serializer\Type("mixed")
   */
  public $source_transfer;

  /**
   * @var mixed
   * @Serializer\Type("mixed")
   */
  public $statement_descriptor;

  /**
   * @var mixed
   * @Serializer\Type("mixed")
   */
  public $statement_descriptor_suffix;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $status;

  /**
   * @var mixed
   * @Serializer\Type("mixed")
   */
  public $transfer_data;

  /**
   * @var mixed
   * @Serializer\Type("mixed")
   */
  public $transfer_group;

  /**
   * @var string
   * @Serializer\Type("string")
   */
  public $source;
}
