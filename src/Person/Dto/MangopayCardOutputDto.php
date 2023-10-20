<?php

namespace Sherl\Sdk\Person\Dto;

use JMS\Serializer\Annotation as Serializer;

class MangopayCardOutputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $ExpirationDate;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $Alias;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $CardType;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $CardProvider;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $Country;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $Product;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $BankCode;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $Active;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $Currency;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $Validity;

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
     * @var int
     * @Serializer\Type("integer")
     */
    public $CreationDate;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $Fingerprint;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $default;
}
