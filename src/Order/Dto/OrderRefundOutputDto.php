<?php

namespace Sherl\Sdk\Order\Dto;

use JMS\Serializer\Annotation as Serializer;

class OrderRefundOutputDto
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
    public $productId;

    /**
     * @var float
     * @Serializer\Type("float")
     */
    public $amount;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $askedBy;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $createdAt;

    /**
     * @var array
     * @Serializer\Type("array")
     */
    public $metadatas;
}
