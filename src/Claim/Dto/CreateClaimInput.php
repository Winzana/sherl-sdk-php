<?php

namespace Sherl\Sdk\Claim\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Claim\Dto\ClaimSchedulesDto;

class CreateClaimInput
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
    public $personId;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $issueTitle;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $issueMessage;

    /**
     * @var ClaimSchedulesDto
     * @Serializer\Type("Sherl\Sdk\Claim\Dto\ClaimSchedulesDto")
     */
    public $schedules;
}
