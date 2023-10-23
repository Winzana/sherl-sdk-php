<?php

namespace Sherl\Sdk\Order\Dto;

use JMS\Serializer\Annotation as Serializer;

class OrderStatusHistoryOutputDto
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
    public $message;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $status;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $userUri;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $createdAt;

    /**
     * @var float
     * @Serializer\Type("float")
     */
    public $latitude;

    /**
     * @var float
     * @Serializer\Type("float")
     */
    public $longitude;
}
