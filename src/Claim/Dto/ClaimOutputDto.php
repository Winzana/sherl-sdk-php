<?php

namespace Sherl\Sdk\Claim\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Claim\Dto\ClaimSchedulesDto;
use Sherl\Sdk\Claim\Dto\ClaimReplyOutput;
use Sherl\Sdk\Claim\Enum\ClaimStatus;

use Sherl\Sdk\Order\Dto\OrderOutputDto;

use Sherl\Sdk\Person\Dto\PersonOutputDto;

class ClaimOutputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $id;

    /**
     * @var ClaimReplyOutput[]
     * @Serializer\Type("array<Sherl\Sdk\Claim\Dto\ClaimReplyOutput>")
     */
    public $replies;

    /**
     * @var ClaimSchedulesDto
     * @Serializer\Type("Sherl\Sdk\Claim\Dto\ClaimSchedulesDto")
     */
    public $schedules;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $issueMessage;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $issueTitle;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $personId;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $orderId;

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
     * @var ClaimStatus
     * @Serializer\Type("enum<'Sherl\Sdk\Claim\Enum\ClaimStatus', 'value'>")
     */
    public $status;

    /**
     * @var PersonOutputDto
     * @Serializer\Type("Sherl\Sdk\Person\Dto\PersonOutputDto")
     */
    public $person;

    /**
     * @var OrderOutputDto
     * @Serializer\Type("Sherl\Sdk\Order\Dto\OrderOutputDto")
     */
    public $order;
}
