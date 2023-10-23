<?php

namespace Sherl\Sdk\Shop\Discount\Dto;

use JMS\Serializer\Annotation as Serializer;

class DateRestrictionOutputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $date;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $dayOfWeek;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $fromHour;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $toHour;
}
