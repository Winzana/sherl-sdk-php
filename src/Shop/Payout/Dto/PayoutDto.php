<?php

namespace Sherl\Sdk\Shop\Payout\Dto;

use JMS\Serializer\Annotation as Serializer;
use DateTime;
use Sherl\Sdk\Shop\Payout\Dto\MoneyDto;

class PayoutDto
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
    public $organizationUri;

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    public $orderUris;

    /**
     * @var float
     * @Serializer\Type("float")
     */
    public $amount;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $payoutId;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $AuthorId;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $UserId;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $BankAccountId;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $DebitedWalletId;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $BankWireRef;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $Status;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $Type;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $Nature;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $PaymentType;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $ResultMessage;

    /**
     * @var MoneyDto
     * @Serializer\Type("Sherl\Sdk\Shop\Payout\Dto\MoneyDto")
     */
    public $DebitedFunds;

    /**
     * @var MoneyDto
     * @Serializer\Type("Sherl\Sdk\Shop\Payout\Dto\MoneyDto")
     */
    public $Fees;

    /**
     * @var MoneyDto
     * @Serializer\Type("Sherl\Sdk\Shop\Payout\Dto\MoneyDto")
     */
    public $CreditedFunds;

    /**
     * @var DateTime
     * @Serializer\Type("DateTime")
     */
    public $createdAt;

    /**
     * @var DateTime
     * @Serializer\Type("DateTime")
     */
    public $updatedAt;
}
