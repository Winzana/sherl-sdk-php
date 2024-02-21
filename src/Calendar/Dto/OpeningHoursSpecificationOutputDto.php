<?php

namespace Sherl\Sdk\Calendar\Dto;

use JMS\Serializer\Annotation as Serializer;
use Sherl\Sdk\Calendar\Enum\HoursSpecificationRulesetEnum;

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
     * @var string[]
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
     * @var integer
     * @Serializer\Type("integer")
     */
    public $validFromMonthDay;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $validThrough;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    public $validThroughMonthDay;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     */
    public $annualy;

    /**
     * @var HoursSpecificationRulesetEnum
     * @Serializer\Type("enum<'Sherl\Sdk\Calendar\Enum\HoursSpecificationRulesetEnum', 'value'>")
     */
    public $ruleset;
}
