<?php

namespace Sherl\Sdk\Analytic\Dto;

use JMS\Serializer\Annotation as Serializer;

use Sherl\Sdk\Analytics\Enum\TraceEnum;
use Sherl\Sdk\Organization\Dto\OrganizationOutputDto;

class TraceOuputDto
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
    public $consumerId;

    /**
     * @var TraceEnum
     * @Serializer\Type("TraceEnum")
     */
    public $action;

    /**
     * @var User
     * @Serializer\Type("User") // TODO: Add User class import + usage when merged
     */
    public $user;

    /**
     * @var Session
     * @Serializer\Type("Session") // TODO: Add Session class import + usage when merged
     */
    public $session;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $sessionId;

    /**
     * @var mixed
     * @Serializer\Type("mixed")
     */
    public $value;

    /**
     * @var OrganizationOutputDto
     * @Serializer\Type("Sherl\Sdk\Organization\Dto\OrganizationOutputDto")
     */
    public $organization;

    /**
     * @var int
     * @Serializer\Type("int")
     */
    public $year;

    /**
     * @var int
     * @Serializer\Type("int")
     */
    public $month;

    /**
     * @var int
     * @Serializer\Type("int")
     */
    public $day;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $objectUri;

    /**
     * @var float
     * @Serializer\Type("float")
     */
    public $latitude;

    /**
     * @var float
     * @Serializer.Type("float")
     */
    public $longitude;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $geopoint;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $createdAt;
}
