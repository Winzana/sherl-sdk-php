<?php

namespace Sherl\Sdk\Quotas\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Communication\Enum\CommunicationTypeEnum;

use Sherl\Sdk\Quotas\Dto\QuotasSourceOutputDto;

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
     * @Serializer\Type("enum<'Sherl\Sdk\Communication\Enum\CommunicationTypeEnum', 'value'>")
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
     * @var QuotasSourceOutputDto[]
     * @Serializer\Type("array<Sherl\Sdk\Quotas\Dto\QuotasSourceOutputDto>")
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
