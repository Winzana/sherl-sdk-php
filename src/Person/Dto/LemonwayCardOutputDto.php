<?php

namespace Sherl\Sdk\Person\Dto;

use JMS\Serializer\Annotation as Serializer;

class LemonwayCardOutputDto
{
    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $id;

    /**
     * @var int
     * @Serializer\Type("integer")
     */
    public $transactionId;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $is3DS;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $country;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $authorizationNumber;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $maskedNumber;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $type;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $default;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $webKitToken;

}
