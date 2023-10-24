<?php

namespace Sherl\Sdk\Quotas\Dto;

use JMS\Serializer\Annotation as Serializer;

class WalletHistoricalOutputDto
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
     * @var float
     * @Serializer\Type("float")
     */
    public $amount;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $consumerId;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $organizationId;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $description;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $personId;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $walletId;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $createdAt;
}
