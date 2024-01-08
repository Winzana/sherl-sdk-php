<?php

namespace Sherl\Sdk\Shop\Payment\Dto;

use JMS\Serializer\Annotation as Serializer;

class CreditCardDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $Id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $Tag;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $CreationDate;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $UserId;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $AccessKey;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $PreregistrationData;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $RegistrationData;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $CardId;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $CardType;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $CardRegistrationURL;

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
    public $Currency;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $Status;
}
