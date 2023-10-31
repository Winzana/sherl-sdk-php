<?php

namespace Sherl\Sdk\Calendar\Dto;

use JMS\Serializer\Annotation as Serializer;

class OpeningHoursSpecificationOutputDto
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
    public $dayOfWeek;

    /**
    * @var string
    * @Serializer\Type("array<string>")
    */
    public $weekDays;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $closes;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $opens;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $validFrom;

    /**
     * @var number
     * @Serializer\Type("number")
     */
    public $validFromMonthDay;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $validThrough;

    /**
     * @var number
     * @Serializer\Type("number")
     */
    public $validThroughMonthDay;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $annualy;

    /**
     * @var HoursSpecificationRulesetEnum
     * @Serializer\Type("Sherl\Sdk\Calendar\Enum\HoursSpecificationRulesetEnum")
     */
    public $ruleset;
}
