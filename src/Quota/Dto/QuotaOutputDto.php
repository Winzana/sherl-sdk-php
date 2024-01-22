<?php

namespace Sherl\Sdk\Quota\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Communication\Enum\CommunicationTypeEnum;

use Sherl\Sdk\Quota\Dto\QuotaSourceOutputDto;

class QuotaOutputDto
{
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
     * @var CommunicationTypeEnum
     * @Serializer\Type("Sherl\Sdk\Communication\Enum\CommunicationTypeEnum")
     */
    public $type;

    /**
     * @var float
     * @Serializer\Type("float")
     */
    public $amount;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $allowNegative;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $ownerUri;

    /**
     * @var QuotaSourceOutputDto[]
     * @Serializer\Type("array<Sherl\Sdk\Quotas\Dto\QuotaSourceOutputDto>")
     */
    public $sources;

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
}
