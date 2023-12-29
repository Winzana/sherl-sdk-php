<?php

namespace Sherl\Sdk\Person\Dto;

use JMS\Serializer\Annotation as Serializer;

class StripeCardOutputDto
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
    public $object;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $address_city;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $address_country;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $address_line1;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $address_line1_check;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $address_line2;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $address_state;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $address_zip;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $address_zip_check;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $brand;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $country;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $customer;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $cvc_check;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $dynamic_last4;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $exp_month;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $exp_year;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $fingerprint;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $funding;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $last4;

    /**
     * @var array<string, mixed>
     * @Serializer\Type("array<string, mixed>")
     */
    public $metadatas;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $name;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $tokenization_method;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $default;
}
